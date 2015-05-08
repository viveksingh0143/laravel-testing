@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('dealer.vehicles.search', ['legend' => 'Vehicles Search'])
			@include('flash::message')
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th style="width:90px;">S.No.</th>
						<th>Brand</th>
                        <th>Model</th>
						<th>Variant</th>
						<th>Transmission</th>
						<th>Body Type</th>
						<th>Fuel Type</th>
						<th>Drive Type</th>
						<th style="width:100px;">Price (INR)</th>
						<th class="view-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($vehicles as $key => $vehicle)
                        <tr>
							<td>{{ (($vehicles->currentPage() - 1) * $vehicles->perPage()) + ($key + 1) }}</td>
                            <td>{{ $vehicle->bname }}</td>
                            <td>{{ $vehicle->model }}</td>
							<td>{{ $vehicle->variant }}</td>
							<td>{{ $vehicle->transmission_type }}</td>
							<td>{{ $vehicle->body_type }}</td>
							<td>{{ $vehicle->fuel_type }}</td>
							<td>{{ $vehicle->drive_type }}</td>
							<td>{{ $vehicle->price }}</td>
							<td><a target="_blank" href="{{ route('new-vehicle-details', [$vehicle->id, Str::slug($vehicle->bname . ' ' . $vehicle->model . ' ' . $vehicle->variant)]) }}"><i class="fa fa-eye"></i> View </a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="10">
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