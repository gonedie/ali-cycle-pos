<?php

namespace App\Http\Controllers\Reports;

use App\Transaksi;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function daily(Request $request)
    {
        $date = $request->get('date', date('Y-m-d'));

        $transactions = Transaksi::orderBy('created_at', 'desc')
            ->where('created_at', 'like', $date.'%')
            ->get();

        return view('reports.sales.daily', compact('transactions', 'date'));
    }

    public function monthly(Request $request)
    {
        $years = getYears();
        $months = getMonths();
        $year = $request->get('year', date('Y'));
        $month = $request->get('month', date('m'));
        $reports = $this->getMonthlyReports($year, $month);

        return view('reports.sales.monthly', compact('reports', 'months', 'years', 'month', 'year'));
    }

    public function yearly(Request $request)
    {
        $year = $request->get('year', date('Y'));

        $reports = $this->getYearlyReports($year);
        $years = getYears();

        return view('reports.sales.yearly', compact('reports', 'years', 'year'));
    }

    private function getMonthlyReports($year, $month)
    {
        $rawQuery = 'DATE(created_at) as date, count(`id`) as count';
        $rawQuery .= ', sum(total) AS amount';

        $reportsData = DB::table('transaksis')->select(DB::raw($rawQuery))
            ->where(DB::raw('YEAR(created_at)'), $year)
            ->where(DB::raw('MONTH(created_at)'), $month)
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $reports = [];
        foreach ($reportsData as $report) {
            $key = substr($report->date, -2);
            $reports[$key] = $report;
            $reports[$key]->omzet = $report->amount;
        }

        return collect($reports);
    }

    private function getYearlyReports($year)
    {
        $rawQuery = 'MONTH(created_at) as month';
        $rawQuery .= ', count(`id`) as count';
        $rawQuery .= ', sum(total) AS amount';

        $reportsData = DB::table('transaksis')->select(DB::raw($rawQuery))
            ->where(DB::raw('YEAR(created_at)'), $year)
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('created_at', 'asc')
            ->get();

        $reports = [];
        foreach ($reportsData as $report) {
            $key = str_pad($report->month, 2, '0', STR_PAD_LEFT);
            $reports[$key] = $report;
            $reports[$key]->omzet = $report->amount;
        }

        return collect($reports);
    }
}
