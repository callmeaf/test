<?php

namespace App\DTO;

class SmsMessageDto
{
    public function __construct(
        public string $receptor,
        public string $message,
    )
    {
    }
}
