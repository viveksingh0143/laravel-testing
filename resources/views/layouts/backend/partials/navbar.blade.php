<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">CARMAZIC</a>
        </div>
        <div class="navbar-collapse collapse">
            @if (Auth::check())
                @if(Auth::user()->role == 'ADMIN')
                    @include('layouts.backend.partials.admin_navbar')
                @elseif(Auth::user()->role == 'DEALER')
                    @include('layouts.backend.partials.dealer_navbar')
                @endif
            @endif

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">User Register</a></li>
                    <li><a href="{{ url('/auth/dealer-register') }}">Dealer Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span>{{ Auth::user()->name }}</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/dashboard/home') }}">Dashboard</a></li>
                            <li><a href="{{ route('dashboard.users.profile') }}">Profile</a></li>
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>