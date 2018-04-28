<?php

namespace App\Http\Controllers;

use Session;
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
        
        Session::flash('success','Added To Cart Successfuly.');
        
        return redirect()->route('cart');
    }

    public function cart() {
        //Cart::destroy();
        return view('cart');
    }

    public function delete($id){
        Cart::remove($id);
        Session::flash('success','Product Removed from Cart Successfuly.');        
        return redirect()->back();
    }

    public function incr($id,$qty) {
        Cart::update($id,$qty+1);
        Session::flash('success','incremented Successfuly.');        
        return redirect()->back();
    }

    public function decr($id,$qty) {
        Cart::update($id,$qty-1);
        Session::flash('success','Decrement Successfuly.');
        
        return redirect()->back();
    }

    public function rapid_add($id) {
        $pdt = Product::find($id);

        $cartItem = Cart::add([
            'id' => $pdt,
            'name' => $pdt->name,
            'qty' => 1,
            'price' => $pdt->price
        ]);

        Cart::associate($cartItem->rowId,'App\Product');

        Session::flash('success','Added To Cart Successfuly.');

        return redirect()->route('cart');
    }
}
