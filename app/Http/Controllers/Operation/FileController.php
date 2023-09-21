<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\SystemConfig;
use App\Services\Operate\SystemConfigService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function __construct(
        protected Request $request,
        protected SystemConfigService $oSystemConfigService
    ) {
    }


    public function uploadImage()
    {
        $this->request->validate([
            'image' => ['required', 'mimes:jpeg,png,jpg,gif'],
            'path' => ['required', Rule::in(['editor', 'news'])]
        ]);
        $image = $this->request->file('image');
        $path = $this->request->get('path');
        $uuid = Str::uuid();
        $filePath = $path . "/{$uuid}.jpg";
        Storage::disk('public')->put($filePath, file_get_contents($image));
        return response([
            'url' => "/storage/{$filePath}"
        ], 200);
    }
}
