<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Stok;
use App\HistoryStok;
use App\Transaksi;

class StokController extends Controller
{
    public function kartuStok(Request $request)
    {
        $q = $request->get('q');
        $date = $request->get('date');

        $stoks = Stok::orderBy('product_id', 'asc')
            ->whereHas('product', function ($query) use ($q, $date) {
                if ($q) {
                    $query->where('name', 'like', '%'.$q.'%');
                }
                if ($date) {
                    $query->where('created_at', 'like', $date.'%');
                }
            })
            ->with('product')
            ->paginate(25);
        return view('stok.kartu-stok', compact('stoks', 'date'));
    }

    public function getStokAkhir()
    {
        $stok = Stok::all();


        return collect($stoks);
    }



}
