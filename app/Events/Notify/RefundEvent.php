<?php

namespace App\Events\Notify;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RefundEvent
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
            'mailKey' => 'refund',
            'values' => [
                'price' => $Data['price'],
                'orderNum' => $Data['order_num'],
            ],
            'userMail' => $Data['mail']
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
