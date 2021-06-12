<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;

class CategorieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categorys=Category::all();
        return view('admin.Category.index',['categorys'=>$categorys]);
    }

    public function create()
    {
        return view("admin.Category.create");
    }

    public function store(StoreCategory $request)
    {
        $category=new Category();

        $category->category_name=$request->input('category_name');
        $category->category_description=$request->input('category_description');
        $category->url=$request->input('url');
        $category->status=1;

        $category->save();

        return redirect('/Categorie');
    }
}
