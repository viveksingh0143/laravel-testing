<!------------------------------------------------------NavBar-------------------------------------------->
<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/"><img src="{{ asset('/carmazic/img/logo/carmazic-logo.png') }}" class="img-responsive" style="max-height:69px"></a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Used Car <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/used-vehicle-search') }}">Search Used Car</a></li>
                        <li><a data-toggle="modal" data-target="#search-car-req" data-wow-delay="0.7s">Set Requirement</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">New Car <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/new-vehicle-search') }}">Search New Car</a></li>
                        <li><a href="#">On-Road Price</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#new-car-req" data-wow-delay="0.7s">Set Requirement</a></li>
                    </ul>
                </li>
                <!--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Commercial <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Search Used Commercial</a></li>
                        <li><a href="#">On-Road Price</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#com-car-req" data-wow-delay="0.7s">Set Requirement</a></li>
                    </ul>
                </li>
                -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Insurance <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Calculator</a></li>
                        <li><a href="{{ route('insurance-us-best-deal') }}">Set Requirement</a></li>
                    </ul>
                </li>
                <!--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Finance <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Calculator</a></li>
                        <li><a href="#">Set Requirement</a></li>
                    </ul>
                </li>
                -->
                @if(Auth::guest())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign Up <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/auth/dealer-register') }}">Dealer Signup</a></li>
                        <li><a href="{{ url('/auth/register') }}">User Signup</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign In <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/auth/login') }}">Agent Login</a></li>
                        <li><a href="{{ url('/auth/login') }}">User Login</a></li>
                    </ul>
                </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span>{{ Auth::user()->name }}</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/dashboard/home') }}">Dashboard</a>
                            <li><a href="{{ route('dashboard.users.profile') }}">Profile</a></li>
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
	
	
	
	
</header>
<!------------------------------------------------------End of NavBar-------------------------------------------->