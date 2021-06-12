<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Request;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'product_id';
    protected $table='products';

    protected $fillable = [
        'product_id',
        'product_name',
        'image',
        'category_id',
        'brand_id'
    ];

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function getCreatedAtAttribute($value)
    {
      return Carbon::parse($value)->diffForHumans();
    }

    public function brand()
    {
        return $this->hasOne(Brand::class);
    }

    public static function boot(){
        parent::boot();

        static::deleting(function(Product $product)
        {
            $product->category()->delete();
            $product->brand()->delete();
        });

        static::restoring(function(Product $product)
        {
            $product->category()->restore();
            $product->brand()->restore();
        });
    }

    public function getPrice()
    {
        $price=$this->product_price;
        return number_format($price, 2, ',' , ' ').' $';
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function getLimitQuntite($quantity, $product_id)
    {
        $product = Product::where('quantity', '>=', $quantity)->where('product_id', $product_id)->get(); 
        
        if ($product)
        {
            return true;
        }

        return false;
    }

   
}
