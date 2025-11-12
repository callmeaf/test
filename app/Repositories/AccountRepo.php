<?php

namespace App\Repositories;

use App\Models\Account;

class AccountRepo extends BaseRepo
{
    public function __construct()
    {
        $this->model = app(Account::class);
    }
}
