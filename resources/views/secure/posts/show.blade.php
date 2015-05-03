@extends('layouts.backend.backend')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Post</h1>
                <table class="table table-bordered table-hover table-striped table-responsive">
                    @if(isset($post) && isset($post->thumbnail))
                    <thead>
                        <tr>
                            <td colspan="2"><img src="{{asset('uploads/' . $post->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" /></td>
                        </tr>
                    </thead>
                    @endif
                    <tbody>
                    <tr>
                        <td>ID: </td>
                        <td>{{ $post->id }}</td>
                    </tr>
                    <tr>
                        <td>Slug: </td>
                        <td>{{ $post->slug }}</td>
                    </tr>
                    <tr>
                        <td>Title: </td>
                        <td>{{ $post->title }}</td>
                    </tr>
                    <tr>
                        <td>Excerpt: </td>
                        <td>{{ $post->excerpt }}</td>
                    </tr>
                    <tr>
                        <td>Body: </td>
                        <td>{{ $post->body }}</td>
                    </tr>
                    <tr>
                        <td>Status: </td>
                        <td>{{ $post->status }}</td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>{{ $post->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>{{ $post->updated_at }}</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="2">
                            <ul class="btn-list">
                                <li><a class="btn btn-primary" href="{{ route('secure.posts.index') }}"><i class="fa fa-table"></i></a></li>
                                <li><a class="btn btn-warning" href="{{ route('secure.posts.edit', $post->id) }}"><i class="fa fa-pencil"></i></a></li>
                            </ul>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection