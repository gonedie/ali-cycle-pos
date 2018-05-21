<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeMerk extends Model
{
    protected $fillable = ['nama_type'];

    public function products_unit()
    {
        return $this->hasMany(ProductsUnit::class);
    }
}
