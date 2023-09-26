<?php

namespace App\Http\Controllers\Operation;

use App\Events\Operate\UserEditEvent;
use App\Http\Controllers\Controller;
use App\Models\Permission\Permission;
use App\Models\Permission\PermissionGroup;
use App\Models\User;
use App\Services\Operate\PermissionService;
use App\Services\Operate\SystemConfigService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function __construct(
        protected Request $request,
        protected SystemConfigService $oSystemConfigService,
        protected User $oModel,
    ) {
    }

    public function listHTML()
    {
        //
        $pageLimit = $this->request->get('pageLimit') ?: 10; //預設10
        //過濾條件
        $Paginator = $this->oModel->filter($this->request->all())->paginate($pageLimit);
        //
        return view('operate/pages/user/list', [
            'Paginator' => $Paginator,
            //
            'Model' => $this->oModel,
        ]);
    }

    public function updateHTML($id)
    {
        $user = auth('operate')->user();

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

        $permissionGroups = PermissionGroup::where('show_flag', 'Y')->with(['permissionGrouopItems'])
            ->get()->toArray();
        //View
        return view('operate/pages/user/update', [
            'Data' => $Data,
            'DataPermission' => $DataPermission,
            'GroupItemPermission' => app(PermissionService::class)->getGroupItemPermission($user->lv),
            'PermissionGroups' => $permissionGroups,
        ]);
    }

    public function update($id)
    {
        $user = auth('operate')->user();
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
            $this->oModel->getValidatorRules($id),
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
        /***寫入權限 START **/

        //使用者lv權限
        $allPermissionsKey = collect(app(PermissionService::class)->getPermissions($user->lv))->map(function ($item) {
            return $item['key'];
        });
        //這次打勾的
        $PermissionArray = collect($this->request->only($allPermissionsKey->toArray()))->map(function ($item, $key) {
            return $key;
        });
        //原本打勾的
        $DataPermission = $this->oModel->findOrFail($id)->permissions()->get()->map(function ($item) {
            return $item->perm_key;
        });
        //差異比對，要移除的 = (原本打勾的+使用者lv權限 聯集) - 這次打勾的
        collect($DataPermission)->intersect($allPermissionsKey)->diff($PermissionArray)->map(function ($item) use ($id) {
            Permission::where("perm_key", $item)->where("user_id", $id)->first()->delete();
        });
        //差異比對，要新增的 = (這次打勾的+使用者lv權限 聯集)  - 原本打勾的
        $PermissionAdd = collect($PermissionArray)->intersect($allPermissionsKey)->diff($DataPermission)->map(function ($item) {
            return new Permission(['perm_key' => $item]);
        });
        $this->oModel->find($id)->permissions()->saveMany($PermissionAdd);
        /***寫入權限 END **/

        //寄發郵件通知使用者資料變更訊息
        UserEditEvent::dispatch($this->oModel->find($id)->toArray());

        return redirect("/operate/user?" . $this->request->getQueryString())->with(['success' => '送出成功']);
        //
    }

    //批次刪除
    public function delBatch()
    {
        //刪除
        foreach ((array) $this->request->post('id_array') as $id) {
            $this->oModel->find($id)->delete();
        }

        //
        return redirect("/operate/user?" . $this->request->getQueryString())->with(['success' => '刪除成功']);
    }

    //批次修改排序
    public function sortBatch()
    {
        $ID_Array = $this->request->post('sort');
    }

    /**
     * 匯入
     */
    public function import()
    {
        //使用工具只為了轉成 Collection 三維陣列 sheet > row > column
        $subjects = Excel::toCollection(null, $this->request->file('file')->store('temp'));
        //開始逐筆匯入
        try{
            $AllMessage = $this->oModel->importData($subjects->toArray());
        }catch(\Exception $e){
            return redirect("/operate/user?" . $this->request->getQueryString())->with(['error' => $e->getMessage()]);
        }
        //有錯誤
        if ($AllMessage) {
            return redirect()->back()->withErrors(['message' => implode(',', $AllMessage)]);
        }
        //
        return redirect("/operate/user?" . $this->request->getQueryString())->with(['success' => '送出成功']);
    }

    //匯出
    public function export($Type)
    {
        //匯出的內文是否使用變異器
        $useMutator = true;
        if($Type=="key"){
            $useMutator = false;
        }
        $ExportList = $this->oModel->filter($this->request->all())->export($useMutator);

        //匯出
        return (new Collection($ExportList))->downloadExcel('user_data_' . time() . '.xlsx');
    }

    //修改紀錄
    public function audit($id)
    {
        //
        $pageLimit = $this->request->get('pageLimit') ?: 10; //預設10
        //
        $Paginator = $this->oModel->findOrFail($id)->audits()->with('user')->orderBy('id', 'desc')->paginate($pageLimit);

        return view('operate/pages/user/audit', [
            'Paginator' => $Paginator,
            //
            'Model' => $this->oModel,
        ]);
    }
}
