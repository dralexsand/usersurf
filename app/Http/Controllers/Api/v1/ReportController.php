<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected ReportService $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getReport(Request $request)
    {
        $validated = $request->validate([
            'dt1' => 'required|string',
            'dt2' => 'required|string',
        ]);
        return $this->reportService->getReportWithData($request);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getReportUserData(Request $request)
    {
        $validated = $request->validate([
            'hash' => 'required|string',
        ]);
        return $this->reportService->getReportDataByHash($request);
    }
}
