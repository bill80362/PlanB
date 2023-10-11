<?php

namespace App\Http\Controllers\Operation\Config;

use App\Http\Controllers\Controller;
use App\Models\CountryAndShippingFee\Language;
use App\Services\Operate\ListColumnService;
use App\Services\Operate\SystemConfigService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class LanguageController extends Controller
{
    public function __construct(
        protected Request $request,
        protected SystemConfigService $oSystemConfigService,
        protected Language $oModel,
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

        $pageLimit = $this->request->get('pageLimit') ?: 10; //預設10
        //過濾條件
        $Paginator = $this->oModel->filter($this->request->all())
            ->paginate($pageLimit);
        return view('operate/pages/language/list', [
            'paginator' => $Paginator,
            'model' => $this->oModel,
            'columns' => $userColumns,
            'tableSetting' => $TableSetting,
        ]);
    }


    public function updateHTML($id)
    {
        $urlMaps = [];
        if ($id) {
            //修改
            $Data = $this->oModel->findOrFail($id);
            $urlMaps = $Data->langUrlMaps()->get()->toArray();
            foreach ($Data->getOtherLangs() as $key => $value) {
                $this->oModel->firstOrCreate([
                    'text' => $Data->text,
                    'lang_type' => $key,
                ], [
                    'tran_text' => $Data->text,
                ]);
            }
            $elseDatas = $this->oModel->where('id', '!=', $Data->id)
                ->where('text', $Data->text)->get()->mapWithKeys(function ($item) {
                    return [$item['lang_type'] => $item];
                })->toArray();
        } else {
            $Data = $this->oModel;
            //新增預設值
            $Data->id = 0;
            $Data->lang_type = 'zh-tw';
            $Data->text = '';
            $Data->tran_text = '';
            $Data->memo = '';
            $elseDatas = [];
            foreach ($Data->getOtherLangs() as $key => $value) {
                $elseDatas[$key] = [
                    'lang_type' => $key,
                    'tran_text' => '',
                ];
            }

            $elseDatas = collect($elseDatas)->mapWithKeys(function ($item) {
                return [$item['lang_type'] => $item];
            })->all();
        }
        //輸入驗證遭擋，會有舊資料，優先使用舊資料
        foreach ((array) $this->request->old() as $key => $value) {
            if (!$value) {
                continue;
            }
            $Data->$key = $value;
        }



        //View
        return view('operate/pages/language/update', [
            'data' => $Data,
            'elseDatas' => $elseDatas,
            'langTypeText' => $this->oModel->langTypeText,
            'otherLangTypeText' => $Data->getOtherLangs(),
            'model' => $this->oModel,
            'urlMaps' => $urlMaps
        ]);
    }

    // Post
    public function update($id)
    {
        //過濾
        if ($id) {
            $UpdateData = $this->request->only(['tran_text', 'memo', 'text']);

            //驗證資料
            $validator = Validator::make(
                $UpdateData,
                $this->oModel->getValidatorRulesForUpdate(),
                $this->oModel->getValidatorMessage(),
            );
        } else {
            $UpdateData = $this->request->only(['lang_type', 'text', 'tran_text', 'memo']);

            //驗證資料
            $validator = Validator::make(
                $UpdateData,
                $this->oModel->getValidatorRules(),
                $this->oModel->getValidatorMessage(),
            );
        }

        //驗證有誤
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($id) {
            foreach ($this->request->else_langTypes as $key => $else_langType) {
                $trans = $this->request->else_trans[$key];
                $this->oModel->where('text', $UpdateData['text'])
                    ->where('lang_type', $else_langType)->update([
                        'tran_text' => $trans,
                    ]);
            }
            $this->oModel->whereId($id)->update([
                'tran_text' => $UpdateData['tran_text']
            ]);
        } else {
            $this->oModel->firstOrCreate([
                'text' => $UpdateData['text'],
                'lang_type' => $UpdateData['lang_type'],
            ], [
                'tran_text' => $UpdateData['tran_text'],
            ]);
            foreach ($this->request->else_langTypes as $key => $else_langType) {
                $trans = $this->request->else_trans[$key];

                $this->oModel->firstOrCreate([
                    'text' => $UpdateData['text'],
                    'lang_type' => $else_langType,
                ], [
                    'tran_text' => $trans,
                ]);
            }
        }
        $this->makeFile();
        return redirect("/operate/language?" . $this->request->getQueryString())->with(['success' => '送出成功']);
    }

    //批次刪除
    public function delBatch()
    {
        //刪除
        foreach ((array) $this->request->post('id_array') as $id) {
            $this->oModel->find($id)->delete();
        }

        return redirect("/operate/language?" . $this->request->getQueryString())->with(['success' => __('刪除成功')]);
    }

    /**
     * 匯入
     */
    public function import()
    {
        $this->request->validate([
            'file' => ['required']
        ]);
        $subjects = Excel::toCollection(null, $this->request->file('file')->store('temp'));

        //開始逐筆匯入
        try {
            $AllMessage = $this->oModel->importData($subjects->toArray());
        } catch (\Exception $e) {
            return redirect("/operate/language?" . $this->request->getQueryString())->with(['error' => $e->getMessage()]);
        }
        //有錯誤
        if ($AllMessage) {
            return redirect()->back()->withErrors(['message' => implode(',', $AllMessage)]);
        }
        //
        return redirect("/operate/language?" . $this->request->getQueryString())->with(['success' => '送出成功']);
    }

    //匯出
    public function export()
    {
        //匯出的標題和內文
        $ExportList = $this->oModel->filter($this->request->all())->export();

        //匯出
        return (new Collection($ExportList))->downloadExcel('language_data_' . time() . '.xlsx');
    }

    /**
     * 產生語系檔
     */
    public function makeFile()
    {
        foreach ($this->oModel->langTypeText as $langType => $langCode) {
            $languageDatas = $this->oModel->select('text', 'tran_text')
                ->where('lang_type', $langType)->get()
                ->mapWithKeys(function ($item) {
                    return [$item['text'] => $item['tran_text']];
                })->all();
            $filePath = lang_path($langType . '.json');
            $jsonString = json_encode($languageDatas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            Storage::disk('lang')->put($langType . '.json', $jsonString);
            // $fp = fopen($filePath, 'w');
            // fwrite($fp, $jsonString);
            // fclose($fp);
        }

        return back();
    }


    public function saveListColumn(ListColumnService $listColumnService)
    {
        $list = $this->request->get('list', []);
        $user = auth('operate')->user();
        $listColumnService->renewListColumn($this->oModel, $list, $user->id);
        return back();
    }
}
