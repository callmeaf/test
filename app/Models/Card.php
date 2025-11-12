<?php

namespace App\Models;

use App\Casts\MaskedCardNumber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_id',
        'number'
    ];

    protected $casts = [
        'number' => MaskedCardNumber::class,
    ];

    public function user(): HasOneThrough
    {
        return $this->hasOneThrough(User::class, Account::class, 'id', 'id', 'account_id','user_id');
    }

    public function transactions(): HasMany
    {
        return $this->mergeCasts([
            'number' => 'string',
        ])->hasMany(Transaction::class,'source_card','number');
    }
}
