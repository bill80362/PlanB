<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member\Member_Data;
use Illuminate\Http\Request;

class MemberDataController extends \App\Http\Controllers\Controller
{
    //列表
    public function listHTML(){
        $pageLimit = 15;
        $Paginator = Member_Data::paginate($pageLimit);
        //
        return view('admin/Member_Data/List', [
            'Paginator' => $Paginator,
        ]);
    }
    //編輯
    public function updateHTML($ID){
        $Data = Member_Data::find($ID);
        //
        return view('admin/Member_Data/Update', [
            'Data' => $Data,
        ]);
    }
    public function update(Request $request,$ID){
        Member_Data::find($ID)->update($request->post());
        //
        return redirect('/Member_Data/'.$ID);
    }
    //刪除
    public function del($ID){

    }
    //批次刪除
    public function delBatch(){

    }
    //批次修改排序
    public function sortBatch(){

    }
    //匯入
    public function importHTML(){

    }
    public function import(){

    }
    //匯出
    public function export(){

    }

}
