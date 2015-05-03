@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('dealer.used_vehicles.vehicle_list_search', ['legend' => 'Vehicle Selection'])
			@include('flash::message')
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th style="width:90px;">S.No.</th>
                        <th>Brand</th>
                        <th>Model</th>
						<th style="width:120px;">Variant</th>
						<th>Transmission</th>
                        <th>Fuel</th>
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
							<td>{{ $vehicle->transmission_type }}</td>
							<td>{{ $vehicle->fuel_type }}</td>
							<td>{{ $vehicle->price }}</td>
							<td>{{ $vehicle->status }}</td>
							<td><a href="{{ route('dealer-area.used_vehicles.create_form', [$vehicle->id]) }}"><i class="fa fa-dot-circle-o"></i> Select</a></td>
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
	    </div>
	</div>
</div>
@endsection