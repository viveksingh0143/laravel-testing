@extends('layouts.frontend.frontend')

@section('content')
<div class="container-fluid margin-navbar">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				    @if($user)
                    Thank you to confirm your email id {{ $user->email }}, now you can login to our system
				    @else
				    Your account confirmation is failed, please contact to administrator (admin@carmazic.com)
				    @endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
