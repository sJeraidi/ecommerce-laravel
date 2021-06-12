<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $table='_brands';

    protected $primaryKey = 'brand_id';

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
