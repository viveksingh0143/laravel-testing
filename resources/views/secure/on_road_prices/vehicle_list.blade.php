@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('secure.on_road_prices.vehicle_list_search', ['legend' => 'Vehicle Selection for On Road Price'])
			@include('flash::message')
	        {!! Form::open(['method' => 'get', 'role' => 'form']) !!}
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th style="width:90px;">ID</th>
                        <th>Brand</th>
                        <th>Model</th>
						<th style="width:120px;">Variant</th>
						<th style="width:120px;">Transmission</th>
						<th style="width:120px;">Fuel</th>
						<th style="width:100px;">Price (INR)</th>
						<th style="width:115px;">Status</th>
						<th class="select-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->id }}</td>
                            <td>{{ $vehicle->brand->name }}</td>
                            <td>{{ $vehicle->model }}</td>
							<td>{{ $vehicle->variant }}</td>
							<td>{{ $vehicle->transmission }}</td>
							<td>{{ $vehicle->fuel }}</td>
							<td>{{ $vehicle->price }}</td>
							<td>{{ $vehicle->status }}</td>
							<td><a href="{{ route('secure.on-road-prices.create_from', [$vehicle->id]) }}"><i class="fa fa-dot-circle-o"></i> Select</a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="11">
							<div class="pagination-no-margin">{!! $vehicles->appends(@$request)->render() !!}</div>
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection