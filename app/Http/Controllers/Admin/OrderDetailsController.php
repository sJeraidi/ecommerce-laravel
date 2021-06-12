<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order_detail;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    public function orderdetails()
    {
        $orderdts=Order_detail::all();
        return view('admin.Orderdetails',compact('orderdts'));
    }
}
