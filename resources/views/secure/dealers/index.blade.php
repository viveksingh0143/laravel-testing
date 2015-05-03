@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('secure.dealers.search', ['legend' => 'Manage Dealers', 'new_link' => route('secure.dealers.create')])
			@include('flash::message')
            {!! Form::open(['method' => 'get', 'role' => 'form']) !!}
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all" /></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>E-Mail</th>
						<th>Contact Person</th>
						<th>City</th>
                        <th>Status</th>
                        <th class="view-action"></th>
                        <th class="edit-action"></th>
                        <th class="delete-action"></th>
                        <th class="attach-vehicle-action"></th>
                        <th class="attach-vehicle-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($dealers as $dealer)
                        <tr>
                            <td>{!! Form::checkbox('del_ids[]', $dealer->id, false, ['class' => 'id_checkbox']) !!}</td>
                            <td>{{ $dealer->id }}</td>
                            <td>{{ $dealer->name }}</td>
                            <td>{{ $dealer->email }}</td>
                            <td>{{ $dealer->contact_person }}</td>
                            <td>{{ $dealer->city }}</td>
                            <td>{{ $dealer->status }}</td>
                            <td><a href="{{ route('secure.dealers.show', [$dealer->id]) }}"><i class="fa fa-eye"></i> View </a></td>
                            <td><a href="{{ route('secure.dealers.edit', [$dealer->id]) }}"><i class="fa fa-pencil-square"></i> Edit </a></td>
                            <td><a href="{{ route('secure.dealers.destroy', [$dealer->id]) }}" data-method="delete" data-confirm="Are you sure to delete this dealer?"><i class="fa fa-trash"></i> Delete </a></td>
                            <td><a href="{{ route('secure.dealers.used_vehicles.index', [$dealer->id]) }}"><i class="fa fa-list-alt"></i> Used</a></td>
                            <td><a href="{{ route('secure.dealers.new_vehicles.index', [$dealer->id]) }}"><i class="fa fa-list-alt"></i> New</a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="2">{!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'name' => 'delete_all_btn', 'class' => 'btn btn-primary']) !!}</th>
	                    <th colspan="10">
                            <div class="pagination-no-margin">{!! $dealers->appends(@$request)->render() !!}</div>
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection