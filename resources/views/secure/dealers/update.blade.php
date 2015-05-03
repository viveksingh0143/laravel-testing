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
	        {!! Form::model($dealer, ['method' => 'PATCH', 'route' => ['secure.dealers.update', $dealer->id], 'files' => true, 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @include('secure.dealers.form', ['legend' => 'Manage Dealer', 'submit_text' => 'Update Dealer', 'list_link' => route('secure.dealers.index')])
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