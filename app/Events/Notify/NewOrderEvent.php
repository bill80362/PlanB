<?php

namespace App\Events\Notify;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewOrderEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    //定義此class擁有的參數
    public $mailData = [];
    public $smsData = [];
    public $lineNotifyData = [];

    /**
     * Create a new event instance.
     */
    public function __construct(public array $Data)
    {
        $this->mailData = [
            'mailKey' => 'new_order',
            'userMail' => $Data['mail'],
            'fromMail' => $Data['fromMail'],
            'values' => [
                'price' => $Data['price'],
                'orderNum' => $Data['orderNum'],
            ]
        ];

        $this->lineNotifyData = [
            'message' => $Data['lineNotifyMessage']
        ];

        // $this->smsData = [
        //     'type' => $Data['type'],
        //     'name' => $Data['name'],
        //     'cellphone' => $Data['cellphone'],
        //     'content' => $Data['content'],
        // ];
    }
}
