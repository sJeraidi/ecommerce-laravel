<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table='_categorys';


    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
