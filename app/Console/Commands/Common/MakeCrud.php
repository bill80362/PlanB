<?php

namespace App\Console\Commands\Common;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

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
        // 產生model
        Artisan::call("make:model " . $modelname . " -m");
        // 產生controller
        Artisan::call("make:controller " . $modelname . "Controller" . " --model=" . $modelname);
        // @todo 產生blade
        $stubPath = base_path('stubs') . '/blade/';
        $bladeNames = ['stub_list', 'stub_update'];

        // @todo 路由


        // ListColumnService.php MenuService.php PermissionService.php
    }
}
