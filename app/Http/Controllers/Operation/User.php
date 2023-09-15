<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Services\SystemConfig;
use Illuminate\Http\Request;

class User extends Controller
{
    public function __construct(
        protected SystemConfig $oSystemConfig,
        protected \App\Services\Operation\User $oServiceUser,
        protected Request $request,
    ){}
    public function listHTML(){
        //
        $pageLimit = $this->request->get("pageLimit")?:10;//預設10
        //過濾條件
        $oModel = $this->oServiceUser->filter($this->request);
        //
        $Paginator = $oModel->paginate($pageLimit);
        //
        return view('admin/Member_Data/List', [
            'Paginator' => $Paginator,
            //
            'Model' => $this->oServiceUser->getModel(),
        ]);
    }
}
