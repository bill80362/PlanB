<?php

namespace App\Http\Controllers\Operation\Log;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Permission\Permission;
use App\Models\User;
use App\Services\Operate\ListColumnService;
use App\Services\Operate\PermissionService;
use App\Services\Operate\SystemConfigService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class AuditController extends Controller
{
    public function __construct(
        protected Request $request,
        protected SystemConfigService $oSystemConfigService,
        protected AuditLog $oModel,
    ) {
    }

    public function listHTML(ListColumnService $listColumnService)
    {
        $user = auth('operate')->user();
        // table設定，可用欄位
        $TableSetting = $listColumnService->getTableSetting($this->oModel);
        // 使用者設定
        $userColumns = $listColumnService->getWithUserId($this->oModel, $user->id);
        //根據使用者設定修改順序
        $TableSetting["canUseColumn"] = collect($TableSetting["canUseColumn"])->sortBy(function ($item, $key) use ($userColumns) {
            return array_search($item, $userColumns);
        })->toArray();
        //
        $pageLimit = $this->request->get('pageLimit') ?: 10; //預設10
        //過濾條件
        $Paginator = $this->oModel->filter($this->request->all())->with('user')->paginate($pageLimit);

        return view('operate/pages/audit/list', [
            'paginator' => $Paginator,
            //
            'model' => $this->oModel,
            //
            'columns' => $userColumns,
            'tableSetting' => $TableSetting,
        ]);
    }

    public function updateHTML($id)
    {
        if ($id) {
            //修改
            $Data = $this->oModel->findOrFail($id);
        } else {
            $Data = $this->oModel;
            //新增預設值
            $Data->id = 0;
            $Data->name = '';
            $Data->email = '';
        }
        //輸入驗證遭擋，會有舊資料，優先使用舊資料
        foreach ((array) $this->request->old() as $key => $value) {
            if (!$value) {
                continue;
            }
            $Data->$key = $value;
        }
        //整理權限
        if ($id) {
            $DataPermission = $this->oModel->findOrFail($id)->permissions()->get()->map(function ($item) {
                return $item->perm_key;
            });
        } else {
            $DataPermission = collect([
                'items' => '',
            ]);
        }

        //View
        return view('operate/pages/audit/update', [
            'Data' => $Data,
            'DataPermission' => $DataPermission,
            'GroupItemPermission' => app(PermissionService::class)->getGroupItemPermission(),
        ]);
    }

    public function update($id)
    {
        //過濾
        $UpdateData = $this->request->only(['name', 'email', 'password']);
        if (!$UpdateData['password']) {
            unset($UpdateData['password']);
        } else {
            $this->oModel->newPassword = $UpdateData['password'];
        }
        //驗證資料
        $validator = Validator::make(
            $UpdateData,
            $this->oModel->getValidatorRules(),
            $this->oModel->getValidatorMessage(),
        );
        //密碼處理
        if (isset($UpdateData['password'])) {
            $UpdateData['password'] = Hash::make($UpdateData['password']);
        }
        //驗證有誤
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($id) {
            $this->oModel->find($id)->update($UpdateData);
        } else {
            $id = $this->oModel->create($UpdateData)->id;
        }
        //寫入權限
        $allPermissionsKey = collect(app(PermissionService::class)->getPermissions())->map(function ($item) {
            return $item['key'];
        });
        $PermissionArray = collect($this->request->only($allPermissionsKey->toArray()))->map(function ($item, $key) {
            return new Permission(['perm_key' => $key]);
        });
        $this->oModel->find($id)->permissions()->saveMany($PermissionArray);

        //
        return redirect("/operate/audit?" . $this->request->getQueryString())->with(['success' => '送出成功']);
    }

    //批次刪除
    public function delBatch()
    {
        //刪除
        foreach ((array) $this->request->post('id_array') as $id) {
            $this->oModel->find($id)->delete();
        }
        //
        return redirect("/operate/audit?" . $this->request->getQueryString())->with(['success' => '刪除成功']);
    }

    //批次修改排序
    public function sortBatch()
    {
        $ID_Array = $this->request->post('sort');
    }

    //批次還原
    public function reverseBatch()
    {
        foreach ((array) $this->request->post('id_array') as $id) {
            $Data = $this->oModel->find($id);
            if ($Data->event == "created") {
                //新增反向，就是要刪除
                $object = new $Data->auditable_type;
                $object->find($Data->new_values["id"])->delete();
            } elseif ($Data->event == "deleted") {
                //刪除 => 新增
                $object = new $Data->auditable_type;
                //特殊表，要進行處裡
                if ($Data->auditable_type == User::class) {
                    $Data->old_values = array_merge($Data->old_values, ["password" => "admin"]);
                }
                //重新新增，id一樣看起來沒有問題
                $object->create($Data->old_values);
            } elseif ($Data->event == "updated") {
                //修改，
                $object = $Data->auditable_type::find($Data->auditable_id);
                foreach ($Data->old_values as $key => $value) {
                    $object->$key = $value;
                }
                $object->save();
            }
        }
        //
        return redirect("/operate/audit?" . $this->request->getQueryString())->with(['success' => '還原成功']);
    }

    /**
     * 匯入
     */
    public function import()
    {
        //使用工具只為了轉成 Collection 三維陣列 sheet > row > column
        $subjects = Excel::toCollection(null, $this->request->file('file')->store('temp'));
        //根據第一列標題判斷對應的欄位
        $value_to_key = array_flip($this->oModel->Column_Title_Text);
        $excelIndex = [];
        foreach ((array) $subjects->toArray()[0] as $RowKey => $Row) {
            if ($RowKey > 0) {
                break;
            } //只跑第一行
            foreach ($Row as $index => $columnTitle) {
                //匯入資料欄位標題異常
                if (!isset($value_to_key[$columnTitle])) {
                    return redirect("/operate/audit?" . $this->request->getQueryString())->with(['error' => '匯入標題異常']);
                }
                //
                $excelIndex[$index] = $value_to_key[$columnTitle];
            }
        }
        //開始逐筆匯入
        $AllMessage = [];
        foreach ((array) $subjects->toArray()[0] as $RowKey => $Row) {
            //第一列標題，跳過
            if ($RowKey == 0) {
                continue;
            }
            //資料對應整理
            $UpdateData = [];
            foreach ($Row as $index => $columnValue) {
                //特殊處理欄位
                if ($excelIndex[$index] == 'password') {
                    $this->oModel->newPassword = $columnValue;
                    $UpdateData[$excelIndex[$index]] = Hash::make($columnValue);
                } elseif ($excelIndex[$index] == 'status') {
                    $UpdateData[$excelIndex[$index]] = array_flip($this->oModel->statusText)[$columnValue];
                } else {
                    $UpdateData[$excelIndex[$index]] = $columnValue;
                }
            }
            //整理要更新的資料
            $DataModel = $this->oModel->importPrimary($UpdateData)->first();
            if (!$DataModel) {
                $DataModel = clone $this->oModel; //沒有對應的資料，init一個
            }
            foreach ($UpdateData as $ColumnTitle => $value) {
                if ($ColumnTitle == 'password') {
                    $DataModel->newPassword = $value;
                }
                $DataModel->$ColumnTitle = $value;
            }
            //驗證資料
            $validator = Validator::make(
                $DataModel->makeVisible('password')->toArray(),
                $this->oModel->getValidatorRules(),
                $this->oModel->getValidatorMessage(),
            );
            //驗證有誤
            if ($validator->fails()) {
                //
                $AllMessage[] = "第{$RowKey}列:" . implode(',', $validator->messages()->all());

                //
                continue;
            }
            $DataModel->save();
        }
        //有錯誤
        if ($AllMessage) {
            return redirect()->back()->withErrors(['message' => implode(',', $AllMessage)]);
        }
        //
        return redirect("/operate/audit?" . $this->request->getQueryString())->with(['success' => '送出成功']);
    }

    //匯出
    public function export()
    {
        //匯出的標題和內文
        $ExportList = $this->oModel->filter($this->request->all())->export();

        //匯出
        return (new Collection($ExportList))->downloadExcel('audit_data_' . time() . '.xlsx');
    }

    public function saveListColumn(ListColumnService $listColumnService)
    {
        $list = $this->request->get('list', []);
        $user = auth('operate')->user();
        $listColumnService->renewListColumn($this->oModel, $list, $user->id);
        return back();
    }
}
