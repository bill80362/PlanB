<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryAndShippingFee\Language;
use App\Services\Operate\SystemConfigService;
use Illuminate\Support\Facades\Validator;

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
        $Paginator = $this->oModel->paginate($pageLimit);
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
            $Data->name = "";
            $Data->email = "";
        }
        //輸入驗證遭擋，會有舊資料，優先使用舊資料
        foreach ((array)$this->request->old() as $key => $value) {
            if (!$value) continue;
            $Data->$key = $value;
        }

        //View
        return view('operate/pages/language/update', [
            'Data' => $Data,
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

    public function makeJsonFile()
    {
        foreach ($this->oModel->langFileMap as $langType => $fileName) {
            $languageDatas = $this->oModel->select('text', 'tran_text')
                ->where('status', 'Y')
                ->where('lang_type', $langType)->get()
                ->mapWithKeys(function ($item) {
                    return [$item['text'] => $item['tran_text']];
                })->all();
            $filePath = lang_path($fileName);
            $jsonString = json_encode($languageDatas, JSON_PRETTY_PRINT);
            $fp = fopen($filePath, 'w');
            fwrite($fp, $jsonString);
            fclose($fp);
        }
    }
}
