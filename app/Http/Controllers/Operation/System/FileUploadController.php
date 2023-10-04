<?php

namespace App\Http\Controllers\Operation\System;

use App\Http\Controllers\Controller;
use App\Models\FileUpload;
use App\Services\Operate\ListColumnService;
use App\Services\Operate\SystemConfigService;
use App\Services\Operate\UploadFileService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function __construct(
        protected Request $request,
        protected SystemConfigService $oSystemConfigService,
//        protected FileUpload $oModel,
        protected UploadFileService $oUploadFileService,
        protected ListColumnService $listColumnService,
    ) {
    }

    public function listHTML(){
        //
        $dirList = $this->oUploadFileService->getStorage()->allDirectories();
        //
        $DataArray = [];
        foreach ($dirList as $dirName){
            //統計size總和
            $size = 0;
            foreach ($this->oUploadFileService->getStorage()->files($dirName) as $fileName){
                $size += Storage::disk('public')->size($fileName);
            }
            //資料集合
            $Temp = [
                "id" => $dirName,
                "url" => $this->oUploadFileService->getStorage()->url($dirName),
                "files" => $this->oUploadFileService->getStorage()->files($dirName),
                "size" => $size,
            ];
            $DataArray[] = (object) $Temp;
        }
        //將資料轉成分頁集合
        $collection = new Collection($DataArray);
        $Paginator = new Paginator($collection,1000,1);
        //
        return view('operate/pages/file_upload/list', [
            'Paginator' => $Paginator,
        ]);
    }
    public function updateHTML($id){
        //
        $files = $this->oUploadFileService->getStorage()->files($id);
        //
        $DataArray = [];
        foreach ($files as $file){
            $Temp = [];
            $Temp["file"] = $file;
            $Temp["url"] = $this->oUploadFileService->url($file);
            $Temp["size"] = $this->oUploadFileService->getStorage()->size($file);
            $Temp["updated_at"] = $this->oUploadFileService->getStorage()->lastModified($file);
            //
            $DataArray[] = (object) $Temp;
        }
        //View
        return view('operate/pages/file_upload/update', [
            'DirName' => $id,
            'DataList' => $DataArray,
        ]);
    }
    public function delBatch(){
        //刪除
        foreach ((array) $this->request->post('id_array') as $id) {
            $this->oUploadFileService->del($id);
        }

        //
        return redirect()->back()->with(['success' => '刪除成功']);
    }
}
