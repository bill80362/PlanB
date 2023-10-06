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
            set: fn ($value) => is_array($value)?implode(",",$value):$value,
        );
    }

    public array $Column_Title_Text = [];

    //DB儲存的資料
    public array $SystemConfig = [
        '左線預備' => [
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
                'id' => 'radio_template',
                'title' => 'Radio範本',
                'content' => '', //DB抓取後會覆蓋這個職
                'input' => 'radio', //後臺操作的模式
                'options' => [
                    'Y' => '開',
                    'N' => '關',
                ],
            ],
            [
                'id' => 'date_template',
                'title' => '日期選擇器',
                'content' => '', //DB抓取後會覆蓋這個職
                'input' => 'date', //後臺操作的模式
                'options' => [],
            ],
            [
                'id' => 'datetime_template',
                'title' => '日期時間選擇器',
                'content' => '', //DB抓取後會覆蓋這個職
                'input' => 'datetime', //後臺操作的模式
                'options' => [],
            ],
            [
                'id' => 'time_template',
                'title' => '時間選擇器',
                'content' => '', //DB抓取後會覆蓋這個職
                'input' => 'time', //後臺操作的模式
                'options' => [],
            ],
            [
                'id' => 'checkbox_template',
                'title' => '多選Checkbox範本',
                'content' => '', //DB抓取後會覆蓋這個職
                'input' => 'checkbox', //後臺操作的模式
                'options' => [
                    'A' => '選項A',
                    'B' => '選項B',
                    'C' => '選項C',
                ],
            ],
            [
                'id' => 'select2_template',
                'title' => '多選Select2範本',
                'content' => '', //DB抓取後會覆蓋這個職
                'input' => 'select2', //後臺操作的模式
                'options' => [
                    'A' => '選項A',
                    'B' => '選項B',
                    'C' => '選項C',
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
            [
                'id' => 'textarea_template',
                'title' => 'Textarea範本',
                'content' => '', //DB抓取後會覆蓋這個職
                'input' => 'textarea', //後臺操作的模式
                'options' => [],
            ],
            [
                'id' => 'filter_css_js',
                'title' => '輸入過濾css和js',
                'content' => 'N', //DB抓取後會覆蓋這個職
                'input' => 'radio', //後臺操作的模式
                'options' => [
                    'Y' => '開',
                    'N' => '關',
                ],
            ],
        ],
        '右線預備' => [
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
