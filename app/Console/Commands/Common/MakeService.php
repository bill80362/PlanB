<?php

namespace App\Console\Commands\Common;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Foundation\Console\ModelMakeCommand;

class MakeService extends GeneratorCommand
{

    /**
     * @example php artisan make:service Payment/LinePayService
     * @var string
     */
    protected $signature = 'make:service {name}';



    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '指令建立 service class';

     /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    /**
     * Determine if the class already exists.
     *
     * @param  string  $rawName
     * @return bool
     */
    protected function alreadyExists($rawName)
    {
        return class_exists($rawName);
    }

     /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/service.stub';
    }

     /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return is_dir(app_path('Services')) ? $rootNamespace.'\\Services' : $rootNamespace;
    }

}
