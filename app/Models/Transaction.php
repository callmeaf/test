<?php

namespace App\Models;

use App\Casts\MaskedCardNumber;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'ref_number',
        'source_card',
        'destination_card',
        'amount',
    ];

    protected $casts = [
        'source_card' => MaskedCardNumber::class,
        'destination_card' => MaskedCardNumber::class,
    ];

    public function sourceCard(): BelongsTo
    {
        return $this->mergeCasts([
            'source_card' => 'string',
            'destination_card' => 'string',
        ])->belongsTo(Card::class, 'source_card','number');
    }
}
