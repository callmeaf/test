<?php

namespace App\Notifications\Channel\Contracts;

use App\DTO\SmsMessageDto;

interface SmsNotificationInterface
{
    public function toSms(object $notifiable): SmsMessageDto;
}
