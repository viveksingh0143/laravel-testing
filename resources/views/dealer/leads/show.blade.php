@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <h1>Leads</h1>
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <tbody>
                    <tr>
                        <td>ID: </td>
                        <td>{{ $lead->id }}</td>
                    </tr>
                    <tr>
                        <td>Type: </td>
                        <td>{{ $lead->type }}</td>
                    </tr>
                    <tr>
                        <td>Subject: </td>
                        <td>{{ $lead->subject }}</td>
                    </tr>
                    <tr>
                        <td>Request/Query: </td>
                        <td>{!! $lead->body !!}</td>
                    </tr>
                    <tr>
                        <td>Attached With User: </td>
                        <td> {{ ($lead->user)? $lead->user->name : 'All Users' }}</td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>{{ $lead->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>{{ $lead->updated_at }}</td>
                    </tr>
	            </tbody>
	            <tfoot>
                    <tr>
                        <th colspan="2">
                            <ul class="btn-list">
                                <li><a class="btn btn-primary" href="{{ route('dealer-area.leads.index') }}"><i class="fa fa-table"></i></a></li>
                                <li><a class="btn btn-warning" href="{{ route('dealer-area.leads.edit', $lead->id) }}"><i class="fa fa-pencil"></i></a></li>
                            </ul>
                        </th>
                    </tr>
                </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection
