<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Services\Operate\SystemConfigService;
use App\Services\Operate\UploadFileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class FileController extends Controller
{
    public function __construct(
        protected Request $request,
        protected SystemConfigService $oSystemConfigService,
        protected UploadFileService $oUploadFileService,
    ) {
    }

    public function uploadImage()
    {
        $this->request->validate([
            'image' => ['required', 'mimes:jpeg,png,jpg,gif'],
            'path' => ['required', Rule::in(['editor', 'news'])],
        ]);
        $image = $this->request->file('image');
        $path = $this->request->get('path');
        $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $name = $name ?: Str::uuid(); //無名稱隨機給
        $ext = $image->extension();
        $ext = strtolower($ext); //副檔名改小寫
        $filePath = $path . "/{$name}.{$ext}";
        $this->oUploadFileService->getStorage()->put($filePath, file_get_contents($image));

        return response([
            'url' => $this->oUploadFileService->url($filePath),
        ], 200);
    }
}
