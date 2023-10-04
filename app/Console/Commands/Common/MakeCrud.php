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
        //變數名稱轉換

        // 產生model
        Artisan::call("make:model " . $modelname . " -m");
        // 產生controller
        Artisan::call("make:controller " . $modelname . "Controller" . " --model=" . $modelname);

        // 產生blade
        $stubPath = base_path('stubs') . '/blade/';
        $bladeNames = ['list', 'update']; // ['stub_list', 'stub_update']

        $splitStrs = explode("/", $modelname);
        $subPath = collect($splitStrs)->map(function ($item) {
            return Str::snake($item);
        })->join('/') . '/';

        $tagetPath = resource_path('views/operate/pages/' . $subPath);

        (new Filesystem)->ensureDirectoryExists($tagetPath);
        foreach ($bladeNames as $bladeName) {
            $fullPath = $tagetPath . $bladeName;
            $stubFile = $stubPath . 'stub_' . $bladeName . '.blade.php';  // 範本檔
            $newFile = $fullPath . '.blade.php'; // 實際要建立的檔
            if (file_exists($stubFile)) {
                $stubContent = file_get_contents($stubFile);
                file_put_contents($newFile, $stubContent);
            }
            // dump($stubFile);
            // dump($newFile);
        }

        // @todo 路由



        // ListColumnService.php MenuService.php PermissionService.php
    }
}
