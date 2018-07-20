<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Product;
use App\TypeMerk;
use App\Stok;
use DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaksi::count();
        $products = Product::count();
        $type_merks = TypeMerk::count();
        $stoks = Stok::with('product')->get();

        $reports = $this->getMonthlyReports();

        return view('layouts.dashboard', compact('transactions', 'products','type_merks', 'reports', 'stoks'));
    }

    private function getMonthlyReports()
    {
        $rawQuery = 'DATE(created_at) as date, count(`id`) as count';
        $rawQuery .= ', sum(total) AS amount';

        $reportsData = DB::table('transaksis')->select(DB::raw($rawQuery))
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
}
