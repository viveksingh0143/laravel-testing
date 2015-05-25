<ul class="nav navbar-nav">
    <li><a href="{{ url('/') }}">View Site</a></li>
    <li><a href="{{ url('/dashboard/home') }}">Dashboard</a></li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span><i class="fa fa-car"></i> Vehicles</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('dealer-area.vehicles.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">Search New Vehicles</span></a></li>
            <li><a href="{{ route('dealer-area.used_vehicles.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">Search Used Vehicles</span></a></li>
            <li><a href="{{ route('dealer-area.used_vehicles.myVehicles') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">My Used Vehicles</span></a></li>
            <li><a href="{{ route('dealer-area.used_vehicles.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
        </ul>
    </li>
    <li><a href="{{ route('dealer-area.dealers.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">Dealers</span></a></li>
    <li><a href="{{ route('secure.inventories.index') }}"><i class="fa fa-cubes"></i> <span class="a-text hidden-xs">Record</span></a></li>
    <li><a href="{{ route('dealer-area.on-road-prices.index') }}"><i class="fa fa-inr"></i> <span class="a-text hidden-xs">On-Road Prices</span></a></li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span><i class="fa fa-flag"></i> Notification</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('dealer-area.leads.index') }}"><i class="fa fa-flag"></i> <span class="a-text hidden-xs">List Notification</span></a></li>
            <li><a href="{{ route('dealer-area.leads.create') }}"><i class="fa fa-flag-o"></i> <span class="a-text hidden-xs">Create Notification</span></a></li>
            <li><a href="{{ route('dealer-area.leads.mine') }}"><i class="fa fa-flag-checkered"></i> <span class="a-text hidden-xs">My Notification</span></a></li>
        </ul>
    </li>
</ul>