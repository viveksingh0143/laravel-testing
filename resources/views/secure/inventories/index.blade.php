@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
			@include('secure.inventories.search', ['legend' => 'Record Book', 'new_link' => route('secure.inventories.create')])
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
						<th style="width:32px;"></th>
                        <th style="width:32px;"></th>
                        <th style="width:32px;"></th>
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
                            <td><a title="Show Details" href="{{ route('secure.inventories.show', [$inventory->id]) }}"><i class="fa fa-eye"></i> </a></td>
                            <td><a title="Edit Record" href="{{ route('secure.inventories.edit', [$inventory->id]) }}"><i class="fa fa-pencil-square"></i> </a></td>
                            <td><a title="Delete Record" href="{{ route('secure.inventories.destroy', [$inventory->id]) }}" data-method="delete" data-confirm="Are you sure to delete this inventory?"><i class="fa fa-trash"></i></a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="2">{!! Form::submit('Delete', ['name' => 'delete_all_btn', 'class' => 'btn btn-primary']) !!}</th>
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