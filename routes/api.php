<?php

use App\Http\Controllers\Api\ReportController;
use Illuminate\Support\Facades\Route;

Route::post('transactions/transfer',[\App\Http\Controllers\Api\TransactionController::class,'transfer']);
Route::get('reports/top-users',[ReportController::class,'topUsers']);
