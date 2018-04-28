{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{route('admin.index')}}"><i class="glyphicon glyphicon-home"></i>
                    Dashboard</a></li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Products
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('products.index')}}">Products</a></li>
                    <li><a href="{{route('products.create')}}">Add Product</a></li>
                    <li><a href="{{route('products.trashed')}}">Trashed Products</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Users
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    @if(Auth::user()->admin)                    
                        <li><a href="{{route('users')}}">Users</a></li>
                        <li><a href="{{route('user.create')}}">Add User</a></li>
                    @endif
                    <li><a href="{{route('user.profile')}}">My Profile</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->