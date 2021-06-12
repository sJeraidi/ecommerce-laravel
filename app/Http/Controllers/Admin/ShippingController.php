<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    
    public function index()
    {
        $shippings=Shipping::all();
        return view('admin.Shipping',compact('shippings'));
    }
}
