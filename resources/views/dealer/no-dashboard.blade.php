@extends('...layouts.backend.headless')

@section('content')
<div class="container dashboard">
	<div class="alert alert-danger" role="alert">
	    <h3>No Dealer Attached with your account, contact support team for assistence.</h3>
	    <p><a href="{{ route('frontend-home') }}"><i class="fa fa-home">Back to website</i></a></p>
	</div>
</div>
@endsection
