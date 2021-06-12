<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';

    protected $primaryKey = 'id';

    protected $ForeignKey = 'cart_id';

    public function user()
    {
        return $this->belongsTo([Order::class]);
    }
}
