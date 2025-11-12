<?php

namespace Tests\Unit;

use App\Models\Transaction;
use PHPUnit\Framework\TestCase;

class TransactionMaskedCardNumberTest extends TestCase
{
    public function test_transaction_source_card_must_be_masked(): void
    {
        $transaction = Transaction::factory()->make([
            'source_card' => '6219631985154565',
            'destination_card' => '6219631985154565',
        ]);
        $this->assertNotSame(
            $transaction->getAttribute('source_card'),
            $transaction->getRawOriginal('source_card')
        );
    }

    public function test_transaction_destination_card_must_be_masked(): void
    {
        $transaction = Transaction::factory()->make([
            'source_card' => '6219631985154565',
            'destination_card' => '6219631985154565',
        ]);
        $this->assertNotSame(
            $transaction->getAttribute('destination_card'),
            $transaction->getRawOriginal('destination_card')
        );
    }
}
