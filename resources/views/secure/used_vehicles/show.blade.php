@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <h1>{{ $used_vehicle->vehicle->bname }}/{{ $used_vehicle->vehicle->model }}/{{ $used_vehicle->vehicle->variant}} Details</h1>
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            @if(isset($used_vehicle) && isset($used_vehicle->vehicle->thumbnail))
                <thead>
                    <tr>
                        <td colspan="2"><img src="{{asset('uploads/' . $used_vehicle->vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" /></td>
                    </tr>
                </thead>
                @endif
                <tbody>
                    <tr>
                        <td>ID: </td>
                        <td>{{ $used_vehicle->id }}</td>
                    </tr>
                    <tr>
                        <td>Brand: </td>
                        <td>{{ $used_vehicle->vehicle->bname }}</td>
                    </tr>
                    <tr>
                        <td>Model: </td>
                        <td>{{ $used_vehicle->vehicle->model }}</td>
                    </tr>
                    <tr>
                        <td>Variant: </td>
                        <td>{{ $used_vehicle->vehicle->variant }}</td>
                    </tr>
                    <tr>
                        <td>Colour: </td>
                        <td>{{ $used_vehicle->colour }}</td>
                    </tr>
                    <tr>
                        <td>Model Year: </td>
                        <td>{{ $used_vehicle->model_year }}</td>
                    </tr>
                    <tr>
                        <td>Kilometers: </td>
                        <td>{{ $used_vehicle->kilometers }}</td>
                    </tr>
                    <tr>
                        <td>Number Of Owners: </td>
                        <td>{{ $used_vehicle->number_of_owners }}</td>
                    </tr>
                    <tr>
                        <td>Transmission: </td>
                        <td>{{ $used_vehicle->transmission_type }}</td>
                    </tr>
                    <tr>
                        <td>Fuel: </td>
                        <td>{{ $used_vehicle->fuel_type }}</td>
                    </tr>
                    <tr>
                        <td>Registered At: </td>
                        <td>{{ $used_vehicle->registered_at }}</td>
                    </tr>
                    <tr>
                        <td>Description: </td>
                        <td>{!! $used_vehicle->description !!}</td>
                    </tr>
                    <tr>
                        <td>Price (INR): </td>
                        <td>{{ $used_vehicle->price }}</td>
                    </tr>
                    <tr>
                        <td>Insurance: </td>
                        <td>{{ $used_vehicle->insurance? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>State: </td>
                        <td>{{ $used_vehicle->state }}</td>
                    </tr>
                    <tr>
                        <td>City: </td>
                        <td>{{ $used_vehicle->city }}</td>
                    </tr>
                    <tr>
                        <td>Location: </td>
                        <td>{{ $used_vehicle->location }}</td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td>{{ $used_vehicle->address }}</td>
                    </tr>
                    <tr>
                        <td>Pincode: </td>
                        <td>{{ $used_vehicle->pincode }}</td>
                    </tr>
                    @if(isset($used_vehicle->pictures))
                    <tr>
                        <td>Galary: </td>
                        <td>
                            @foreach($used_vehicle->pictures as $picture)
                                <img src="{{asset('uploads/' . $picture->path)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                            @endforeach
                        </td>
                    </tr>
                    @elseif(isset($vehicle->pictures))
                    <tr>
                        <td>Galary: </td>
                        <td>
                            @foreach($vehicle->pictures as $picture)
                                <img src="{{asset('uploads/' . $picture->path)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                            @endforeach
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td>Status: </td>
                        <td>{{ $used_vehicle->status }}</td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>{{ $used_vehicle->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>{{ $used_vehicle->updated_at }}</td>
                    </tr>
	            </tbody>
	            <tfoot>
                    <tr>
                        <th colspan="2">
                            <ul class="btn-list">
                                <li><a class="btn btn-primary" href="{{ route('secure.dealers.used_vehicles.index', $dealer->id) }}"><i class="fa fa-table"></i></a></li>
                                <li><a class="btn btn-warning" href="{{ route('secure.dealers.used_vehicles.edit', [$dealer->id, $used_vehicle->id]) }}"><i class="fa fa-pencil"></i></a></li>
                            </ul>
                        </th>
                    </tr>
                </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection