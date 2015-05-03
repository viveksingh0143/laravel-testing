@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('secure.vehicles.search', ['legend' => 'Manage Vehicles', 'new_link' => route('secure.vehicles.create')])
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
	                @foreach($vehicles as $vehicle)
                        <tr>
                            <td>{!! Form::checkbox('del_ids[]', $vehicle->id, false, ['class' => 'id_checkbox']) !!}</td>
                            <td>{{ $vehicle->id }}</td>
                            <td>{{ $vehicle->brand->name }}</td>
                            <td>{{ $vehicle->model }}</td>
							<td>{{ $vehicle->variant }}</td>
							<td>{{ $vehicle->price }}</td>
							<td>{{ $vehicle->status }}</td>
							<td><a href="{{ route('secure.vehicles.show', [$vehicle->id]) }}"><i class="fa fa-eye"></i> View </a></td>
                            <td><a href="{{ route('secure.vehicles.edit', [$vehicle->id]) }}"><i class="fa fa-pencil-square"></i> Edit </a></td>
                            <td><a href="{{ route('secure.vehicles.destroy', [$vehicle->id]) }}" data-method="delete" data-confirm="Are you sure to delete this user?"><i class="fa fa-trash"></i> Delete </a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="2">{!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'name' => 'delete_all_btn', 'class' => 'btn btn-primary']) !!}</th>
	                    <th colspan="8">
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