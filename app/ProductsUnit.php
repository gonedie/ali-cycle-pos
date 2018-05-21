<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsUnit extends Model
{
    protected $fillable = ['id', 'nama_unit', 'harga_jual', 'kondisi', 'type_merk_id'];

    public function type_merks()
    {
        return $this->belongsTo(TypeMerk::class);
    }

}
