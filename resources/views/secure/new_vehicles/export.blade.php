<table class="table table-bordered table-hover table-striped table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Variant</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($new_vehicles as $new_vehicle)
            <tr>
                <td>{{ $new_vehicle->id }}</td>
                <td>{{ $new_vehicle->vehicle->bname }}</td>
                <td>{{ $new_vehicle->vehicle->model }}</td>
                <td>{{ $new_vehicle->vehicle->variant }}</td>
                <td>{{ $new_vehicle->price }}</td>
                <td>{{ $new_vehicle->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
