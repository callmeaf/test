<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ReportService;

class ReportController extends Controller
{
    public function __construct(protected ReportService $reportService)
    {
    }

    public function topUsers()
    {
        return $this->reportService->getTopUsersWithLatestTransactions(totalUsers: 3,totalTransactions: 10);
    }
}
