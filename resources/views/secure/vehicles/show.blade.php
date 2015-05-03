@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <h1>Vehicle</h1>
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            @if(isset($vehicle) && isset($vehicle->thumbnail))
                <thead>
                    <tr>
                        <td colspan="2"><img src="{{asset('uploads/' . $vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" /></td>
                    </tr>
                </thead>
                @endif
                <tbody>
                    <tr>
                        <td>ID: </td>
                        <td>{{ $vehicle->id }}</td>
                    </tr>
                    <tr>
                        <td>Brand: </td>
                        <td>{{ $vehicle->brand->name }}</td>
                    </tr>
                    <tr>
                        <td>Model: </td>
                        <td>{{ $vehicle->model }}</td>
                    </tr>
                    <tr>
                        <td>Variant: </td>
                        <td>{{ $vehicle->variant }}</td>
                    </tr>
                    <tr>
                        <td>Transmission Type:</td>
                        <td>{{ $vehicle->transmission_type }}</td>
                    </tr>
                    <tr>
                        <td>Body Type:</td>
                        <td>{{ $vehicle->body_type }}</td>
                    </tr>
                    <tr>
                        <td>Fuel Type:</td>
                        <td>{{ $vehicle->fuel_type }}</td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>{{ $vehicle->price }}</td>
                    </tr>
                    <tr>
                        <td>Drive Type</td>
                        <td>{{ $vehicle->drive_type }}</td>
                    </tr>
                    <tr>
                        <td>Seating Capacity</td>
                        <td>{{ $vehicle->seating_capacity }}</td>
                    </tr>
                    <tr>
                        <td>Engine Power</td>
                        <td>{{ $vehicle->engine_power }} BHP</td>
                    </tr>
                    <tr>
                        <td>Power Windows</td>
                        <td>{{ $vehicle->power_windows? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>ABS</td>
                        <td>{{ $vehicle->abs? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Rear Defogger</td>
                        <td>{{ $vehicle->rear_defogger? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Inbuilt Music System</td>
                        <td>{{ $vehicle->inbuilt_music_system? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Sunroof Moonroof</td>
                        <td>{{ $vehicle->sunroof_moonroof? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Anti Theft Immobilizer</td>
                        <td>{{ $vehicle->anti_theft_immobilizer? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Steering Mounted Controls</td>
                        <td>{{ $vehicle->steering_mounted_controls? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Rear Parking Sensors</td>
                        <td>{{ $vehicle->rear_parking_sensors? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Rear Wash Wiper</td>
                        <td>{{ $vehicle->rear_wash_wiper? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Seat Ipholstery</td>
                        <td>{{ $vehicle->seat_upholstery? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Adjustable Steering</td>
                        <td>{{ $vehicle->adjustable_steering? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Video</td>
                        <td>{!! $vehicle->video_script !!}</td>
                    </tr>
                    <tr>
                        <td>Brochure</td>
                        <td>
                            @if(isset($vehicle) && isset($vehicle->brochure))
                                <iframe width="100%" src="{{asset('uploads/' . $vehicle->brochure)}}"></iframe>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Galary: </td>
                        <td>
                            @foreach($vehicle->pictures as $picture)
                                <img src="{{asset('uploads/' . $picture->path)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Status: </td>
                        <td>{{ $vehicle->status }}</td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>{{ $vehicle->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>{{ $vehicle->updated_at }}</td>
                    </tr>
	            </tbody>
	            <tfoot>
                    <tr>
                        <th colspan="2">
                            <ul class="btn-list">
                                <li><a class="btn btn-primary" href="{{ route('secure.vehicles.index') }}"><i class="fa fa-table"></i></a></li>
                                <li><a class="btn btn-warning" href="{{ route('secure.vehicles.edit', $vehicle->id) }}"><i class="fa fa-pencil"></i></a></li>
                            </ul>
                        </th>
                    </tr>
                </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection