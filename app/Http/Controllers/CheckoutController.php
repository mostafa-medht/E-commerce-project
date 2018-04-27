<?php

namespace App\Http\Controllers;

use Cart;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        return view('checkout');
    }

    public function pay() {
        //dd(request()->all);

        Stripe::setApiKey("sk_test_BQNHWkFq4Cmhbiz3zhhMLBtU");

        $token = request()->stripeToken;

        $charge = Charge::create([
            'amount' =>Cart::total()*100,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
        ]);

        Seesion::flash('success','Purchase successfully. wait for our mail.');

        Cart::destroy();

        return redirect('/');
    }
}
