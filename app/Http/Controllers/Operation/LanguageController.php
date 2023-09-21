<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryAndShippingFee\Language;
use App\Services\Operate\SystemConfigService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;
use stdClass;

class LanguageController extends Controller
{

    public function __construct(
        protected Request $request,
        protected SystemConfigService $oSystemConfigService,
        protected Language $oModel,
    ) {
    }

    public function listHTML()
    {
        $pageLimit = $this->request->get("pageLimit") ?: 10; //預設10
        //過濾條件
        $Paginator = $this->oModel->filter($this->request->all())
            ->paginate($pageLimit);
        return view('operate/pages/language/list', [
            'Paginator' => $Paginator,
            'Model' => $this->oModel,
        ]);
    }

    public function updateHTML($id)
    {
        if ($id) {
            //修改
            $Data = $this->oModel->findOrFail($id);
            foreach ($Data->getOtherLangs() as $key => $value) {
                $this->oModel->firstOrCreate([
                    'text' => $Data->text,
                    'lang_type' => $key
                ], [
                    'tran_text' => $Data->text
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
            $Data->text = "";
            $Data->tran_text = "";
            $Data->memo = "";
            $elseDatas = [];
            foreach ($Data->getOtherLangs() as $key => $value) {
                $elseDatas[$key] = [
                    'lang_type' => $key,
                    'tran_text' => ''
                ];
            }
            
            $elseDatas = collect($elseDatas)->mapWithKeys(function ($item) {
                return [$item['lang_type'] => $item];
            })->all();
            // dd($elseDatas);
        }
        //輸入驗證遭擋，會有舊資料，優先使用舊資料
        foreach ((array)$this->request->old() as $key => $value) {
            if (!$value) continue;
            $Data->$key = $value;
        }
        //View
        return view('operate/pages/language/update', [
            'Data' => $Data,
            'ElseDatas' => $elseDatas,
            'LangTypeText' => $this->oModel->langTypeText,
            'OtherLangTypeText' => $Data->getOtherLangs(),
            'Model' => $this->oModel,
        ]);
    }


    // Post
    public function update($id)
    {
        //過濾
        if ($id) {
            $UpdateData = $this->request->only(["tran_text", "memo", "text"]);

            //驗證資料
            $validator = Validator::make(
                $UpdateData,
                $this->oModel->getValidatorRulesForUpdate(),
                $this->oModel->getValidatorMessage(),
            );
        } else {
            $UpdateData = $this->request->only(["lang_type", "text", "tran_text", "memo"]);

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
                        'tran_text' => $trans
                    ]);
            }
            unset($UpdateData['text']);
            $this->oModel->find($id)->update($UpdateData);
        } else {
            $id = $this->oModel->create($UpdateData)->id;
            foreach ($this->request->else_langTypes as $key => $else_langType) {
                $trans = $this->request->else_trans[$key];

                $this->oModel->firstOrCreate([
                    'text' => $UpdateData['text'],
                    'lang_type' => $else_langType
                ], [
                    'tran_text' => $trans
                ]);
            }
        }
        $this->makeFile();
        return view('alert_redirect', [
            'Alert' => __("送出成功"),
            'Redirect' => '/operate/language?' . $this->request->getQueryString(),
        ]);
    }


    //批次刪除
    public function delBatch()
    {
        //刪除
        foreach ((array)$this->request->post("id_array") as $id) {
            $this->oModel->find($id)->delete();
        }
        //
        return view('alert_redirect', [
            'Alert' => "刪除成功",
            'Redirect' => route('language_list') . '?' . $this->request->getQueryString(),
        ]);
    }

    /**
     * 匯入
     */
    public function import()
    {
        $subjects = Excel::toCollection(null, $this->request->file('file')->store('temp'));
        $value_to_key = array_flip($this->oModel->Column_Title_Text);
        $excelIndex = [];
        foreach ((array)$subjects->toArray()[0] as $RowKey => $Row) {
            if ($RowKey > 0) break; //只跑第一行
            foreach ($Row as $index => $columnTitle) {
                //匯入資料欄位標題異常
                if (!isset($value_to_key[$columnTitle])) {
                    return view('alert_redirect', [
                        'Alert' => __("匯入標題異常"),
                        'Redirect' => '/operate/language?' . $this->request->getQueryString(),
                    ]);
                }
                //
                $excelIndex[$index] = $value_to_key[$columnTitle];
            }
        }
        $AllMessage = [];
        foreach ((array)$subjects->toArray()[0] as $RowKey => $Row) {
            //第一列標題，跳過
            if ($RowKey == 0) continue;
            //資料對應整理
            $UpdateData = [];
            foreach ($Row as $index => $columnValue) {
                //特殊處理欄位
                if ($excelIndex[$index] == "status") {
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
                $DataModel->$ColumnTitle = $value;
            }
            //驗證資料
            $validator = Validator::make(
                $DataModel->toArray(),
                $this->oModel->getValidatorRules(),
                $this->oModel->getValidatorMessage(),
            );
            //驗證有誤
            if ($validator->fails()) {
                //
                $AllMessage[] = "第{$RowKey}列:" . implode(",", $validator->messages()->all());
                //
                continue;
            }
            $DataModel->save();
        }
        //有錯誤
        if ($AllMessage) {
            return redirect()->back()->withErrors(['message' => implode(",", $AllMessage)]);
        }
        //
        return view('alert_redirect', [
            'Alert' => __("送出成功"),
            'Redirect' => '/operate/language?' . $this->request->getQueryString(),
        ]);
    }

    //匯出
    public function export()
    {
        //匯出的標題和內文
        $ExportList = $this->oModel->filter($this->request->all())->export();
        //匯出
        return (new Collection($ExportList))->downloadExcel("language_data_" . time() . ".xlsx");
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
            $filePath = lang_path($langType . ".json");
            $jsonString = json_encode($languageDatas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            $fp = fopen($filePath, 'w');
            fwrite($fp, $jsonString);
            fclose($fp);
        }

        return back();
    }
}
