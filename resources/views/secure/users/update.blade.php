@extends('layouts.backend.backend')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/select2/select2.min.css') }}" />
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <div class="well well-sm">
            @include('partials.errors')
	        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['secure.users.update', $user->id], 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @include('secure.users.form', ['legend' => 'Manage User', 'submit_text' => 'Update User', 'list_link' => route('secure.users.index'), 'roles' => ['ADMIN' => 'Administrator', 'WEB-USER' => 'Web User', 'DEALER' => 'Dealer']])
	        {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
<script>$('select').select2();</script>
@endsection