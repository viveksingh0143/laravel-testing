@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('secure.brands.search', ['legend' => 'Manage Brands', 'new_link' => route('secure.brands.create')])
			@include('flash::message')
	        {!! Form::open(['method' => 'get', 'role' => 'form']) !!}
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all" /></th>
                        <th style="width:90px;">ID</th>
                        <th>Slug</th>
                        <th>Name</th>
                        <th>Status</th>
						<th>Logo</th>
						<th class="view-action"></th>
                        <th class="edit-action"></th>
                        <th class="delete-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($brands as $brand)
                        <tr>
                            <td>{!! Form::checkbox('del_ids[]', $brand->id, false, ['class' => 'id_checkbox']) !!}</td>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td>{{ $brand->name }}</td>
							<td>{{ $brand->status }}</td>
                            <td>
								@if(isset($brand) && isset($brand->logo))
									<img src="{{asset('uploads/' . $brand->logo)}}" class="img-thumbnail img-responsive" style="max-width: 120px;" />
								@endif
							</td>
                            <td><a href="{{ route('secure.brands.show', [$brand->id]) }}"><i class="fa fa-eye"></i> View </a></td>
                            <td><a href="{{ route('secure.brands.edit', [$brand->id]) }}"><i class="fa fa-pencil-square"></i> Edit </a></td>
                            <td><a href="{{ route('secure.brands.destroy', [$brand->id]) }}" data-method="delete" data-confirm="Are you sure to delete this brand?"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="2">{!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'name' => 'delete_all_btn', 'class' => 'btn btn-primary']) !!}</th>
	                    <th colspan="7">
							<div class="pagination-no-margin">{!! $brands->appends(@$request)->render() !!}</div>
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection