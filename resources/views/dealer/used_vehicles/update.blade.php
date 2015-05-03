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
	        {!! Form::model($used_vehicle, ['method' => 'PATCH', 'route' => ['dealer-area.used_vehicles.update', $used_vehicle->id], 'files' => true, 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @include('dealer.used_vehicles.form', ['legend' => 'Manage Used Vehicle', 'submit_text' => 'Update Used Vehicle', 'list_link' => route('dealer-area.used_vehicles.myVehicles')])
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