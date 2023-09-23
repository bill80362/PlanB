<?php

namespace App\Services\Notify;

use Exception;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function send($mailKey, array $values = [], $from = '', $to = '')
    {
        $content = $this->toMailAble($mailKey, $values);
        Mail::send($content['blade'], $content['values'], function ($message) use ($content, $from, $to) {
            $message->from($from)->subject(__($content['subject']));
            $message->to($to);
        });
    }

    public function toMailAble($mailKey, array $values = [])
    {
        $mails = $this->mails();
        if (!array_key_exists($mailKey, $mails)) {
            throw new Exception("無此 mailKey 參數");
            return;
        }

        $mailContent = $mails[$mailKey];
        $content = array_merge($mailContent['defaultValue'], $values);
        return [
            'name' => $mailContent['name'],
            'subject' => $mailContent['subject'],
            'blade' => $mailContent['blade'],
            'values' => $content,
        ];
    }


    /**
     * @param $name 信件名稱
     * @param $subject 信件中的主旨
     * @param $blade blade的路徑
     * @param $defaultValue 定義blade中應該會用到的資料，也可以當作後台預覽的資料用
     */
    public function mails()
    {
        return [
            'new_order' => [
                'name' => '新訂單通知',
                'subject' => '訂單 - 新訂單通知',
                'blade' => 'emails.orders.new_order',
                'defaultValue' => ['price' => 0],
            ],
            'order_shipped' => [
                'name' => '到貨通知',
                'subject' => '貨到通知信件',
                'blade' => 'emails.orders.shipped',
                'defaultValue' => [],
            ],
            'refund' => [
                'name' => '退款通知',
                'subject' => '退款通知信件',
                'blade' => 'emails.orders.shipped',
                'defaultValue' => [],
            ]
        ];
    }
}
