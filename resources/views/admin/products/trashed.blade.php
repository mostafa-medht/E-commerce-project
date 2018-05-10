@extends('admin.layout.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Trashed Products</div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <th>
                                Name
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Restore
                            </th>
                            <th>
                                Destroy
                            </th>
                        </thead>
                        <tbody>
                            @if($products->count()>0)
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            {{$product->name}}
                                        </td>
                                        <td>
                                            {{$product->price}}
                                        </td>
                                        <td>
                                            <a href="{{route('product.restore',['id' => $product->id])}}" class="btn btn-sm btn-info">Restore</a>
                                        </td>
                                        <td>
                                            <a href="{{route('product.kill',['id' => $product->id])}}" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else 
                                <tr>
                                    <th class="text-center" colspan="5">No trashed posts</th>
                                </tr>
                            @endif    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
