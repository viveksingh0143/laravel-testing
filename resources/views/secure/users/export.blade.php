<table class="table table-bordered table-hover table-striped table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Role</th>
            <th>Confirmed</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->confirmed? 'Yes' : 'No' }}</td>
                <td>{{ $user->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
