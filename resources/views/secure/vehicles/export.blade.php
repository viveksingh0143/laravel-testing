<table class="table table-bordered table-hover table-striped table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Variant</th>
            <th>Description</th>
            <th>Transmission Type</th>
            <th>Body Type</th>
            <th>Fuel Type</th>
            <th>Drive Type</th>
            <th>Price</th>
            <th>Seating Capacity</th>
            <th>Engine Power</th>
            <th>Power Window</th>
            <th>ABS</th>
            <th>Rear Defogger</th>
            <th>Inbuilt Music System</th>
            <th>Sunroof Moonroof</th>
            <th>Anti Theft Immobilizer</th>
            <th>Steering Mounted Controls</th>
            <th>Rear Parking Sensors</th>
            <th>Rear Wash Wiper</th>
            <th>Seat Upholstery</th>
            <th>Adjustable Steering</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->id }}</td>
                <td>{{ $vehicle->bname }}</td>
                <td>{{ $vehicle->model }}</td>
                <td>{{ $vehicle->variant }}</td>
                <td>{{ $vehicle->description }}</td>
                <td>{{ $vehicle->transmission_type }}</td>
                <td>{{ $vehicle->body_type }}</td>
                <td>{{ $vehicle->fuel_type }}</td>
                <td>{{ $vehicle->drive_type }}</td>
                <td>{{ $vehicle->price }}</td>
                <td>{{ $vehicle->seating_capacity }}</td>
                <td>{{ $vehicle->engine_power }}</td>
                <td>{{ $vehicle->power_windows? 'Yes' : 'No' }}</td>
                <td>{{ $vehicle->abs? 'Yes' : 'No' }}</td>
                <td>{{ $vehicle->rear_defogger? 'Yes' : 'No' }}</td>
                <td>{{ $vehicle->inbuilt_music_system? 'Yes' : 'No' }}</td>
                <td>{{ $vehicle->sunroof_moonroof? 'Yes' : 'No' }}</td>
                <td>{{ $vehicle->anti_theft_immobilizer? 'Yes' : 'No' }}</td>
                <td>{{ $vehicle->steering_mounted_controls? 'Yes' : 'No' }}</td>
                <td>{{ $vehicle->rear_parking_sensors? 'Yes' : 'No' }}</td>
                <td>{{ $vehicle->rear_wash_wiper? 'Yes' : 'No' }}</td>
                <td>{{ $vehicle->seat_upholstery? 'Yes' : 'No' }}</td>
                <td>{{ $vehicle->adjustable_steering? 'Yes' : 'No' }}</td>
                <td>{{ $vehicle->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>