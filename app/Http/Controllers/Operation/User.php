<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Services\Operation\Master;
use App\Services\SystemConfig;
use Illuminate\Http\Request;

class User extends Controller
{
    public function __construct(
        protected Request $request,
        protected SystemConfig $oSystemConfig,
        protected Master $oServiceMaster,
        protected User $oModel,
    ){}
    public function listHTML(){
        //
        $pageLimit = $this->request->get("pageLimit")?:10;//預設10
        //過濾條件
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
}
