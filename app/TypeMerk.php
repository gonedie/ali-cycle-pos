<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeMerk extends Model
{
    // protected $table = 'products_units';
    protected $fillable = ['nama_type'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
