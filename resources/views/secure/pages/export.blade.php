<table class="table table-bordered table-hover table-striped table-responsive">
    <thead>
    <tr>
        <th>ID</th>
        <th>Slug</th>
        <th>Title</th>
        <th>Excerpt</th>
        <th>Body</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pages as $page)
        <tr>
            <td>{{ $page->id }}</td>
            <td>{{ $page->slug }}</td>
            <td>{{ $page->title }}</td>
            <td>{!! $page->excerpt !!}</td>
            <td>{!! $page->body !!}</td>
            <td>{{ $page->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
