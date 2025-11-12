<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface TransactionRepoInterface extends BaseRepoInterface
{
    public function getTopUsersByTransactionCount(int $totalUsers,int $totalTransactions): Collection;
}
