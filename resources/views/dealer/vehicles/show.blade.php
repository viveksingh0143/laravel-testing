@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <h1>{{ $vehicle->bname }}/{{ $vehicle->model }}/{{ $vehicle->variant}} Details</h1>
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
                        <td>Brand: </td>
                        <td>{{ $vehicle->bname }}</td>
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
                        <td>Price (INR):</td>
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
                    @if(isset($vehicle->pictures))
                    <tr>
                        <td>Galary: </td>
                        <td>
                            @foreach($vehicle->pictures as $picture)
                                <img src="{{asset('uploads/' . $picture->path)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                            @endforeach
                        </td>
                    </tr>
                    @endif
	            </tbody>
	            <tfoot>
                    <tr>
                        <th colspan="2">
                            <ul class="btn-list">
                                <li><a class="btn btn-primary" href="{{ route('dealer-area.vehicles.index') }}"><i class="fa fa-table"></i> List</a></li>
                            </ul>
                        </th>
                    </tr>
                </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection