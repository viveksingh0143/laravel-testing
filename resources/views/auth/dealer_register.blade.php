@extends('layouts.frontend.frontend')

@section('content')
<div class="container-fluid margin-navbar">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Grow your business with us</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/dealer-register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-2 control-label">Company Name</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">
							</div>
							<label class="col-md-2 control-label">E-Mail Address</label>
							<div class="col-md-4">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Password</label>
							<div class="col-md-4">
								<input type="password" class="form-control" name="password">
							</div>
							<label class="col-md-2 control-label">Confirm Password</label>
							<div class="col-md-4">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Contact Person</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="contact_person" value="{{ old('contact_person') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Mobile Number</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}">
							</div>
							<label class="col-md-2 control-label">Office Number</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="office_number" value="{{ old('office_number') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">State</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="state" value="{{ old('state') }}">
							</div>
							<label class="col-md-2 control-label">City</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="city" value="{{ old('city') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Location</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="location" value="{{ old('location') }}">
							</div>
							<label class="col-md-2 control-label">Pincode</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="pincode" value="{{ old('pincode') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Address</label>
							<div class="col-md-4">
								<textarea class="form-control" name="address">{{ old('address') }}</textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-2 col-md-offset-2">
								<button type="submit" class="btn btn-default">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
