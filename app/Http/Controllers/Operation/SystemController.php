<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Permission\Permission;
use App\Models\SystemConfig;
use App\Services\Operate\PermissionService;
use App\Services\Operate\SystemConfigService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

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
        $all_id = [];
        foreach ($this->oModel->SystemConfig as $key => $value){
            foreach ($value as $key2 => $value2){
                $all_id[] = $value2["id"];
            }
        }
        foreach ($this->request->only($all_id) as $id => $content){
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
