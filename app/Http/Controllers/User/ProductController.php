<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // la fonction product pour récupérer la list des produits
    public function product()
    {
       $products = Product::paginate(10);
      
       return view('user.ProductU', 
            [
                'products' => $products
            ]);
    }
}
