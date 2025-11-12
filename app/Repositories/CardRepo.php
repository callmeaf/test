<?php

namespace App\Repositories;

use App\Models\Card;

class CardRepo extends BaseRepo
{
    public function __construct()
    {
        $this->model = app(Card::class);
    }
}
