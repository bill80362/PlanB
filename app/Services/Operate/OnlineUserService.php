<?php

namespace App\Services\Operate;

use Illuminate\Support\Facades\Redis;

class OnlineUserService
{
    protected int $ttl = 15;

    protected $redis;

    public function __construct()
    {
        $this->ttl = env('ONLINE_TTL', 15); //存活時間(多久不操作算是離線)
        $this->redis = Redis::connection('online'); //使用config database的redis連線
    }

    //放在middleware，$key不重複則算1，重複則不重複統計
    /**
     * 建議放在middleware
     *
     * @param $key string 不重複則算1，重複則不重複統計，ex:session()->getId()
     * @param $value string
     * @return bool
     */
    public function setOnline(string $key, string $value)
    {
        //上線設定
        return $this->redis->setEx($key, $this->ttl, $value);
    }

    //取得線上人數
    public function getCount()
    {
        return $this->redis->command('dbSize');
    }
}
