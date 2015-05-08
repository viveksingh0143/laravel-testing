<ul class="nav navbar-nav">
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span><i class="fa fa-users"></i> Users</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('secure.users.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
            <li><a href="{{ route('secure.users.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span><i class="fa fa-book"></i> Page/Post</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('secure.posts.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List Post</span></a></li>
            <li><a href="{{ route('secure.posts.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">Create Post</span></a></li>
            <li><a href="{{ route('secure.pages.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List Page</span></a></li>
            <li><a href="{{ route('secure.pages.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">Create Page</span></a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span><i class="fa fa-tree"></i> Brands</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('secure.brands.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
            <li><a href="{{ route('secure.brands.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span><i class="fa fa-car"></i> Vehicles</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('secure.vehicles.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
            <li><a href="{{ route('secure.vehicles.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span><i class="fa fa-user"></i> Dealers</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('secure.dealers.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
            <li><a href="{{ route('secure.dealers.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span><i class="fa fa-inr"></i> On-Road Prices</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('secure.on-road-prices.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
            <li><a href="{{ route('secure.on-road-prices.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span><i class="fa fa-cubes"></i> Records</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('secure.inventories.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
            <li><a href="{{ route('secure.inventories.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span><i class="fa fa-flag"></i> Notifications</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('secure.leads.index') }}"><i class="fa fa-flag-checkered"></i> <span class="a-text hidden-xs">List Notification</span></a></li>
            <li><a href="{{ route('secure.leads.create') }}"><i class="fa fa-flag-o"></i> <span class="a-text hidden-xs">Create Notification</span></a></li>
        </ul>
    </li>
</ul>