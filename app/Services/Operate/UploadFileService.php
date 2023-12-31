<?php

namespace App\Services\Operate;

use App\Models\SystemConfig;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UploadFileService
{
    //圖片名稱，對應目錄
    public array $imageDir = [
        SystemConfig::class => [
            "logo" => [
                "dirName" => "SystemConfig",
                "mimes" => ["jpg","jpeg","gif","png","svg"],//檔案類型限制
                "max" => "1024",//檔案大小，1MB=1024
                "dimensions" => [//上傳圖片限制寬高
//                "width" => 100,
//                "height" => 100,
//                "min_width" => 100,
//                "min_height" => 100,
                    "max_width" => 1000,
                    "max_height" => 1000,
                ],
                "onlySuggestDimension" => true,//設定true，代表只是建議尺寸，實際不擋住
            ]
        ],
        User::class => [

        ],
    ];

    public array $dirRule = [
        "SystemConfig" => [

        ],
    ];

    //抓取設定檔，會抓取parent class的設定檔
    public function getTableColumnDir(Model $model,$column)
    {
        foreach ($this->imageDir as $key => $values) {
            if ($model instanceof $key) {
                foreach ($values as $columnName => $columnInfo){
                    if($columnName==$column){
                        return $columnInfo;
                    }
                }
            }
        }
        return false;
    }

    //轉驗證器使用
    public function getUploadImageLimitMine(Model $model,$Column){
        //
        $columnInfo = $this->getTableColumnDir($model,$Column);
        //
        if(!isset($columnInfo["mimes"])) return "";
        //
        return "mimes:".implode(",",$columnInfo["mimes"]);
    }
    public function getUploadImageLimitDimensions(Model $model,$Column){
        //
        $columnInfo = $this->getTableColumnDir($model,$Column);
        //
        if(!isset($columnInfo["dimensions"])) return "";
        //只是建議尺寸，不限制
        if($columnInfo["onlySuggestDimension"]) return "";
        //
        $dimensionsContent = [];
        foreach ($columnInfo["dimensions"] as $key => $value){
            $dimensionsContent[] = "{$key}={$value}";
        }
        //
        return "dimensions:".implode(",",$dimensionsContent);
    }
    public function getUploadImageLimitMax(Model $model,$Column){
        //
        $columnInfo = $this->getTableColumnDir($model,$Column);
        //
        if(!isset($columnInfo["max"])) return "";
        //
        return "max:".$columnInfo["max"];
    }
    //前端顯示訊息，限制檔案類型、檔案上限、建議圖片大小、限制圖片大小
    public function viewUploadImageLimitTips(Model $model,$Column){
        //
        $columnInfo = $this->getTableColumnDir($model,$Column);
        //
        return view("tools/upload_image_limit/tips",[
            "Data" => $columnInfo,
        ]);
    }
    //
    public function uploadFile(Model $model,$Column,$file,$fileName,bool $coverFile){
        //檔案名稱附檔名強制改小寫
        $newFileName = pathinfo($fileName,PATHINFO_FILENAME);
        $newFileExt = pathinfo($fileName,PATHINFO_EXTENSION);
        $fileName = $newFileName.".".strtolower($newFileExt);
        //
        $columnInfo = $this->getTableColumnDir($model,$Column);
        //不覆蓋檔案，檔案如果已經存在，直接回覆檔名
        if(!$coverFile && Storage::disk('public')->exists($fileName)){
            return $fileName;
        }
        //
        return Storage::disk('public')->putFileAs($columnInfo["dirName"], $file , $fileName);
    }
    //檔案儲存的路徑
    public function getStorage(): \Illuminate\Contracts\Filesystem\Filesystem
    {
        return Storage::disk('public');
    }
    public function getPath(){
        return Storage::disk('public')->path('');
    }
    public function url($file){
        return asset('storage/'.$file);
    }
    public function del($file){
        return Storage::disk('public')->delete($file);
    }
}
