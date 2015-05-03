@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('secure.posts.search', ['legend' => 'Manage Posts', 'new_link' => route('secure.posts.create')])
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
	                @foreach($posts as $post)
                        <tr>
                            <td>{!! Form::checkbox('del_ids[]', $post->id, false, ['class' => 'id_checkbox']) !!}</td>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->title }}</td>
							<td>{{ $post->status }}</td>
                            <td><a href="{{ route('secure.posts.show', [$post->id]) }}"><i class="fa fa-eye"></i> View </a></td>
                            <td><a href="{{ route('secure.posts.edit', [$post->id]) }}"><i class="fa fa-pencil-square"></i> Edit </a></td>
                            <td><a href="{{ route('secure.posts.destroy', [$post->id]) }}" data-method="delete" data-confirm="Are you sure to delete this post?"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="2">{!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'name' => 'delete_all_btn', 'class' => 'btn btn-primary']) !!}</th>
						<th colspan="6">
							<div class="pagination-no-margin">{!! $posts->appends(@$request)->render() !!}</div>
						</th>
	                </tr>
	            </tfoot>
	        </table>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection