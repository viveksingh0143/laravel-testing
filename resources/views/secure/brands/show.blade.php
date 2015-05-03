@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <h1>Brand</h1>
	        <table class="table table-bordered table-hover table-striped table-responsive">
                @if(isset($brand) && isset($brand->logo))
                <thead>
                    <tr>
                        <td colspan="2"><img src="{{asset('uploads/' . $brand->logo)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" /></td>
                    </tr>
                </thead>
                @endif
                <tbody>
                    <tr>
                        <td>ID: </td>
                        <td>{{ $brand->id }}</td>
                    </tr>
                    <tr>
                        <td>Slug: </td>
                        <td>{{ $brand->slug }}</td>
                    </tr>
                    <tr>
                        <td>Name: </td>
                        <td>{{ $brand->name }}</td>
                    </tr>
                    <tr>
                        <td>Description: </td>
                        <td>{{ $brand->description }}</td>
                    </tr>
                    <tr>
                        <td>Status: </td>
                        <td>{{ $brand->status }}</td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>{{ $brand->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>{{ $brand->updated_at }}</td>
                    </tr>
	            </tbody>
	            <tfoot>
                    <tr>
                        <th colspan="2">
                            <ul class="btn-list">
                                <li><a class="btn btn-primary" href="{{ route('secure.brands.index') }}"><i class="fa fa-table"></i></a></li>
                                <li><a class="btn btn-warning" href="{{ route('secure.brands.edit', $brand->id) }}"><i class="fa fa-pencil"></i></a></li>
                            </ul>
                        </th>
                    </tr>
                </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection
