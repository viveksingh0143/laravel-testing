@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
			<h3>{{ $dealer->name }}</h3>
	        @include('secure.new_vehicles.search', ['legend' => 'Manage New Vehicles', 'new_link' => route('secure.dealers.new_vehicles.create', [$dealer->id])])
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
						<th style="width:100px;">Price (INR)</th>
						<th style="width:115px;">Status</th>
						<th class="view-action"></th>
                        <th class="edit-action"></th>
                        <th class="delete-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($new_vehicles as $new_vehicle)
                        <tr>
                            <td>{!! Form::checkbox('del_ids[]', $new_vehicle->id, false, ['class' => 'id_checkbox']) !!}</td>
                            <td>{{ $new_vehicle->id }}</td>
                            <td>{{ $new_vehicle->vehicle->brand->name }}</td>
                            <td>{{ $new_vehicle->vehicle->model }}</td>
							<td>{{ $new_vehicle->vehicle->variant }}</td>
							<td>{{ $new_vehicle->price }}</td>
							<td>{{ $new_vehicle->status }}</td>
							<td><a href="{{ route('secure.dealers.new_vehicles.show', [$dealer->id, $new_vehicle->id]) }}"><i class="fa fa-eye"></i> View </a></td>
                            <td><a href="{{ route('secure.dealers.new_vehicles.edit', [$dealer->id, $new_vehicle->id]) }}"><i class="fa fa-pencil-square"></i> Edit </a></td>
                            <td><a href="{{ route('secure.dealers.new_vehicles.destroy', [$dealer->id, $new_vehicle->id]) }}" data-method="delete" data-confirm="Are you sure to delete this user?"><i class="fa fa-trash"></i> Delete </a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="2">{!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'name' => 'delete_all_btn', 'class' => 'btn btn-primary']) !!}</th>
	                    <th colspan="8">
							<div class="pagination-no-margin">{!! $new_vehicles->appends(@$request)->render() !!}</div>
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection