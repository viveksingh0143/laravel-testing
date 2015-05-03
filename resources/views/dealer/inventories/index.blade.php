@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <h1>Record Book <a class="btn btn-success" href="{{ route('dealer.inventories.create') }}"><i class="fa fa-codepen"></i></a></h1>
			@include('flash::message')
	        {!! Form::open(['method' => 'get', 'role' => 'form']) !!}
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all" /></th>
                        <th>Registration</th>
                        <th>Brand</th>
                        <th>Model</th>
						<th>Variant</th>
						<th>Purchase</th>
                        <th>Sold</th>
						<th class="view-action"></th>
                        <th class="edit-action"></th>
                        <th class="delete-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($inventories as $inventory)
                        <tr>
                            <td>{!! Form::checkbox('del_ids[]', $inventory->id, false, ['class' => 'id_checkbox']) !!}</td>
                            <td>{{ $inventory->registration }}</td>
                            <td>{{ $inventory->brand }}</td>
                            <td>{{ $inventory->model }}</td>
                            <td>{{ $inventory->variant }}</td>
							<td>{{ $inventory->purchase_date }}</td>
							<td>{{ $inventory->selling_date }}</td>
                            <td><a title="Show Details" href="{{ route('dealer.inventories.show', [$inventory->id]) }}"><i class="fa fa-eye"></i> </a></td>
                            <td><a title="Edit Record" href="{{ route('dealer.inventories.edit', [$inventory->id]) }}"><i class="fa fa-pencil-square"></i> </a></td>
                            <td><a title="Delete Record" href="{{ route('dealer.inventories.destroy', [$inventory->id]) }}" data-method="delete" data-confirm="Are you sure to delete this inventory?"><i class="fa fa-trash"></i></a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="2">{!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'name' => 'delete_all_btn', 'class' => 'btn btn-primary']) !!}</th>
	                    <th colspan="5">
							<div class="pagination-no-margin">{!! $inventories->appends(['size' => $size])->render() !!}</div>
	                    </th>
	                    <th colspan="3">
							{!! Form::select('size', ['5' => '5','10' => '10','15' => '15','25' => '25','50' => '50','100' => '100',], $size, ['class' => 'form-control search-box']) !!}
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection