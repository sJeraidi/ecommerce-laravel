<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return view('auth.login');
        }
       
        $orders = Order::where('user_id', Auth::id())->get();
       
        foreach($orders as $order)
        {
            $key = 0;
            foreach(unserialize($order->products) as $orderProduct)
            {    
                $orders[$key]['product'] =  $orderProduct[0];
                $orders[$key]['qty'] =  $orderProduct[1];

                $key++;
            }
        }
       
        return view('user.order', ['orders' => $orders]);
    }
}
