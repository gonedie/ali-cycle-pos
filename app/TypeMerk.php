<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeMerk extends Model
{
    public function products_unit()
    {
        retrun $this->hasMany('App\ProductsUnit');
    }
}
