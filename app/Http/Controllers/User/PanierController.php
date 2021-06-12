<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCart;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PanierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('add','panier', 'destroy');
    }

    // La fonction cart pour ajouter un produit au panier
    public function add(StoreCart $request)
    {
        if (Cart::get($request->product_id)) { 
                Cart::update($request->product_id, [
                    'quantity' => 1, 
                ]);
                return redirect()->route('product.index')->with('success', 'Le produit a déjà été ajouté');
        }

        $product = Product::findOrFail($request->product_id);
        
        Cart::add($product->product_id , $product->product_name, $product->product_price, 1)
            ->associate('App\Product');

        return redirect()->route('product.index')->with('success', 'Le produit a bien été ajouté');
    }

    
    public function panier()
    {
        if(Auth::check())
        {
           return view('User.Panier');
        }
    }

    public function update($id, StoreCart $request)
    {
        Cart::update($id, [
            'quantity' => ['relative' => false, 'value' => $request->quantity],
        ]);
        
        return redirect(route('panier.index'));
    }

    // La fonction destroy pour suprimer un produit d'un panier
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success', 'Le produit a bien été supprimé');
    }
    
}
