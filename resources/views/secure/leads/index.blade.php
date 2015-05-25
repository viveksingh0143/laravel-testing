@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('secure.leads.search', ['legend' => 'Manage Leads', 'new_link' => route('secure.leads.create')])
			@include('flash::message')
            {!! Form::open(['method' => 'get', 'role' => 'form']) !!}
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th style="width: 30px;"><input type="checkbox" id="select-all" /></th>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Subject</th>
						<th>Body</th>
						<th>User</th>
						<th>Created By</th>
                        <th>Status</th>
                        <th class="view-action"></th>
                        <th class="edit-action"></th>
                        <th class="delete-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($leads as $lead)
                        <tr>
                            <td>{!! Form::checkbox('del_ids[]', $lead->id, false, ['class' => 'id_checkbox']) !!}</td>
                            <td>{{ $lead->id }}</td>
                            <td>{{ $lead->type }}</td>
                            <td>{{ $lead->subject }}</td>
                            <td>{!! $lead->body !!}</td>
                            <td>{{ ($lead->user)? $lead->user->name : 'All Users' }}</td>
                            <td>{{ ($lead->owner)? $lead->owner->name : 'GUEST' }}</td>
                            <td>{{ $lead->status }}</td>
                            <td><a href="{{ route('secure.leads.show', [$lead->id]) }}"><i class="fa fa-eye"></i> View </a></td>
                            <td><a href="{{ route('secure.leads.edit', [$lead->id]) }}"><i class="fa fa-pencil-square"></i> Edit </a></td>
                            <td><a href="{{ route('secure.leads.destroy', [$lead->id]) }}" data-method="delete" data-confirm="Are you sure to delete this lead?"><i class="fa fa-trash"></i> Delete </a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="2">{!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'name' => 'delete_all_btn', 'class' => 'btn btn-primary']) !!}</th>
	                    <th colspan="10">
                            <div class="pagination-no-margin">{!! $leads->appends(@$request)->render() !!}</div>
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection