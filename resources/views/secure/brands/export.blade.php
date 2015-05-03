<table class="table table-bordered table-hover table-striped table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Slug</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->slug }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->description }}</td>
                <td>{{ $brand->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
