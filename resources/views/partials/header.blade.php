<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand brand-title" href="{{route('shop.index')}}">Football Tshirt</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" role="search"
                  action="{{route('product.search')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="search" name="search"
                           value="{{request()->input('search')}}">
                </div>

            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('product.shopingCart')}}"><i class="fa fa-shopping-cart" aria-hidden="true">
                        </i>Shoping Cart
                        <span class="badge">{{Session::has('cart')?Session::get('cart')->totalQty : ''}}</span>
                    </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>User Account
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(Auth::check())
                            <li><a href="{{route('client.profile')}}" style="font-size: 20px;text-decoration: none">Profile</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('client.logout')}}"
                                   style="font-size: 20px;text-decoration: none">Logout</a></li>
                        @else
                            <li><a href="{{route('client.signup')}}" style="font-size: 20px;text-decoration: none">Sign
                                    Up</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('client.signin')}}" style="font-size: 20px;text-decoration: none">Sign
                                    In</a></li>
                        @endif


                    </ul>
                </li>
                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>Admin Account
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @if (Auth::check())
                                    <li><a href="{{ url('/home') }}"
                                           style="text-decoration: none;font-size: 20px;
padding-left: 15px"
                                        >Home</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('admin.logout') }}" style="text-decoration: none;font-size: 20px;
padding-left: 15px">Logout</a></li>
                                @else
                                    <li><a href="{{ url('/login') }}" style="text-decoration: none;font-size: 20px;
padding-left: 15px">Login</a></li>
                                    <li><a href="{{ route('login.google') }}" style="text-decoration: none;font-size: 15px;
padding-left: 10px">Login with Google</a></li>
                                    <li><a href="{{ route('login.facebook') }}" style="text-decoration: none;font-size: 15px;
padding-left: 10px">Login with Facebook</a></li>

                                @endif
                            </div>
                        @endif


                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>