<?php

namespace App\Http\Controllers;

use PDF;
use App\Transaksi;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $date = $request->get('date');

        $transactions = Transaksi::orderBy('invoice_no', 'desc')
            ->where(function ($query) use ($q, $date) {
                if ($q) {
                    $query->where('invoice_no', 'like', '%'.$q.'%');
                    $query->orWhere('customer', 'like', '%'.$q.'%');
                }
                if ($date) {
                    $query->where('created_at', 'like', $date.'%');
                }
            })
            ->with('user')
            ->paginate(25);

        return view('transactions.index', compact('transactions', 'date'));
    }

    public function show(Transaksi $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function receipt(Transaksi $transaction)
    {
        return view('transactions.receipt', compact('transaction'));
    }

    public function pdf(Transaksi $transaction)
    {
        // return view('transactions.pdf', compact('transaction'));
        $pdf = PDF::loadView('transactions.pdf', compact('transaction'));

        return $pdf->stream($transaction->invoice_no.'.faktur.pdf');
    }
}
