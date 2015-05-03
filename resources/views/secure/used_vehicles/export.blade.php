<table class="table table-bordered table-hover table-striped table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Variant</th>
            <th>Colour</th>
            <th>Model Year</th>
            <th>Number Of Owners</th>
            <th>Registered At</th>
            <th>Transmission Type</th>
            <th>Fuel Type</th>
            <th>Description</th>
            <th>Kilometers</th>
            <th>Price</th>
            <th>Insurance</th>
            <th>State</th>
            <th>City</th>
            <th>Location</th>
            <th>Address</th>
            <th>Pincode</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($used_vehicles as $used_vehicle)
            <tr>
                <td>{{ $used_vehicle->id }}</td>
                <td>{{ $used_vehicle->vehicle->bname }}</td>
                <td>{{ $used_vehicle->vehicle->model }}</td>
                <td>{{ $used_vehicle->vehicle->variant }}</td>
                <td>{{ $used_vehicle->colour }}</td>
                <td>{{ $used_vehicle->model_year }}</td>
                <td>{{ $used_vehicle->number_of_owners }}</td>
                <td>{{ $used_vehicle->registered_at }}</td>
                <td>{{ empty($used_vehicle->transmission_type)? $used_vehicle->vehicle->transmission_type : $used_vehicle->transmission_type }}</td>
                <td>{{ empty($used_vehicle->fuel_type)? $used_vehicle->vehicle->fuel_type : $used_vehicle->fuel_type }}</td>
                <td>{!! $used_vehicle->description !!}</td>
                <td>{{ $used_vehicle->kilometers }}</td>
                <td>{{ $used_vehicle->price }}</td>
                <td>{{ $used_vehicle->insurance }}</td>
                <td>{{ $used_vehicle->state }}</td>
                <td>{{ $used_vehicle->city }}</td>
                <td>{{ $used_vehicle->location }}</td>
                <td>{{ $used_vehicle->address }}</td>
                <td>{{ $used_vehicle->pincode }}</td>
                <td>{{ $used_vehicle->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>




