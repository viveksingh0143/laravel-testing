@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('dealer.used_vehicles.search', ['legend' => 'Used Vehicles Search'])
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
						<th style="width:120px;">Year</th>
						<th style="width:120px;">Colour</th>
						<th style="width:100px;">Price (INR)</th>
						<th>Dealer</th>
						<th>Contact Number</th>
						<th class="view-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($used_vehicles as $key => $used_vehicle)
                        <tr>
							<td>{{ (($used_vehicles->currentPage() - 1) * $used_vehicles->perPage()) + ($key + 1) }}</td>
                            <td>{{ $used_vehicle->vehicle->bname }}</td>
                            <td>{{ $used_vehicle->vehicle->model }}</td>
							<td>{{ $used_vehicle->vehicle->variant }}</td>
							<td>{{ $used_vehicle->transmission_type }}</td>
							<td>{{ $used_vehicle->fuel_type }}</td>
							<td>{{ $used_vehicle->model_year }}</td>
							<td>{{ $used_vehicle->colour }}</td>
							<td>{{ $used_vehicle->price }}</td>
							<td><a target="_blank" href="{{ route('dealer-page', $used_vehicle->dealer->slug) }}">{{ $used_vehicle->dealer->name }}</a></td>
							<td>{{ $used_vehicle->dealer->mobile_number }}/{{ $used_vehicle->dealer->office_number }}</td>
							<td><a target="_blank" href="{{ route('used-vehicle-details', [$used_vehicle->id, Str::slug($used_vehicle->vehicle->bname . ' ' . $used_vehicle->vehicle->model . ' ' . $used_vehicle->vehicle->variant)]) }}"><i class="fa fa-eye"></i> View </a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="11">
							<div class="pagination-no-margin">{!! $used_vehicles->appends(@$request)->render() !!}</div>
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection