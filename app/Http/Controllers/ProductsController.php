<?php

namespace App\Http\Controllers;

use Session;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index')->with('products',Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required',
            'image'=>'required|image',
            'description' => 'required',
            'price'=>'required'
        ]);
        

        $product_image = $request->image;
        $product_image_new_name = time().$product_image->getClientOriginalName() ;
        $product_image->move('uploads/products/',$product_image_new_name);
        
        $product = Product::create([
            'name' => $request->name,
            // 'slug' => str_slug($request->name),
            'description' => $request->description,
            'price'=> $request->price,
            'image' => 'uploads/products/' .$product_image_new_name
        ]);
        
        $product->save();

        Session::flash('success','Post created successfuly.');
        //dd($request->all());
        return redirect()->back();
    }

    // public function search($query) {
    // $products = \App\Product::where('name','like', '%' . request($query) . '%')->get();

    // return view('results')->with('products',$products)
    //                     ->with('name','Search results : ' . request($query))
    //                     ->with('query',request($query));
    // }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.products.edit')->with('product',Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $product = Product::find($id);
        
        if($request->hasFile('image')){
            $product_image = $request->image;
            $product_image_new_name = time().$product_image->getClientOriginalName() ;
            $product_image->move('uploads/products',$product_image_new_name);
            $product->image = 'uploads/products/'.$product_image_new_name; 
            $product->save();              
        }

        $product->name = $request->name;
        // $product->slug = $request->str_slug($product->name);
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();
        
        Session::flash('success','Product Updated Successfuly.');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        
        if(file_exists($product->image)){
            unlink($product->image);
        }

        $product->delete();

        Session::flash('success','The pproductt was just trashed');

        return redirect()->back();
    }

    public function trashed() {
        $products = Product::onlyTrashed()->get();

        return view('admin.products.trashed')->with('products',$products);
    }

    public function kill($id) {
        $product = Product::withTrashed()->where('id',$id)->first(); // Query builder
        //dd($post);
        $product->forceDelete();
        Session::flash('success','Product deleted Permenantly.');

        return redirect()->back();
    }

    public function restore($id) {
        $product = Product::withTrashed()->where('id',$id)->first();
        $product->restore();
        Session::flash('success','Product restored Successfuly.');
        return redirect()->route('admin.products.index');
    }
}
