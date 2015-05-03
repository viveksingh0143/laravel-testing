@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('secure.pages.search', ['legend' => 'Manage Pages', 'new_link' => route('secure.pages.create')])
			@include('flash::message')
	        {!! Form::open(['method' => 'get', 'role' => 'form']) !!}
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all" /></th>
                        <th style="width:90px;">ID</th>
                        <th>Slug</th>
                        <th>Title</th>
						<th>Status</th>
						<th class="view-action"></th>
                        <th class="edit-action"></th>
                        <th class="delete-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($pages as $page)
                        <tr>
                            <td>{!! Form::checkbox('del_ids[]', $page->id, false, ['class' => 'id_checkbox']) !!}</td>
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->slug }}</td>
                            <td>{{ $page->title }}</td>
							<td>{{ $page->status }}</td>
                            <td><a href="{{ route('secure.pages.show', [$page->id]) }}"><i class="fa fa-eye"></i> View </a></td>
                            <td><a href="{{ route('secure.pages.edit', [$page->id]) }}"><i class="fa fa-pencil-square"></i> Edit </a></td>
                            <td><a href="{{ route('secure.pages.destroy', [$page->id]) }}" data-method="delete" data-confirm="Are you sure to delete this page?"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="2">{!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'name' => 'delete_all_btn', 'class' => 'btn btn-primary']) !!}</th>
	                    <th colspan="6">
	                        <div class="pagination-no-margin">{!! $pages->appends(@$request)->render() !!}</div>
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection