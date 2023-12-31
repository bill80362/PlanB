<?php

namespace App\Tools\OnlineUser;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class OnlineUserTool
{
    protected int $ttl = 15;
    protected $redis;

    public function __construct()
    {
        $this->ttl = env('ONLINE_TTL', 15); //存活時間(多久不操作算是離線)
//        try{
//            $this->redis = Redis::connection('online'); //使用config database的redis連線
//        }catch(\Exception $e){
//            Log::channel('daily')->error($e->getMessage());
//            $this->redis = false;
//        }
        $this->redis = false;
    }

    /**
     * 建議放在middleware
     *
     * @param $key string 不重複則算1，重複則不重複統計，ex:session()->getId()
     * @param $value string
     * @return bool
     */
    public function setOnline(string $key, string $value)
    {
        if(!$this->redis) return false;
        //上線設定
        return $this->redis->setEx($key, $this->ttl, $value);
    }

    //取得線上人數
    public function getCount()
    {
        if(!$this->redis) return 0;
        return $this->redis->command('dbSize');
    }

    public function viewCounter(){
        if(!$this->redis) return false;
        return view("tools.online_user.counter",[
            "Count" => $this->getCount(),
        ]);
    }
}
