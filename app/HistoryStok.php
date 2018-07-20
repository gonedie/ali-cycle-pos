<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryStok extends Model
{
    protected $fillable = ['sm_no', 'stok_masuk','harga_beli', 'total', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
