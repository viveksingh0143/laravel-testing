@extends('layouts.backend.backend')
@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <div class="well well-sm">
            @include('partials.errors')
	        {!! Form::model($on_road_price, ['method' => 'PATCH', 'route' => ['secure.on-road-prices.update', $on_road_price->id], 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @include('secure.on_road_prices.form', ['legend' => 'Manage On Road Price', 'submit_text' => 'Update On Road Price', 'list_link' => route('secure.on-road-prices.index')])
	        {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</div>
@endsection