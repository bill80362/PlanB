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
        $uuid = Str::uuid();
        $ext = $image->extension();
        $filePath = $path . "/{$uuid}.{$ext}";
        $this->oUploadFileService->getStorage()->put($filePath, file_get_contents($image));

        return response([
            'url' => $this->oUploadFileService->url($filePath),
        ], 200);
    }
}
