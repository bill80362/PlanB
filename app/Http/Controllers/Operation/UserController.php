<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Operate\MasterToolService;
use App\Services\Operate\SystemConfigService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct(
        protected Request $request,
        protected SystemConfigService $oSystemConfigService,
        protected MasterToolService $oMasterService,
        protected User $oModel,
    ){}
    public function listHTML(){
        //
        $pageLimit = $this->request->get("pageLimit")?:10;//預設10
        //過濾條件
        $this->oModel = $this->oMasterService->filter($this->request->all(),$this->oModel);
        //
        $Paginator = $this->oModel->paginate($pageLimit);
        //
        return view('operate/pages/user/list', [
            'Paginator' => $Paginator,
            //
            'Model' => $this->oModel,
        ]);
    }
    public function updateHTML($id){
        if($id){
            //修改
            $Data = $this->oModel->findOrFail($id);
        }else{
            $Data = $this->oModel;
            //新增預設值
            $Data->id = 0;
            $Data->name = "";
            $Data->email = "";
        }
        //輸入驗證遭擋，會有舊資料，優先使用舊資料
        foreach ((array)$this->request->old() as $key => $value){
            if(!$value) continue;
            $Data->$key = $value;
        }
        //View
        return view('operate/pages/user/update', [
            'Data' => $Data,
        ]);
    }
    public function update($id){
        //過濾
        $UpdateData = $this->request->only(["name","email","password"]);
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
        if($id){
            $this->oModel->find($id)->update($UpdateData);
        }else{
            $id = $this->oModel->create($UpdateData);
        }

        //
        return view('alert_redirect', [
            'Alert' => __("送出成功"),
            'Redirect' => '/operate/user?'.$this->request->getQueryString(),
        ]);
    }
}
