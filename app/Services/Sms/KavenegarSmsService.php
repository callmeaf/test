<?php

namespace App\Services\Sms;

use App\Services\Sms\Contracts\SmsServiceInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

// https://kavenegar.com/rest.html
class KavenegarSmsService implements SmsServiceInterface
{
    public function send(string $receptor, string $message): void
    {
        try {
            $response = $this->http()->post('/sms/send.json',[
                'receptor' => $receptor,
                'message' => $message,
            ]);

            if($this->isSuccessfulResponse($response)) {
                Log::info("Message sent by Kavenegar" ,[
                    'response' => $response->json(),
                ]);
            } else {
                Log::info("Message not sent by Kavenegar",[
                    'response' => $response->json()
                ]);
            }

        } catch (\Exception $exception) {
            Log::critical($exception);
        }
    }

    private function http(): \Illuminate\Http\Client\PendingRequest|\Illuminate\Http\Client\Factory
    {
        $apiKey = config('kavenegar.api_key');
        return Http::baseUrl("https://api.kavenegar.com/v1/$apiKey");
    }

    private function isSuccessfulResponse(PromiseInterface|Response $response): bool
    {
        return (int) $response->json('return.status') === 200;
    }
}
