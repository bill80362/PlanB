<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Operate\MasterToolService;
use App\Services\Operate\SystemConfigService;
use Illuminate\Http\Request;

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
//        $oModel = $this->oModel->filter($this->request);
        //
        $Paginator = $this->oModel->paginate($pageLimit);
        //
        return view('operate/user/list', [
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
            //新增預設值
            $this->oModel->id = 0;
            $this->oModel->name = "";
            $this->oModel->email = "";
        }
        //輸入驗證遭擋，會有舊資料，優先使用舊資料
        foreach ((array)$this->request->old() as $key => $value){
            if(!$value) continue;
            $this->oModel->$key = $value;
        }
        //View
        return view('operate/user/Update', [
            'Data' => $this->oModel,
        ]);
    }
}
