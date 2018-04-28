@extends('layouts.front')

@section('page')

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Search results : {{$query}}</h1>
        </div>
    </div>

    <div class="container">
            <div class="row pt120">
                <div class="books-grid">
        
                <div class="row mb30">
                    @if($products->count()>0)
                        @foreach($products as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="books-item">
                                <div class="books-item-thumb">
                                    <img src="{{url($product->image)}}" alt="book">
                                    <div class="new">New</div>
                                    <div class="sale">Sale</div>
                                    <div class="overlay overlay-books"></div>
                                </div>
            
                                <div class="books-item-info">
                                        <a href="{{route('product.single',['slug' => $product->id])}}">
                                            <h5 class="books-title">{{$product->name}}</h5>
                                        </a>
            
                                    <div class="books-price">${{$product->price}}</div>
                                </div>
            
                                <a href="{{route('cart.rapid.add',['id' => $product->id])}}" class="btn btn-small btn--dark add">
                                    <span class="text">Add to Cart</span>
                                    <i class="seoicon-commerce"></i>
                                </a>
            
                            </div>
                        </div>
                        @endforeach
                    @else
                        <h1 class="text-center">
                            No results found. Oppps :(
                        </h1>
                        <br>
                        <br>
                    @endif
                </div>
                
            </div>
            </div>
        </div>
@stop    