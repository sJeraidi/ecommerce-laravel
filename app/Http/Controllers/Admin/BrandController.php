<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrand;

class BrandController extends Controller
{
    public function index()
    {
        $brands=Brand::all();
        return view('admin.brand.index',[
            'brands' => $brands,
            'tab'=>'list'
        ]);
    }

    public function forcedelete($id)
    {
        $brand = Brand::onlyTrashed()->where('brand_id',$id);

        $brand ->forceDelete();

        session()->flash('status','la Marque a bien été supprimé forcément');

        return redirect()->back();
    }

    public function restory($id)
    {
         $brand = Brand::onlyTrashed()->where('brand_id',$id);

         $brand->restore();

         return redirect()->back();
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(StoreBrand $request)
    {
        $brand = new Brand();
        $brand->brand_name = $request->input('brand_name');
        $brand->brand_description = $request->input('brand_description');
        $brand->url = $request->input('url');
        $brand->status = 1;

        $brand->save();

        session()->flash('status','la Marque a bien été ajouté');

        return redirect('/Brand');
    }

    
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.brand.edit',[
            'brand' => $brand
        ]);
    }


    public function update(StoreBrand $request,$id)
    {
        $brand =Brand::findOrFail($id);

        $brand->brand_name = $request->input('brand_name');
        $brand->brand_description = $request->input('brand_description');
        $brand->url = $request->input('url');
        $brand->status = 1;

        $brand->save();

        session()->flash('status','la Marque a bien été Modifé');

       return redirect('/Brand'); 
    }


    public function destroy($id)
    {
        $brand = Brand::FindOrFail($id);

        $brand->delete();

        session()->flash('status','la Marque a bien été supprimé');

        return redirect('/Brand');
    }

    public function archive()
    {
        $brands = Brand::onlyTrashed()->get();
        return view('admin.Brand.index',['brands' => $brands, 'tab' => 'archive']);
    }

    public function all()
    {
        $brands = Brand::withTrashed()->get();
        return view('admin.Brand.index',['brands' => $brands, 'tab'=>'all']);
    }
}
