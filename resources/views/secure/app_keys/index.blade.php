@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
			<h3>{{ $dealer->name }} API</h3>
	        @include('secure.app_keys.search', ['legend' => 'Manage Application Keys', 'new_link' => route('secure.dealers.app_keys.create', [$dealer->id])])
			@include('flash::message')
	        {!! Form::open(['method' => 'get', 'role' => 'form']) !!}
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all" /></th>
                        <th style="width:90px;">S.No.</th>
                        <th>API Keys</th>
                        <th>Universally Unique Identifier</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>E-Mail</th>
                        <th class="delete-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($app_keys as $key => $app_key)
                        <tr>
                            <td>{!! Form::checkbox('del_ids[]', $app_key->id, false, ['class' => 'id_checkbox']) !!}</td>
							<td>{{ (($app_keys->currentPage() - 1) * $app_keys->perPage()) + ($key + 1) }}</td>
                            <td>{{ $app_key->key }}</td>
                            <td>{{ $app_key->uuid }}</td>
							<td>{{ $app_key->fname }}</td>
							<td>{{ $app_key->lname }}</td>
							<td>{{ $app_key->email }}</td>
                            <td><a href="{{ route('secure.dealers.app_keys.destroy', [$dealer->id, $app_key->id]) }}" data-method="delete" data-confirm="Are you sure to delete this key?"><i class="fa fa-trash"></i> Delete </a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="2">{!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'name' => 'delete_all_btn', 'class' => 'btn btn-primary']) !!}</th>
	                    <th colspan="10">
							<div class="pagination-no-margin">{!! $app_keys->appends(@$request)->render() !!}</div>
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection