@extends('layouts.frontend.frontend')

@section('content')
<div class="container-fluid margin-navbar">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				    @if($user)
                        Thank you for signing up, we have sent you a confirmation mail to <mark>{{ $user->email }}</mark>, for your email verification.
				    @else
				        Your signing up is failed, please try again or contact to administrator (admin@carmazic.com)
				    @endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection