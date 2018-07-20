<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id', 'name', 'harga_jual', 'kondisi', 'type_merk_id'];

    public function getPrice()
    {
        return $this->harga_jual;
    }
    public function type_merk()
    {
        return $this->belongsTo(TypeMerk::class);
    }

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }

    public function history()
    {
        return $this->hasMany(HistoryStok::class);
    }
}
