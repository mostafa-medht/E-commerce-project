<?php

namespace App\Http\Controllers;

use Session;
use Mail;
use Cart;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        if(Cart::content()->count()==0){
            Session::flash('info','Your cart is still empty.do some Shopping');
            return redirect()->back();
        }
        return view('checkout');
    }

    public function pay() {
        //dd(request()->all);

        Stripe::setApiKey("sk_test_BQNHWkFq4Cmhbiz3zhhMLBtU");

        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => request()->stripeToken,
        ]);

        Session::flash('success','Purchase successfully. wait for our mail.');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

        return redirect('/');
    }
}
