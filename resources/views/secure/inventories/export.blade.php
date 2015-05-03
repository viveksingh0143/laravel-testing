<table class="table table-bordered table-hover table-striped table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Slug</th>
            <th>E-Mail</th>
            <th>Name</th>
            <th>Contact Person</th>
            <th>About Us</th>
            <th>State</th>
            <th>City</th>
            <th>Location</th>
            <th>Address</th>
            <th>Pincode</th>
            <th>Website</th>
            <th>Mobile Number</th>
            <th>Office Number</th>
            <th>Status</th>
            <th>User E-Mail</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dealers as $dealer)
            <tr>
                <td>{{ $dealer->id }}</td>
                <td>{{ $dealer->slug }}</td>
                <td>{{ $dealer->email }}</td>
                <td>{{ $dealer->name }}</td>
                <td>{{ $dealer->contact_person }}</td>
                <td>{!! $dealer->about_us !!}</td>
                <td>{{ $dealer->state }}</td>
                <td>{{ $dealer->city }}</td>
                <td>{{ $dealer->location }}</td>
                <td>{{ $dealer->address }}</td>
                <td>{{ $dealer->pincode }}</td>
                <td>{{ $dealer->website }}</td>
                <td>{{ $dealer->mobile_number }}</td>
                <td>{{ $dealer->office_number }}</td>
                <td>{{ $dealer->status }}</td>
                <td>{{ $dealer->user->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
