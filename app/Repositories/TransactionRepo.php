<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\Contracts\TransactionRepoInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TransactionRepo extends BaseRepo implements TransactionRepoInterface
{
    public function __construct()
    {
        $this->model = app(Transaction::class);
    }

    public function getTopUsersByTransactionCount(int $totalUsers, int $totalTransactions): Collection
    {
        return $this->model::query()
            ->from('transactions as t')
            ->select([
                'a.user_id',
                'u.name',
                DB::raw('COUNT(t.id) AS total_transactions'),
                DB::raw("
            SUBSTRING_INDEX(
                GROUP_CONCAT(t.id ORDER BY t.created_at DESC SEPARATOR ','),
                ',',
                $totalTransactions
            ) AS latest_transactions_ids
        "),
            ])
            ->leftJoin('cards as c', 'c.number', '=', 't.source_card')
            ->leftJoin('accounts as a', 'a.id', '=', 'c.account_id')
            ->leftJoin('users as u','u.id','=','a.user_id')
            ->whereNotNull('a.user_id')
            ->groupBy('a.user_id','u.name')
            ->orderByDesc('total_transactions')
            ->take($totalUsers)
            ->get();
    }
}
