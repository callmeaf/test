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
use App\Services\Sms\Contracts\SmsServiceInterface;
use App\Services\Sms\KavenegarSmsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
