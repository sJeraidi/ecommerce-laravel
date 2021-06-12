<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'product', 'Details', 'Search']);
    }

    // La page home
    public function index()
    {
        return view('user.home');
    }

    // La fonction qui renvoie les détails du produit
    public function Details($id)
    {
        $product = Product::findOrFail($id);
        
        $stock = $product->quantity === 0 ? 'Indisponible' : 'Disponible';
        
        return view('user.Details',['product' => $product, 'stock' => $stock]);
    }

    // La fonction qui renvoie les produits à rechercher 
    public function Search(Request $request)
    {   
        $search = $request->input('search') ?? '';
        
        $products = Product::where('product_name', 'like', '%' . $search . '%')->paginate(10);

        return view('user.ProductU', ['products' => $products]);
    }

}
