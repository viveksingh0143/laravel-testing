@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('secure.on_road_prices.search', ['legend' => 'Manage Vehicles On Road Price', 'new_link' => route('secure.on-road-prices.create')])
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
						<th style="width:120px;">Type</th>
						<th style="width:120px;">Ex-Show Room Price</th>
						<th style="width:120px;">Registration Charge</th>
						<th style="width:120px;">Insurance Charge</th>
						<th style="width:100px;">Warehouse Charge</th>
						<th style="width:115px;">Extended Warranty Charge</th>
						<th style="width:115px;">Body Care Charge</th>
						<th style="width:115px;">Essential Kit Charge</th>
						<th class="view-action"></th>
                        <th class="edit-action"></th>
                        <th class="delete-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($on_road_prices as $on_road_price)
                        <tr>
                            <td>{!! Form::checkbox('del_ids[]', $on_road_price->id, false, ['class' => 'id_checkbox']) !!}</td>
                            <td>{{ $on_road_price->id }}</td>
                            <td>{{ $on_road_price->vehicle->brand->name }}</td>
                            <td>{{ $on_road_price->vehicle->model }}</td>
							<td>{{ $on_road_price->vehicle->variant }}</td>
							<td>{{ $on_road_price->type }}</td>
							<td>{{ $on_road_price->ex_show_room_price }}</td>
							<td>{{ $on_road_price->registration_charge }}</td>
							<td>{{ $on_road_price->insurance_charge }}</td>
							<td>{{ $on_road_price->warehouse_charge }}</td>
							<td>{{ $on_road_price->extended_warranty_charge }}</td>
							<td>{{ $on_road_price->body_care_charge }}</td>
							<td>{{ $on_road_price->essential_kit_charge }}</td>
							<td><a href="{{ route('secure.on-road-prices.show', [$on_road_price->id]) }}"><i class="fa fa-eye"></i> View </a></td>
                            <td><a href="{{ route('secure.on-road-prices.edit', [$on_road_price->id]) }}"><i class="fa fa-pencil-square"></i> Edit </a></td>
                            <td><a href="{{ route('secure.on-road-prices.destroy', [$on_road_price->id]) }}" data-method="delete" data-confirm="Are you sure to delete this user?"><i class="fa fa-trash"></i> Delete </a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="2">{!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'name' => 'delete_all_btn', 'class' => 'btn btn-primary']) !!}</th>
	                    <th colspan="14">
							<div class="pagination-no-margin">{!! $on_road_prices->appends(@$request)->render() !!}</div>
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection