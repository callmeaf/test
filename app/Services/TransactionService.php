<?php

namespace App\Services;

use App\Notifications\TransactionCreated;
use App\Repositories\Contracts\TransactionRepoInterface;

class TransactionService
{
    public function __construct(protected TransactionRepoInterface $transactionRepo)
    {
    }

    public function cardToCard(string $sourceCard,string $destinationCard,int $amount)
    {
        $transaction = $this->transactionRepo->create([
            'ref_number' => $this->generateUniqueRefNumber(),
            'source_card' => $sourceCard,
            'destination_card' => $destinationCard,
            'amount' => $amount,
        ]);

        if($transaction->wasRecentlyCreated) {
            $transaction->sourceCard->user->notify(new TransactionCreated());
        }

        return $transaction;
    }

    private function generateUniqueRefNumber(): string
    {
        $prefix = config('transaction.prefix','');
        do {
            $ref = str($prefix)->append(
                rand(10000,99999)
            )->toString();
        } while ($this->transactionRepo->exists('ref_number',$ref));

        return $ref;
    }
}
