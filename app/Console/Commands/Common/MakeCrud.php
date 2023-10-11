<?php

namespace App\Console\Commands\Common;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {modelname}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '建立後台crud';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $modelname = $this->argument('modelname');

        $splitStrs = explode("/", $modelname);
        $subPathArr = collect($splitStrs)->map(function ($item) {
            return Str::snake($item);
        });

        $subPath = $subPathArr->join('/');

        // 產生名稱
        $snacktName = $subPathArr->last();    // 如： TestUser => test_user
        $camelName = Str::camel($snacktName); // 如： test_user => testUser
        $controllerName = 'Operation/' . $modelname . "Controller";


        // 產生model
        Artisan::call("make:model " . $modelname . " -m");
        // 產生controller
        Artisan::call("make:controller " . $controllerName . " --model=" . $modelname);

        $controllerPath = app_path('Http/Controllers/' . $controllerName) . ".php";
        // if (file_exists($controllerPath)) {
        //     $controllerContent = file_get_contents($controllerPath);
        //     $controllerContent = str_replace("{{r_blade_folder}}", $subPath, $controllerContent);
        //     $controllerContent = str_replace("{{r_url}}", $snacktName, $controllerContent);
        //     file_put_contents($controllerPath, $controllerContent);
        // }

        $result = $this->stubToFile($controllerPath, [
            "{{r_blade_folder}}"  => $subPath,
            "{{r_url}}" => $snacktName
        ], $controllerPath);


        // 產生blade
        $stubPath = base_path('stubs') . '/blade/';
        $bladeNames = ['list.blade.php', 'update.blade.php']; // ['stub_list.blade.php', 'stub_update.blade.php']
        $tagetPath = resource_path('views/operate/pages/' . $subPath . '/');

        (new Filesystem)->ensureDirectoryExists($tagetPath);
        foreach ($bladeNames as $bladeName) {

            $fullPath = $tagetPath . $bladeName;
            $stubFile = $stubPath . 'stub_' . $bladeName;  // 範本檔
            $result = $this->stubToFile($stubFile, [
                "{{route}}_"  => $snacktName . '_',
                "{{perm}}_" => $camelName . '_'
            ], $fullPath);

            if (!$result) {
                dump("發生錯誤，找不到： " . $stubFile);
            } else {
                dump("建立成功： " . $fullPath);
            }
        }

        // 路由

        $targetText = "// 請勿刪除此行註解，stub產生放置位置，請將產生出來的註解程式移至下面route並移除註解。";
        $targetFile = base_path('routes/web/operate.php');
        $routeSubPath = base_path('stubs/route/operate.stub');

        $namespace = str_replace("/", "\\", $controllerName);

        $result = $this->stubToFile($routeSubPath, [
            "{{ r_prefix }}"  => $snacktName,
            "{{ r_perm }}" => $camelName,
            "{{ r_controller }}" => "\App\Http\Controllers\\" . $namespace
        ], $targetFile, $targetText);

        if (!$result) {
            dump("發生錯誤，找不到： " . $stubFile);
        } else {
            dump("建立成功： " . $fullPath);
        }

        /**
         * 需修改以下檔案
         */
        // migration
        // model
        // permissionService.php
        // ListColumnService.php
        // MenuService.php
        // route、controller(確認)
        // list.blade.php、update.blade.php

    }

    public function stubToFile(
        $stubFilePath,
        $stubParam = [],
        $targetFilePath,
        $targetSubject = ''
    ) {

        if (!file_exists($stubFilePath)) return false;
        $stubContent = file_get_contents($stubFilePath);
        foreach ($stubParam as $key => $value) {
            $stubContent = str_replace($key, $value, $stubContent);
        }


        if (file_exists($targetFilePath) && $targetSubject != '') {
            // 取代
            $targetContent = file_get_contents($targetFilePath);
            $newContent = str_replace($targetSubject, $stubContent, $targetContent);
            file_put_contents($targetFilePath, $newContent);
        } else {
            // 建立
            file_put_contents($targetFilePath, $stubContent);
        }

        return true;
    }
}
