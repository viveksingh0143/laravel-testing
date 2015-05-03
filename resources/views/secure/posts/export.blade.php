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
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->title }}</td>
                <td>{!! $post->excerpt !!}</td>
                <td>{!! $post->body !!}</td>
                <td>{{ $post->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
