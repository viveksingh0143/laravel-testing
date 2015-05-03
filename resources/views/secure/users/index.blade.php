@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('secure.users.search', ['legend' => 'Manage Users', 'new_link' => route('secure.users.create')])
            @include('flash::message')
	        {!! Form::open(['method' => 'get', 'role' => 'form']) !!}
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all" /></th>
                        <th style="width:90px;">ID</th>
                        <th>Name</th>
                        <th>E-Mail</th>
						<th>Role</th>
						<th>Confirmed</th>
						<th>Status</th>
                        <th class="view-action"></th>
                        <th class="edit-action"></th>
                        <th class="delete-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($users as $user)
                        <tr>
                            <td>{!! Form::checkbox('del_ids[]', $user->id, false, ['class' => 'id_checkbox']) !!}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->confirmed? 'Yes' : 'No' }}</td>
							<td>{{ $user->status }}</td>
                            <td><a href="{{ route('secure.users.show', [$user->id]) }}"><i class="fa fa-eye"></i> View </a></td>
                            <td><a href="{{ route('secure.users.edit', [$user->id]) }}"><i class="fa fa-pencil-square"></i> Edit </a></td>
                            <td>
                                @if($user->admin)
                                    <i class="fa fa-graduation-cap"></i>
                                @else
                                    <a href="{{ route('secure.users.destroy', [$user->id]) }}" data-method="delete" data-confirm="Are you sure to delete this user?"><i class="fa fa-trash"></i> Delete </a>
                                @endif
                            </td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="2">{!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'name' => 'delete_all_btn', 'class' => 'btn btn-primary']) !!}</th>
	                    <th colspan="8">
	                        <div class="pagination-no-margin">{!! $users->appends($request)->render() !!}</div>
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection