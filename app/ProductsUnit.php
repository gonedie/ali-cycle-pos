<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsUnit extends Model
{
    public function type_merks()
    {
        return $this->belongsTo('App\TypeMerk');
    }

}
