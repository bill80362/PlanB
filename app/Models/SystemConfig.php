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
