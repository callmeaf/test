<?php

namespace App\Services\Sms;

use App\Services\Sms\Contracts\SmsServiceInterface;
use Illuminate\Support\Facades\Log;

class MockSmsService implements SmsServiceInterface
{
    public function send(string $receptor, string $message): void
    {
        Log::info("Sending Mock sms.",[
            'receptor' => $receptor,
            'message' => $message
        ]);
    }
}
