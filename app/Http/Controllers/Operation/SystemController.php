<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\SystemConfig;
use App\Services\Operate\SystemConfigService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SystemController extends Controller
{
    public function __construct(
        protected Request $request,
        protected SystemConfigService $oSystemConfigService,
        protected SystemConfig $oModel,
    ){}

    public function updateHTML(){
        //
        $SystemConfigKeyValue = array_column($this->oModel->all()->toArray(),"content","id");
        //
        return view('operate/pages/system/config', [
            'SystemConfigKeyValue' => $SystemConfigKeyValue,
            'Model' => $this->oModel,
        ]);
    }

    public function update(){
        //
        $all_id = [];
        foreach ($this->oModel->SystemConfig as $key => $value){
            foreach ($value as $key2 => $value2){
                $all_id[] = $value2["id"];
            }
        }
        foreach ($this->request->only($all_id) as $id => $content){
            //如果是圖片，則要先上傳，再將content改成檔案名稱
            if( in_array($id,$this->oSystemConfigService->SystemConfigImageKey) ){
                $content = "";
                if($this->request->file($id)){
                    $content = Storage::disk('public')->putFile('input_file', $this->request->file($id));
                }
            }
            //
            $Model = $this->oModel->find($id);
            if(!$Model){
                //新增
                $this->oModel->create([
                    "id" => $id,
                    "content" => $content,
                ]);
            }elseif($Model->content!==$content){
                //修改
                $Model = $this->oModel->find($id);
                //需要先刪除圖片

                //
                $Model->content = $content;
                $Model->save();
            }
        }
        //
        return view('alert_redirect', [
            'Alert' => __("送出成功"),
            'Redirect' => '/operate/system',
        ]);
    }

}
