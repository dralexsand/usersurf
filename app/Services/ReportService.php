<?php

declare(strict_types=1);


namespace App\Services;


use App\Models\Stat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportService
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getReport(Request $request)
    {
        $data = DB::table('stats')
            ->select(
                DB::raw(
                    'count(*) as count, hash, url,
                    SUM(CAST(time_summary AS bigint)) AS total'
                )
            )
            ->groupBy('hash', 'url')
            ->orderBy('count', 'DESC')
            ->orderBy('total', 'DESC')
            ->get();

        return response($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getReportWithData(Request $request)
    {
        $dt1 = strtotime($request->dt1);
        $dt2 = strtotime($request->dt2);

        $dt = ((int)$dt2 >= (int)$dt1)
            ? [
                date('Y-m-d H:i:s', $dt1),
                date('Y-m-d H:i:s', $dt2),
            ] :
            [
                date('Y-m-d H:i:s', $dt2),
                date('Y-m-d H:i:s', $dt1),
            ];

        $data = DB::table('stats')
            ->select(
                DB::raw(
                    'count(*) as count, hash, url,
                    SUM(CAST(time_summary AS bigint)) AS total'
                )
            )
            ->whereBetween('time_in', $dt)
            ->groupBy('hash', 'url')
            ->orderBy('count', 'DESC')
            ->orderBy('total', 'DESC')
            ->get();

        return response($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getReportDataByHash(Request $request)
    {
        $data = Stat::whereHash($request->hash)->get();
        return response($data);
    }

}
