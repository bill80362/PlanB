<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryAndShippingFee\Language;
use App\Services\Operate\SystemConfigService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

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
        $Paginator = $this->oModel->filter($this->request->all())->paginate($pageLimit);
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
        } else {
            $Data = $this->oModel;
            //新增預設值
            $Data->id = 0;
            $Data->type = '1';
            $Data->lang_type = '1';
            $Data->text = "";
            $Data->tran_text = "";
            $Data->memo = "";
        }
        //輸入驗證遭擋，會有舊資料，優先使用舊資料
        foreach ((array)$this->request->old() as $key => $value) {
            if (!$value) continue;
            $Data->$key = $value;
        }

        //View
        return view('operate/pages/language/update', [
            'Data' => $Data,
            'Model' => $this->oModel,
        ]);
    }


    // Post
    public function update($id)
    {
        //過濾
        $UpdateData = $this->request->only(["status", "type", "lang_type", "text", "tran_text", "memo"]);

        //驗證資料
        $validator = Validator::make(
            $UpdateData,
            $this->oModel->getValidatorRules(),
            $this->oModel->getValidatorMessage(),
        );

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
            'Redirect' => '/operate/user?' . $this->request->getQueryString(),
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
        foreach ($this->oModel->langCodeMap as $langType => $langCode) {
            $languageDatas = $this->oModel->select('text', 'tran_text')
                ->where('lang_type', $langType)->get()
                ->mapWithKeys(function ($item) {
                    return [$item['text'] => $item['tran_text']];
                })->all();
            $filePath = lang_path($langCode . ".json");
            $jsonString = json_encode($languageDatas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            $fp = fopen($filePath, 'w');
            fwrite($fp, $jsonString);
            fclose($fp);
        }

        return back();
    }
}
