<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\SystemConfig;
use App\Services\Operate\SystemConfigService;
use App\Services\Operate\UploadFileService;
use App\Services\Operate\UploadImageLimit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SystemController extends Controller
{
    public function __construct(
        protected Request $request,
        protected SystemConfigService $oSystemConfigService,
        protected SystemConfig $oModel,
        protected UploadFileService $oUploadFileService,
    ) {
    }

    public function updateHTML()
    {
        //
        return view('operate/pages/system/config', [
            'SystemConfigKeyValue' => $this->oSystemConfigService->SystemConfigKeyValue,
            'Model' => $this->oModel,
        ]);
    }

    public function update()
    {
        //
        $all_id = [];
        foreach ($this->oModel->SystemConfig as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $all_id[] = $value2['id'];
            }
        }
        //驗證
        foreach ($this->request->only($all_id) as $id => $content) {
            //如果是圖片，則要先上傳，再將content改成檔案名稱
            if (in_array($id, $this->oSystemConfigService->SystemConfigImageKey)) {
                $this->request->validate([
                    $id => [
                        $this->oUploadFileService->getUploadImageLimitMine($this->oModel,$id),
                        $this->oUploadFileService->getUploadImageLimitMax($this->oModel,$id),
                        $this->oUploadFileService->getUploadImageLimitDimensions($this->oModel,$id),
                    ],
                ]);
            }
        }
        //
        foreach ($this->request->only($all_id) as $id => $content) {
            //如果是圖片，則要先上傳，再將content改成檔案名稱
            if (in_array($id, $this->oSystemConfigService->SystemConfigImageKey)) {
                $content = '';
                if ($this->request->file($id)) {
//                    $content = Storage::disk('public')->putFile('input_file', $this->request->file($id));
                    $content = $this->oUploadFileService->uploadFile($this->oModel,$id,$this->request->file($id),$this->request->file($id)->getClientOriginalName(),true);
                }
            }
            //
            $Model = $this->oModel->find($id);
            if (! $Model) {
                //新增
                $this->oModel->create([
                    'id' => $id,
                    'content' => $content,
                ]);
            } elseif ($Model->content !== $content) {
                //修改
                $Model = $this->oModel->find($id);
                //
                $Model->content = $content;
                $Model->save();
            }
        }

        //
        return redirect("/operate/system")->with(['success' => '送出成功']);
    }

    public function deleteImage()
    {
        $Model = $this->oModel->find($this->request->string('id'));
        if ($Model) {
            //需要先刪除原本就存在的圖片
            Storage::disk('public')->delete($Model->content);
            //
            $Model->content = '';
            $Model->save();
        }

        //
        return redirect("/operate/system")->with(['success' => '送出成功']);
    }
}
