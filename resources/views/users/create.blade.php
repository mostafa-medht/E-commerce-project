@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-md-offset-2">    
            @if(count($errors)>0)
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item text-danger">
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            @endif
            <br>
            <div class="card">
                <div class="card-header">
                    Create a new User
                </div>
                
                <div class="card-body">
                <form action='{{ route('user.store')}}' method="POST" >
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="tag">User</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tag">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Add User</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection