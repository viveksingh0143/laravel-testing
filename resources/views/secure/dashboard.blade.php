@extends('layouts.backend.backend')

@section('content')
<div class="container dashboard">
	<div class="row">
		<div class="col-sm-4">
			<div class="profile-card">
				<div class="profile-card-item-head heading">
					<i class="fa fa-user-md user-icon media-object img-rect"></i>
					<div class="text-wrap">
						<h3 class="list-group-item-heading">About</h3>
						<h4 class="list-group-item-heading">You</h4>
					</div>
					<div class="clearfix"></div>
				</div>
				<p> <i class="fa fa-user-plus purple-text"></i> {{ Auth::user()->name }}</p>
				<p> <i class="fa fa-graduation-cap orange"></i> {{ Auth::user()->role }}</p>
			</div>
			<div id="user-widget" class="list-group margin_top_27">
				<div class="list-group-item-head heading">
					<div class="text-wrap">
						<h3 class="list-group-item-heading">Account Details</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<a href="{{ route('dashboard.users.profile') }}" class="list-group-item">
					<i class="fa fa-user fa-lg pull-right"></i>
					<p class="list-group-item-text">Edit Profile</p>
				</a>
				<a href="{{ route('secure.inventories.index') }}" class="list-group-item">
					<i class="fa fa-cubes fa-lg pull-right"></i>
					<p class="list-group-item-text"> Record</p>
				</a>
				<a href="{{ url('/auth/logout') }}" class="list-group-item">
					<i class="fa fa-sign-out fa-lg pull-right"></i>
					<p class="list-group-item-text"> Sign Out</p>
				</a>
			</div>
		</div>

		<div class="col-sm-8">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<div class="vd_status-widget vd_bg-green widget" style="zoom: 1;">
							<a class="panel-body" href="{{ url('/used-vehicle-search') }}">
								<div class="clearfix">
									<span class="menu-icon"><i class="fa fa-car"></i></span>
									<span class="menu-value">{{ $used_vehicle_count }}</span>
								</div>
								<div class="menu-text clearfix">Total Used Car</div>
							</a>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="vd_status-widget vd_bg-purple  widget" style="zoom: 1;">
							<a class="panel-body" href="{{ route('secure.dealers.index') }}">
								<div class="clearfix">
									<span class="menu-icon"><i class="fa fa-users"></i></span>
									<span class="menu-value">{{ $dealer_count }}</span>
								</div>
								<div class="menu-text clearfix">Total Dealars</div>
							</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="vd_status-widget vd_bg-blue widget margin_top_27" style="zoom: 1;">
							<a class="panel-body" href="{{ url('/new-vehicle-search') }}">
								<div class="clearfix">
									<span class="menu-icon"><i class="fa fa-glass"></i></span>
									<span class="menu-value">{{ $new_vehicle_count }}</span>
								</div>
								<div class="menu-text clearfix">New Car</div>
							</a>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="vd_status-widget vd_bg-grey widget margin_top_27">
							<a class="panel-body" href="{{ route('secure.leads.index') }}">
								<div class="clearfix">
									<span class="menu-icon"><i class="fa fa-money"></i></span>
									<span class="menu-value">{{ $notification_count }}</span>
								</div>
								<div class="menu-text clearfix">Notifications</div>
							</a>
						</div>
					</div>
                    <div class="col-sm-6">
                        <div class="vd_status-widget vd_bg-dark-green widget margin_top_27">
                            <a class="panel-body" href="{{ asset('carmazic/mobile-application/android/carmazic.apk') }}">
                                <div class="clearfix">
                                    <div class="center-brand-icon text-center"><i class="fa fa-android"></i></div>
                                </div>
                                <div class="menu-text text-center clearfix">Android Application</div>
                            </a>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
