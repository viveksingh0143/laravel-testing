@extends('layouts.frontend.frontend')
@section('content')
    <div class="container pagecontainer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Dealers List</h1>
                    <table class="table table-bordered table-hover table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact Person</th>
                            <th>E-Mail</th>
                            <th>City</th>
                            <th>Location</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dealers as $dealer)
                            <tr>
                                <td><a href="{{ route('dealer-page', $dealer->slug) }}">{{ $dealer->name }}</a></td>
                                <td>{{ $dealer->contact_person }}</td>
                                <td>{{ $dealer->email }}</td>
                                <td>{{ $dealer->city }}</td>
                                <td>{{ $dealer->location }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection