@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
            <h1>{{ $used_vehicle->vehicle->bname }}/{{ $used_vehicle->vehicle->model }}/{{ $used_vehicle->vehicle->variant}} Used Details</h1>
            <table class="table table-bordered table-hover table-striped table-responsive">
                @if(isset($used_vehicle) && isset($used_vehicle->thumbnail))
                    <thead>
                    <tr>
                        <td colspan="2"><img src="{{asset('uploads/' . $used_vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" /></td>
                    </tr>
                    </thead>
                @endif
                <tbody>
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
                    <td>Transmission: </td>
                    <td>{{ $used_vehicle->transmission_type }}</td>
                </tr>
                <tr>
                    <td>Fuel: </td>
                    <td>{{ $used_vehicle->fuel_type }}</td>
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
                    <td>Current Price (INR):</td>
                    <td>{{ $used_vehicle->vehicle->price }}</td>
                </tr>
                <tr>
                    <td>Dealer Price (INR): </td>
                    <td>{{ $used_vehicle->price }}</td>
                </tr>
                <tr>
                    <td>Insurance: </td>
                    <td>{{ $used_vehicle->insurance? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Number Of Owners: </td>
                    <td>{{ $used_vehicle->number_of_owners }}</td>
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
                <tr>
                    <td>Transmission Type:</td>
                    <td>{{ $used_vehicle->vehicle->transmission_type }}</td>
                </tr>
                <tr>
                    <td>Body Type:</td>
                    <td>{{ $used_vehicle->vehicle->body_type }}</td>
                </tr>
                <tr>
                    <td>Fuel Type:</td>
                    <td>{{ $used_vehicle->vehicle->fuel_type }}</td>
                </tr>
                <tr>
                    <td>Drive Type</td>
                    <td>{{ $used_vehicle->vehicle->drive_type }}</td>
                </tr>
                <tr>
                    <td>Seating Capacity</td>
                    <td>{{ $used_vehicle->vehicle->seating_capacity }}</td>
                </tr>
                <tr>
                    <td>Engine Power</td>
                    <td>{{ $used_vehicle->vehicle->engine_power }} BHP</td>
                </tr>
                <tr>
                    <td>Power Windows</td>
                    <td>{{ $used_vehicle->vehicle->power_windows? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>ABS</td>
                    <td>{{ $used_vehicle->vehicle->abs? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Rear Defogger</td>
                    <td>{{ $used_vehicle->vehicle->rear_defogger? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Inbuilt Music System</td>
                    <td>{{ $used_vehicle->vehicle->inbuilt_music_system? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Sunroof Moonroof</td>
                    <td>{{ $used_vehicle->vehicle->sunroof_moonroof? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Anti Theft Immobilizer</td>
                    <td>{{ $used_vehicle->vehicle->anti_theft_immobilizer? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Steering Mounted Controls</td>
                    <td>{{ $used_vehicle->vehicle->steering_mounted_controls? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Rear Parking Sensors</td>
                    <td>{{ $used_vehicle->vehicle->rear_parking_sensors? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Rear Wash Wiper</td>
                    <td>{{ $used_vehicle->vehicle->rear_wash_wiper? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Seat Ipholstery</td>
                    <td>{{ $used_vehicle->vehicle->seat_upholstery? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Adjustable Steering</td>
                    <td>{{ $used_vehicle->vehicle->adjustable_steering? 'Yes' : 'No' }}</td>
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
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="2">
                        <ul class="btn-list">
                            <li><a class="btn btn-primary" href="{{ route('dealer-area.used_vehicles.index') }}"><i class="fa fa-table"></i> List</a></li>
                        </ul>
                    </th>
                </tr>
                </tfoot>
            </table>
	    </div>
	</div>
</div>
@endsection