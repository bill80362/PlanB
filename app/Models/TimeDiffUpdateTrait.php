<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Config;

/**
 * 時間差功能
 * 
 * 使用方式：
 * 1. model 掛載：UpdateEventTrait。
 * 2. 要使用的路由需掛載： (UpdateEvent.php) => Route::middleware(['common.updateEvent'])
 * 3. 前台需送出欄位updated_at
 */
trait TimeDiffUpdateTrait
{

    /**
     * 需檢查時間差修改的欄位，如果為空就是全部檢查。
     */
    abstract static function updatingCheck(): array;

    public static function bootTimeDiffUpdateTrait()
    {
        static::updating(function ($model) {
            if (self::isEnabled()) {
                $modelClass = new static;
                $anotherModel = $modelClass->whereId($model->id)->first();
                $dirties = collect($model->getDirty())->except(['updated_at']);
                $needCheck = $dirties->hasAny(static::updatingCheck()) || (count(static::updatingCheck()) == 0);

                if ($needCheck && $anotherModel->updated_at > $model->updated_at) {
                    throw ValidationException::withMessages([
                        'message' => __('你慢了一步，此資料已更新，請重新整理')
                    ]);
                }
            }
        });
    }

    protected static function isEnabled(): bool
    {
        if (App::runningInConsole()) {
            return false;
        }

        return Config::get('common.time_diff_update', false);
    }
}
