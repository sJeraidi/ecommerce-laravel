<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function forcedelete($id)
    {
        $product=Product::onlyTrashed()->where('product_id',$id);
        $product->forceDelete();

        return redirect()->back();
    }

    public function restory($id)
    {
         $product=Product::onlyTrashed()->where('product_id',$id);
         $product->restore();

         return redirect()->back();
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.Product.index',['products' => $products, 'tab' => 'list']);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.Product.edit', ['product'=> $product]);
    }

    public function update($id,StoreProduct $request)
    {
        $product = Product::find($id);
        $product->product_name = $request->input('product_name');
        $product->image = $request->input('image');
        $product->category_id = 1;
        $product->brand_id = 1;
        $product->width = $request->input('width');
        $product->height = $request->input('height');
        $product->description = $request->input('description');
        $product->product_price = $request->input('product_price');
        $product->quantity = $request->input('quantity');
        $product->url = $request->input('url');
        $product->status = 1;
        $product->save();

        return redirect('/Produit');
    }

    public function create()
    {
        $brands = Brand::all();
        $categroys = Category::all();
        return view('admin.Product.create',['brands' => $brands, 'categroys' => $categroys]);
    }

    public function store(StoreProduct $request)
    {
        $product = new Product();
        $image = Storage::disk('public')->put('images', $request->image);
        $product->product_name = $request->input('product_name');
        $product->image = $image;
        $product->category_id = 1;
        $product->brand_id = 1;
        $product->width = $request->input('width');
        $product->height = $request->input('height');
        $product->description = $request->input('description');
        $product->product_price = $request->input('product_price');
        $product->quantity = $request->input('quantity');
        $product->url = $request->input('url');
        $product->status = 1;
        $product->save();

        return redirect('/Produit');
    }

   

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.Product.show', ['product' => $product]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/Produit');
    }

    public function archive()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.Product.index', ['products' => $products, 'tab'=>'archive']);
    }

    public function all()
    {
        $products = Product::withTrashed()->get();
        return view('admin.Product.index', ['products' => $products,'tab' => 'all']);
    }
 
}
