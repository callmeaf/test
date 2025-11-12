<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TransactionTransferRequest;
use App\Services\TransactionService;

class TransactionController extends Controller
{
    public function __construct(protected TransactionService $transactionService)
    {
    }

    public function transfer(TransactionTransferRequest $request)
    {
        $transaction = $this->transactionService->cardToCard(
            sourceCard: $request->get('source_card'),
            destinationCard: $request->get('destination_card'),
            amount: $request->get('amount')
        );

        return response()->json([
            'success' => $transaction->wasRecentlyCreated,
            "reference_number" => $transaction->ref_number,
        ]);
    }
}
