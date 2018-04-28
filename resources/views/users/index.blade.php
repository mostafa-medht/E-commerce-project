@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Users
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                            <thead>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Permission
                                </th>
                                <th>
                                    Delete 
                                </th>
                            </thead>
                            <tbody>
                                @if($users->count()>0)
                                    @foreach($profiles as $profile)
                                    <tr>
                                    <td>
                                        <img src="{{asset($profile->avatar)}}" alt="alt" width="60px" height="60px" style="border-radius:50%;" >
                                    </td>
                                    <td>
                                            @foreach($users as $user)
                                                @if($profile->user_id == $user->id)
                                                    {{$user->name}}
                                                @endif
                                            @endforeach
                                    </td>
                                    <td>
                                            @foreach($users as $user)
                                                @if($profile->user_id == $user->id)
                                                        @if($user->admin)
                                                            <a href="{{route('user.not.admin',['id' => $user->id])}}" class="btn btn-sm btn-danger">Remove Permission</a>                                                    
                                                        @else
                                                            <a href="{{route('user.admin',['id' => $user->id])}}" class="btn btn-sm btn-success">Make Admin</a>
                                                        @endif
                                                @endif
                                            @endforeach
                                    </td>
                                    <td>
                                            @if(Auth::id()!==$user->id)
                                                <a href="{{route('user.delete',['id' => $user->id])}}" class="btn btn-sm btn-danger">Delete</a>
                                            @endif
                                    </td>
                                    </tr>
                                    @endforeach
                                @else 
                                    <tr>
                                        <th class="text-center" colspan="5">No User</th>
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