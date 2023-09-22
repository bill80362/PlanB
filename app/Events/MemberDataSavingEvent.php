<?php

namespace App\Events;

use App\Models\Member\Member_Data;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MemberDataSavingEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $oMember_Data;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Member\ $oMember_Data
     */
    public function __construct(Member_Data $oMember_Data)
    {
        $this->oMember_Data = $oMember_Data;
    }
}
