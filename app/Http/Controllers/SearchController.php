<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($query) {
        $products = \App\Product::where('name','like', '%' . request($query) . '%')->get();

        return view('results')->with('products',$products)
                            ->with('name','Search results : ' . request($query))
                            ->with('query',request($query));
    }
}
