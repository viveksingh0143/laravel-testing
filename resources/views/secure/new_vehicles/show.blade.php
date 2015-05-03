@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <h1>{{ $new_vehicle->vehicle->bname }}/{{ $new_vehicle->vehicle->model }}/{{ $new_vehicle->vehicle->variant}} Details</h1>
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            @if(isset($new_vehicle) && isset($new_vehicle->vehicle->thumbnail))
                <thead>
                    <tr>
                        <td colspan="2"><img src="{{asset('uploads/' . $new_vehicle->vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" /></td>
                    </tr>
                </thead>
                @endif
                <tbody>
                    <tr>
                        <td>ID: </td>
                        <td>{{ $new_vehicle->id }}</td>
                    </tr>
                    <tr>
                        <td>Brand: </td>
                        <td>{{ $new_vehicle->vehicle->bname }}</td>
                    </tr>
                    <tr>
                        <td>Model: </td>
                        <td>{{ $new_vehicle->vehicle->model }}</td>
                    </tr>
                    <tr>
                        <td>Variant: </td>
                        <td>{{ $new_vehicle->vehicle->variant }}</td>
                    </tr>
                    <tr>
                        <td>Price (INR): </td>
                        <td>{{ $new_vehicle->price }}</td>
                    </tr>
                    @if(isset($new_vehicle->vehicle->pictures))
                    <tr>
                        <td>Galary: </td>
                        <td>
                            @foreach($new_vehicle->vehicle->pictures as $picture)
                                <img src="{{asset('uploads/' . $picture->path)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                            @endforeach
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td>Status: </td>
                        <td>{{ $new_vehicle->status }}</td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>{{ $new_vehicle->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>{{ $new_vehicle->updated_at }}</td>
                    </tr>
	            </tbody>
	            <tfoot>
                    <tr>
                        <th colspan="2">
                            <ul class="btn-list">
                                <li><a class="btn btn-primary" href="{{ route('secure.dealers.new_vehicles.index', $dealer->id) }}"><i class="fa fa-table"></i></a></li>
                                <li><a class="btn btn-warning" href="{{ route('secure.dealers.new_vehicles.edit', [$dealer->id, $new_vehicle->id]) }}"><i class="fa fa-pencil"></i></a></li>
                            </ul>
                        </th>
                    </tr>
                </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection