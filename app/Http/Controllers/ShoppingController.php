<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart() {
     //dd(request()->all());

        $pdt = Product::find(request()->pdt_id);

        $cartItem = Cart::add([
            'id' => $pdt,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price
        ]);

        Cart::associate($cartItem->rowId,'App\Product');

        return redirect()->route('cart');
    }

    public function cart() {
        //Cart::destroy();
        return view('cart');
    }

    public function delete($id){
        Cart::remove($id);

        return redirect()->back();
    }

    public function incr($id,$qty) {
        Cart::update($id,$qty+1);

        return redirect()->back();
    }

    public function decr($id,$qty) {
        Cart::update($id,$qty-1);

        return redirect()->back();
    }
}
