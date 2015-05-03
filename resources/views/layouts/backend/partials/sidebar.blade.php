<ul class="nav nav-sidebar">
    <li><a href="#" data-toggle="offcanvas" class="visible-xs"><i class="fa fa-chevron-right"></i></a></li>
</ul>
<ul class="nav nav-sidebar">
    <li class="active"><a href="{{ url('/dashboard/home') }}"><i class="fa fa-th-large text-center"></i> <span class="a-text hidden-xs">Dashboard</span></a></li>
    @if(Auth::user()->group == 'ADMIN')
    <li class="dropdown"><a href="#"><i class="fa fa-users"></i> <span class="a-text hidden-xs">PBAC</span></a>
      <ul>
        <li class="dropdown"><a href="#"><i class="fa fa-users"></i> <span class="a-text hidden-xs">User(s)</span></a>
          <ul>
            <li><a href="{{ route('secure.users.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
            <li><a href="{{ route('secure.users.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="#"><i class="fa fa-gavel"></i> <span class="a-text hidden-xs">Role(s)</span></a>
          <ul>
              <li><a href="{{ route('secure.roles.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
              <li><a href="{{ route('secure.roles.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="#"><i class="fa fa-trophy"></i> <span class="a-text hidden-xs">Permission(s)</span></a>
          <ul>
              <li><a href="{{ route('secure.permissions.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li class="dropdown"><a href="#"><i class="fa fa-book"></i> <span class="a-text hidden-xs">Page(s)</span></a>
        <ul>
            <li><a href="{{ route('secure.pages.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
            <li><a href="{{ route('secure.pages.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="#"><i class="fa fa-briefcase"></i> <span class="a-text hidden-xs">Post(s)</span></a>
        <ul>
            <li><a href="{{ route('secure.posts.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
            <li><a href="{{ route('secure.posts.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="#"><i class="fa fa-users"></i> <span class="a-text hidden-xs">Dealer(s)</span></a>
        <ul>
            <li><a href="{{ route('secure.dealers.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
            <li><a href="{{ route('secure.dealers.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="#"><i class="fa fa-tree"></i> <span class="a-text hidden-xs">Brand(s)</span></a>
        <ul>
            <li><a href="{{ route('secure.brands.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
            <li><a href="{{ route('secure.brands.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
        </ul>
    </li>
    @endif
    <li class="dropdown"><a href="#"><i class="fa fa-car"></i> <span class="a-text hidden-xs">Vehicle(s)</span></a>
        <ul>
            <li><a href="{{ route('secure.vehicles.index') }}"><i class="fa fa-list-alt"></i> <span class="a-text hidden-xs">List</span></a></li>
            <li><a href="{{ route('secure.vehicles.create') }}"><i class="fa fa-plus-square"></i> <span class="a-text hidden-xs">New</span></a></li>
        </ul>
    </li>
    @if(Auth::user()->group == 'ADMIN')
    <li class="dropdown"><a href="#"><i class="fa fa-gears"></i> <span class="a-text hidden-xs">Tool(s)</span></a>
        <ul>
            <li><a href="{{ route('secure.imports.dealer.index') }}"><i class="fa fa-user-plus"></i> <span class="a-text hidden-xs">Dealer Import</span></a></li>
            <li><a href="{{ route('secure.imports.vehicle.index') }}"><i class="fa fa-car"></i> <span class="a-text hidden-xs">Vehicle Import</span></a></li>
        </ul>
    </li>
    @endif
</ul>