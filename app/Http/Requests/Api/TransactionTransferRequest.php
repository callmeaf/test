<?php

namespace App\Http\Requests\Api;

use App\Models\Card;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionTransferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'source_card' => ['required', 'string',Rule::exists(Card::class, 'number')],
            'destination_card' => ['required', 'string',Rule::exists(Card::class, 'number')],
            'amount' => ['required', 'integer','min:10000','max:1000000000'],
        ];
    }
}
