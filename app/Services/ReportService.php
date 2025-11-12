<?php

namespace App\Services;

use App\Models\Transaction;
use App\Repositories\Contracts\TransactionRepoInterface;
use Illuminate\Database\Eloquent\Collection;

class ReportService
{
    public function __construct(protected TransactionRepoInterface $transactionRepo)
    {

    }

    public function getTopUsersWithLatestTransactions(int $totalUsers,int $totalTransactions): Collection
    {
        return $this->transactionRepo->getTopUsersByTransactionCount(
            totalUsers: $totalUsers,
            totalTransactions: $totalTransactions
        )->map(function ($item) {
            $latestTransactionsIds = explode(',', $item->latest_transactions_ids);
            $item->latest_transactions = Transaction::query()->select([
                'ref_number as reference_number',
                'source_card',
                'destination_card',
                'amount',
                'created_at'
            ])->whereIn('id',$latestTransactionsIds)->get();

            unset($item->latest_transactions_ids);

            return $item;
        });
    }
}
