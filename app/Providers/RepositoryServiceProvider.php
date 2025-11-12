<?php

namespace App\Providers;

use App\Repositories\AccountRepo;
use App\Repositories\BaseRepo;
use App\Repositories\CardRepo;
use App\Repositories\Contracts\AccountRepoInterface;
use App\Repositories\Contracts\BaseRepoInterface;
use App\Repositories\Contracts\CardRepoInterface;
use App\Repositories\Contracts\TransactionRepoInterface;
use App\Repositories\Contracts\UserRepoInterface;
use App\Repositories\TransactionRepo;
use App\Repositories\UserRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $bindings = [
        BaseRepoInterface::class => BaseRepo::class,
        UserRepoInterface::class => UserRepo::class,
        AccountRepoInterface::class => AccountRepo::class,
        CardRepoInterface::class => CardRepo::class,
        TransactionRepoInterface::class => TransactionRepo::class,
    ];
}
