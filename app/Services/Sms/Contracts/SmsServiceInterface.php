<?php

namespace App\Services\Sms\Contracts;

interface SmsServiceInterface
{
    public function send(string $receptor, string $message);
}
