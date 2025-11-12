<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepoInterface;

class UserRepo extends BaseRepo implements UserRepoInterface
{
    public function __construct()
    {
        $this->model = app(User::class);
    }
}
