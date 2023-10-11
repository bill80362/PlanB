<?php

namespace App\Models\CountryAndShippingFee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class LangUrlMap extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $keyType = 'int';
    // protected $table = 'table name';
    protected $guarded = [];

    //事件偵測 retrieved, creating, created, updating, updated, saving, saved, deleting, deleted, restoring, restored
    protected $dispatchesEvents = [
        // 'saving' => '',
        // 'created' => '',
        // 'updated' => '',
    ];

    protected function url(): Attribute
    {
        return Attribute::make(
            get: function (string|null $value) {
                $check = Str::startsWith($value, 'operate');
                if ($check) {
                    return config('app.url') . '/' . $value;
                }
                return  "前台網址+ /" . $value;
            }
        );
    }

    public array $Column_Title_Text = [];
}
