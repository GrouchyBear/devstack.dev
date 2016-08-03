<!-- Internal Links -->
<head>
<link rel="stylesheet" href="{{ URL::to('src/css/style.css') }}">
</head>

<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}" style="color: #9D3E30;">DevStack</a>
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" class="dd-lr"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Login</a></li>
                    <li><a href="{{ url('/register') }}" class="dd-lr"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle dd-t" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                            {{ Auth::user()->first_name }} <span class="caret"></span>
                        </a>


                        <ul class="dropdown-menu dd-m" role="menu">
                            <li><a href="{{ url('/feed') }}" class="log"><i class="fa fa-wpforms" aria-hidden="true"></i> Feed</a></li>
                            <li><a href="{{ url('/account') }}" class="log"><i class="fa fa-btn fa-user"></i> Account</a></li>
                            <li><a href="{{ url('/logout') }}" class="log"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>

                        </ul>
                    </li>
                @endif
            </ul>

        </div><!-- /.container-fluid -->
    </nav>
</header>
