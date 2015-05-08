@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('dealer.leads.search', ['legend' => 'Manage Leads', 'new_link' => route('dealer-area.leads.create')])
			@include('flash::message')
            {!! Form::open(['method' => 'get', 'role' => 'form']) !!}
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Type</th>
                        <th>Subject</th>
						<th>Body</th>
						<th>User</th>
                        <th>Status</th>
                        <th class="view-action"></th>
                        <th class="edit-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($leads as $key => $lead)
                        <tr>
                            <td>{{ (($leads->currentPage() - 1) * $leads->perPage()) + ($key + 1) }}</td>
                            <td>{{ $lead->type }}</td>
                            <td>{{ $lead->subject }}</td>
                            <td>{!! $lead->body !!}</td>
                            <td>{{ ($lead->user)? $lead->user->name : 'All Users' }}</td>
                            <td>{{ $lead->status }}</td>
                            <td><a href="{{ route('dealer-area.leads.show', [$lead->id]) }}"><i class="fa fa-eye"></i> View </a></td>
                            <td><a href="{{ route('dealer-area.leads.edit', [$lead->id]) }}"><i class="fa fa-pencil-square"></i> Edit </a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="11">
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