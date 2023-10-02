<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;
use Illuminate\Support\Facades\Schema;
use Exception;

class ModelTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * 測試所有model Column_Title_Text欄位是否有非db欄位
     */
    public function test_model_column(): void
    {
        $datas = $this->getModels(app_path('Models'));
        foreach ($datas as $data) {
            $pathname = $data->getPathname();
            $splitStr = explode('\\app\\', $pathname);
            $class = "App\\" . str_replace(".php", "", $splitStr[1]);
            if (class_exists($class)) {
                $model = app($class);
                if ($model instanceof Model) {
                    if (!is_array($model->Column_Title_Text)) {
                        throw new Exception($class . "沒有 Column_Title_Text欄位");
                    } else {
                        $dbColumns = Schema::getColumnListing($model->getTable());
                        $columns = array_keys($model->Column_Title_Text);
                        $check = collect($columns)->diff($dbColumns)->values()->all();

                        if (count($check) > 0) {
                            $columnStr = join(',', $check);
                            throw new Exception($class . "的Column_Title_Text欄位有非資料庫欄位: " . $columnStr);
                        }
                    }
                }
            }
        }
        $this->assertTrue(true);
    }



    /**
     * @return SplFileInfo[]
     */
    function getModels($path)
    {
        $out = [];
        $modelFiles = File::allFiles($path);
        foreach ($modelFiles as $result) {
            if ($result->isDir()) {
                $out = array_merge($out, $this->getModels($result->getPath()));
            } else {
                $out[] = $result;
            }
        }
        return $out;
    }
}
