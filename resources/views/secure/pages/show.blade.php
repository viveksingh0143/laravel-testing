@extends('layouts.backend.backend')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Page</h1>
                <table class="table table-bordered table-hover table-striped table-responsive">
                    @if(isset($page) && isset($page->thumbnail))
                    <thead>
                        <tr>
                            <td colspan="2"><img src="{{asset('uploads/' . $page->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" /></td>
                        </tr>
                    </thead>
                    @endif
                    <tbody>
                        <tr>
                            <td>ID: </td>
                            <td>{{ $page->id }}</td>
                        </tr>
                        <tr>
                            <td>Slug: </td>
                            <td>{{ $page->slug }}</td>
                        </tr>
                        <tr>
                            <td>Title: </td>
                            <td>{{ $page->title }}</td>
                        </tr>
                        <tr>
                            <td>Excerpt: </td>
                            <td>{!! $page->excerpt !!}</td>
                        </tr>
                        <tr>
                            <td>Body: </td>
                            <td>{!! $page->body !!}</td>
                        </tr>
                        <tr>
                            <td>Status: </td>
                            <td>{{ $page->status }}</td>
                        </tr>
                        <tr>
                            <td>Created At</td>
                            <td>{{ $page->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated At</td>
                            <td>{{ $page->updated_at }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">
                                <ul class="btn-list">
                                    <li><a class="btn btn-primary" href="{{ route('secure.pages.index') }}"><i class="fa fa-table"></i></a></li>
                                    <li><a class="btn btn-warning" href="{{ route('secure.pages.edit', $page->id) }}"><i class="fa fa-pencil"></i></a></li>
                                </ul>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection