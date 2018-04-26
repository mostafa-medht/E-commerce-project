@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>
                                Name
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{$product->name}}
                                    </td>
                                    <td>
                                        {{$product->price}}
                                    </td>
                                    <td>
                                        <a href="{{route('products.edit',['id' => $product->id])}}" class="btn btn-sm btn-info">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('productss.destroy',['id' => $product->id])}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('Delete')}}
                                            <button class="btn btn-sm btn-danger" type="submit">Delete</a>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
