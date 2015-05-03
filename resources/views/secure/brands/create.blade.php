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
	        {!! Form::open(['route' => 'secure.brands.store', 'files' => true, 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @include('secure.brands.form', ['legend' => 'Manage Brand', 'submit_text' => 'Add Brand', 'list_link' => route('secure.brands.index')])
	        {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('footer')
	<script type="text/javascript" src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
	<script>$('select').select2({placeholder: "Select attached user",allowClear: true});</script>
@endsection