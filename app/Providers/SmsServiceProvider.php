<?php

namespace App\Providers;

use App\Services\Sms\Contracts\SmsServiceInterface;
use App\Services\Sms\MockSmsService;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    // default sms channel
    public $bindings = [
        SmsServiceInterface::class => MockSmsService::class,
    ];
}
