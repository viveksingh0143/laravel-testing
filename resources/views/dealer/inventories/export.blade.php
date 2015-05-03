<table class="table table-bordered table-hover table-striped table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Contact Person</th>
            <th>City</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dealers as $dealer)
            <tr>
                <td>{{ $dealer->id }}</td>
                <td>{{ $dealer->name }}</td>
                <td>{{ $dealer->email }}</td>
                <td>{{ $dealer->contact_person }}</td>
                <td>{{ $dealer->city }}</td>
                <td>{{ $dealer->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
