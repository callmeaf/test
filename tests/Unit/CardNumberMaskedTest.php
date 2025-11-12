<?php

namespace Tests\Unit;

use App\Models\Card;
use PHPUnit\Framework\TestCase;

class CardNumberMaskedTest extends TestCase
{
    public function test_card_source_card_must_be_masked(): void
    {
        $card = Card::factory()->make([
            'number' => '6219631985154565',
        ]);
        $this->assertNotSame(
            $card->getAttribute('number'),
            $card->getRawOriginal('number')
        );
    }

}
