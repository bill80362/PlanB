<?php

namespace App\Listeners;

use App\Events\MemberDataSavingEvent;
use App\Events\PodcastProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Validation\ValidationException;
use App\Models\Member\Member_Data;

class MemberDataSaving
{
    //需要更新前檢查是否有改過的欄位，可以考慮一至Model中一起控管。
    public $updateFiledCheck = [
        'Login_Email',
        // 'Name'
    ];

    /**
     * Handle the event.
     *
     * @param  \App\Events\MemberDataSavingEvent $event
     * @return mixed
     */
    public function handle(MemberDataSavingEvent $event)
    {
        //
        echo "我是 MemberDataSaving";

        /**
         * 實作時間差更新問題，這邊先使用laravel原本的欄位updated_at實作
         */
        if ($event->oMember_Data->ID ?? null) {
            $dirty = $event->oMember_Data->getDirty();
            // $dirtyKey = array_keys($dirty);            
            
            // 如果$updateFiledCheck為空，就是檢查全部
            $check = true;
            if(count($this->updateFiledCheck) != 0){
                $check = collect($dirty)->hasAny($this->updateFiledCheck);
            }

            if ($check) {
                $memberData = Member_Data::whereId($event->oMember_Data->ID)->first();
                if ($memberData->updated_at > $event->oMember_Data->updated_at) {
                    throw ValidationException::withMessages([
                        'message' => '你慢了一步，此資料已更新，請重新整理'
                    ]);
                }
            }
        }
    }
}
