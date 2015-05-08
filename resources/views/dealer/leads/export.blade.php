<table class="table table-bordered table-hover table-striped table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Subject</th>
            <th>Request/Query</th>
            <th>User Request</th>
        </tr>
    </thead>
    <tbody>
        @foreach($leads as $lead)
            <tr>
                <td>{{ $lead->id }}</td>
                <td>{{ $lead->type }}</td>
                <td>{{ $lead->subject }}</td>
                <td>{!! $lead->body !!}</td>
                <td>{{ ($lead->user)? 'Myself' : 'All users' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
