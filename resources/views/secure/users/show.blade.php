@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <h1>User</h1>
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <tbody>
                    <tr>
                        <td>ID: </td>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <td>Name: </td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>E-Mail: </td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Role: </td>
                        <td>{{ $user->role }}</td>
                    </tr>
                    <tr>
                        <td>Status: </td>
                        <td>{{ $user->status }}</td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
	            </tbody>
	            <tfoot>
                    <tr>
                        <th colspan="2">
                            <ul class="btn-list">
                                <li><a class="btn btn-primary" href="{{ route('secure.users.index') }}"><i class="fa fa-table"></i></a></li>
                                <li><a class="btn btn-warning" href="{{ route('secure.users.edit', $user->id) }}"><i class="fa fa-pencil"></i></a></li>
                            </ul>
                        </th>
                    </tr>
                </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection
