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
	        {!! Form::open(['route' => 'dealer-area.leads.store', 'files' => true, 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @include('dealer.leads.form', ['legend' => 'Manage Lead', 'submit_text' => 'Add Lead', 'list_link' => route('dealer-area.leads.index')])
	        {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('footer')
	<script type="text/javascript" src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
	<script>$('select').select2({placeholder: "Select attached user"});</script>
@endsection