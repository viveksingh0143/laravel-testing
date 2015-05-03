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
						<th class="view-action"></th>
						<th class="edit-action"></th>
						<th class="delete-action"></th>
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
							<td>{{ $used_vehicle->dealer->name }}</td>
							<td><a href="{{ route('dealer-area.used_vehicles.show', [$used_vehicle->id]) }}"><i class="fa fa-eye"></i> View </a></td>
							<td><a href="{{ route('dealer-area.used_vehicles.edit', [$used_vehicle->id]) }}"><i class="fa fa-pencil-square"></i> Edit </a></td>
							<td><a href="{{ route('dealer-area.used_vehicles.destroy', [$used_vehicle->id]) }}" data-method="delete" data-confirm="Are you sure to delete this user?"><i class="fa fa-trash"></i> Delete </a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="13">
	                        @if(count($used_vehicles) > 0)
							<div class="pagination-no-margin">{!! $used_vehicles->appends(@$request)->render() !!}</div>
							@endif
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection