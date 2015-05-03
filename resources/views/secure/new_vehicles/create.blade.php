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
	        {!! Form::open(['route' => ['secure.dealers.new_vehicles.store', $dealer->id], 'files' => true, 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @include('secure.new_vehicles.form', ['legend' => 'Manage New Vehicle', 'submit_text' => 'Add New Vehicle', 'list_link' => route('secure.dealers.new_vehicles.index', $dealer->id)])
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