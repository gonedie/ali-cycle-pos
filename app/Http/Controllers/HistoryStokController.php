<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Stok;
use App\HistoryStok;

class HistoryStokController extends Controller
{
    public function index(Request $request)
    {
        $editableProduct = null;
        $q = $request->get('q');
        $date = $request->get('date');

        $history = HistoryStok::orderBy('sm_no', 'desc')
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

        return view('stok.index', compact('history', 'editableUnit', 'date'));
    }

    public function store(Request $request)
    {
        $product = Stok::where('product_id', $request->product_id)->first();
        $stok = new Stok();

        $history = new HistoryStok();

        $history->sm_no = $this->getNewSmNo();
        $history->stok_masuk = $request->stok_masuk;
        $history->harga_beli = $request->harga_beli;
        $history->total = $request->total;
        $history->product_id = $request->product_id;

        $history->save();

        if($product != null)
        {
          $product->stok_awal  += $request->stok_masuk;
          $product->stok_akhir += $request->stok_masuk;
          $product->update();
        }
        else {
          $stok->stok_awal = $request->stok_masuk;
          $stok->stok_akhir = $request->stok_masuk;
          $stok->penjualan_stok = 0;
          $stok->product_id = $request->product_id;

          $stok->save();
        }

        flash(trans('stok.created'), 'success');

        return redirect()->route('stok.index');
    }

    public function getNewSmNo()
    {
        $prefix = 'SM-';

        $lastStok = HistoryStok::orderBy('sm_no', 'desc')->first();

        if (!is_null($lastStok)) {
            $lastSmNo = $lastStok->sm_no;
            if (substr($lastSmNo, 0, 3) == $prefix) {
                return ++$lastSmNo;
            }
        }

        return $prefix.'0001';
    }
}
