<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Order;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function index()
    {   
        if (Cart::getContent()->count() <= 0) {
            return redirect()->route('product.index');
        }

        Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');

        $intent = PaymentIntent::create([
            'amount' => Cart::getTotal(),
            'currency' => 'usd'
        ]);

        $clientSecret = Arr::get($intent, 'client_secret');

        return view('user.payment.index', 
            [
                'clientSecret' => $clientSecret
            ]);
    }

    public function store(Request $request)
    {
        $data = $request->json()->all();

        $order = new Order();

        $order->payment_intent_id = $data["paymentIntent"]['id'];
        $order->amount = $data["paymentIntent"]['amount'];
        $order->payment_created_at = (new DateTime())
            ->setTimestamp($data["paymentIntent"]['created'])
            ->format("Y-m-d H:i:s");

        $products = [];
        $i = 0;
        
        foreach(Cart::getContent() as $product)
        {
           $products['product_' . $i][] = $product->quantity;
           $products['product_' . $i][] = $product->model->product_id;
           $i++;
        }

        $order->products = serialize($products);
        $order->user_id = Auth::id();
        $order->save();

        if ($data["paymentIntent"]['status'] === 'succeeded') {
            $this->deletePanier();
            session()->flash('message', 'Votre commande a été traitée avec succés.');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        }
        
        return response()->json(['error' => 'Payment Intent Not Succeeded']);

    }

    public function merci()
    {
        return session()->has('message') ? view('user.Payment.thankyou') : redirect()->route('product.index') ;
    }

    private function deletePanier()
    {
        foreach(Cart::getContent() as $kay => $carts)
        {
            Cart::remove($kay);
        }
    }
}
