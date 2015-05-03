@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
			<h3>{{ $dealer->name }}</h3>
	        @include('secure.used_vehicles.search', ['legend' => 'Manage Used Vehicles', 'new_link' => route('secure.dealers.used_vehicles.create', [$dealer->id])])
			@include('flash::message')
	        {!! Form::open(['method' => 'get', 'role' => 'form']) !!}
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all" /></th>
                        <th style="width:90px;">ID</th>
                        <th>Brand</th>
                        <th>Model</th>
						<th style="width:120px;">Variant</th>
						<th style="width:120px;">Year</th>
						<th style="width:120px;">Transmission</th>
						<th style="width:120px;">Fuel</th>
						<th style="width:120px;">Colour</th>
						<th style="width:100px;">Price (INR)</th>
						<th style="width:115px;">Status</th>
						<th class="view-action"></th>
                        <th class="edit-action"></th>
                        <th class="delete-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($used_vehicles as $used_vehicle)
                        <tr>
                            <td>{!! Form::checkbox('del_ids[]', $used_vehicle->id, false, ['class' => 'id_checkbox']) !!}</td>
                            <td>{{ $used_vehicle->id }}</td>
                            <td>{{ $used_vehicle->vehicle->brand->name }}</td>
                            <td>{{ $used_vehicle->vehicle->model }}</td>
							<td>{{ $used_vehicle->vehicle->variant }}</td>
							<td>{{ $used_vehicle->model_year }}</td>
							<td>{{ $used_vehicle->transmission_type }}</td>
							<td>{{ $used_vehicle->fuel_type }}</td>
							<td>{{ $used_vehicle->colour }}</td>
							<td>{{ $used_vehicle->price }}</td>
							<td>{{ $used_vehicle->status }}</td>
							<td><a href="{{ route('secure.dealers.used_vehicles.show', [$dealer->id, $used_vehicle->id]) }}"><i class="fa fa-eye"></i> View </a></td>
                            <td><a href="{{ route('secure.dealers.used_vehicles.edit', [$dealer->id, $used_vehicle->id]) }}"><i class="fa fa-pencil-square"></i> Edit </a></td>
                            <td><a href="{{ route('secure.dealers.used_vehicles.destroy', [$dealer->id, $used_vehicle->id]) }}" data-method="delete" data-confirm="Are you sure to delete this user?"><i class="fa fa-trash"></i> Delete </a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="2">{!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'name' => 'delete_all_btn', 'class' => 'btn btn-primary']) !!}</th>
	                    <th colspan="10">
							<div class="pagination-no-margin">{!! $used_vehicles->appends(@$request)->render() !!}</div>
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection