<?php

namespace Tests\Feature;

use App\Models\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetTopUsersWithLatestTransactionsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_process_of_card_to_card_transfer(): void
    {
        $card = Card::query()->inRandomOrder()->first();
        $anotherCard = Card::query()->inRandomOrder()->whereNot('id',$card->id)->first();
        if(empty($card)) {
            return;
        }
        $response = $this->postJson('api/transactions/transfer',[
            'source_card' => $card->getRawOriginal('number'),
            'destination_card' => $anotherCard->getRawOriginal('number'),
            'amount' => 100000,
        ]);

        $response->assertStatus(200);
    }
}
