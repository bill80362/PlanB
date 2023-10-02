<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemConfig extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    /**
     * 強制資料轉換
     *
     * @return Attribute
     */
    protected function content(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => (string)$value,
        );
    }

    public array $Column_Title_Text = [];

    //圖片上傳限制格式
    use UploadImageLimitTrait;
    public array $UploadImageLimit = [
        "logo" => [
            "mimes" => ["jpeg","png","jpg","gif","svg"],//檔案類型限制
            "max" => "1024",//檔案大小，1MB=1024
            "dimensions" => [//上傳圖片限制寬高
//                "width" => 100,
//                "height" => 100,
//                "min_width" => 100,
//                "min_height" => 100,
                "max_width" => 300,
                "max_height" => 150,
            ],
        ],
    ];

    //DB儲存的資料
    public array $SystemConfig = [
        '系統設定' => [
            [
                'id' => 'qc_check',
                'title' => 'QC檢核開關',
                'content' => '', //DB抓取後會覆蓋這個職
                'input' => 'select', //後臺操作的模式
                'options' => [
                    'Y' => '開',
                    'N' => '關',
                ],
            ],
            [
                'id' => 'use_url_map',
                'title' => '是否啟用語系url收集',
                'content' => '', //DB抓取後會覆蓋這個職
                'input' => 'select', //後臺操作的模式
                'options' => [
                    'Y' => '開',
                    'N' => '關',
                ],
            ],
        ],
        '商品設定' => [
            [
                'id' => 'spec1',
                'title' => '商品預設規格一名稱',
                'content' => '',
                'input' => 'text',
                'options' => [],
            ],
            [
                'id' => 'spec2',
                'title' => '商品預設規格二名稱',
                'content' => '',
                'input' => 'text',
                'options' => [],
            ],
            [
                'id' => 'spec3',
                'title' => '商品預設規格三名稱',
                'content' => '',
                'input' => 'text',
                'options' => [],
            ],
        ],
        '圖片設定' => [
            [
                'id' => 'logo',
                'title' => '後台系統LOGO',
                'content' => '',
                'input' => 'img',
                'options' => [],
            ],
        ],
    ];
}
