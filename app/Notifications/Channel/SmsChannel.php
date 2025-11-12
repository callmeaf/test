<?php

namespace App\Notifications\Channel;

use App\Notifications\Channel\Contracts\SmsNotificationInterface;
use App\Services\Sms\Contracts\SmsServiceInterface;
use Illuminate\Notifications\Notification;

class SmsChannel
{
    public function __construct(protected SmsServiceInterface $smsService)
    {
    }

    public function send(object $notifiable,Notification $notification): void
    {
        if($notification instanceof SmsNotificationInterface) {
            $smsMessageDto = $notification->toSms($notifiable);
            $this->smsService->send(
                receptor: $smsMessageDto->receptor,
                message: $smsMessageDto->message
            );
        }
    }
}
