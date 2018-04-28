@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-md-offset-2">
            <div class="card">
                <div class="card-header">Update :{{$product->name}}</div>

                <div class="card-body">
                    <form action="{{route('products.update',['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{-- {{method_field('PUT')}} --}}
                        <div class="form-group">
                            <label for="name">Name : </label>
                            <input type="text" name="name" class="form-control" value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price : </label>
                            <input type="number" name="price" class="form-control" value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                            <label for="image">Image : </label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description : </label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">
                                    Update Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
