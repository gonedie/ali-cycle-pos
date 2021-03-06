<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $fillable = ['id', 'stok_awal', 'stok_akhir', 'penjualan_stok', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
