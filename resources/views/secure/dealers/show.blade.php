@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <h1>Dealer</h1>
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <tbody>
                    <tr>
                        <td>ID: </td>
                        <td>{{ $dealer->id }}</td>
                    </tr>
                    <tr>
                        <td>Company Name: </td>
                        <td>{{ $dealer->name }}</td>
                    </tr>
                    <tr>
                        <td>Contact Person: </td>
                        <td>{{ $dealer->contact_person }}</td>
                    </tr>
                    <tr>
                        <td>E-Mail: </td>
                        <td>{{ $dealer->email }}</td>
                    </tr>
                    <tr>
                        <td>About Us: </td>
                        <td>{{ $dealer->about_us }}</td>
                    </tr>
                    <tr>
                        <td>Country: </td>
                        <td>{{ $dealer->country }}</td>
                    </tr>
                    <tr>
                        <td>State: </td>
                        <td>{{ $dealer->state }}</td>
                    </tr>
                    <tr>
                        <td>City: </td>
                        <td>{{ $dealer->city }}</td>
                    </tr>
                    <tr>
                        <td>Location: </td>
                        <td>{{ $dealer->location }}</td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td>{{ $dealer->address }}</td>
                    </tr>
                    <tr>
                        <td>Website: </td>
                        <td>{{ $dealer->website }}</td>
                    </tr>
                    <tr>
                        <td>Mobile Number: </td>
                        <td>{{ $dealer->mobile_number }}</td>
                    </tr>
                    <tr>
                        <td>Office Number: </td>
                        <td>{{ $dealer->office_number }}</td>
                    </tr>
                    <tr>
                        <td>Attached With User: </td>
                        <td>
                            @if($dealer->user)
                                <a href="{{ route('secure.users.show', $dealer->user->id) }}">{{ $dealer->user->name }}</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Logo: </td>
                        <td>
                            <img src="{{asset('uploads/' . $dealer->logo)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                        </td>
                    </tr>
                    <tr>
                        <td>Ad Image: </td>
                        <td>
                            <img src="{{asset('uploads/' . $dealer->ad_image)}}" class="img-thumbnail img-responsive" style="max-height: 120px;" />
                        </td>
                    </tr>
                    @if(isset($dealer->pictures))
                    <tr>
                        <td>Galary: </td>
                        <td>
                            @foreach($dealer->pictures as $picture)
                                <img src="{{asset('uploads/' . $picture->path)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                            @endforeach
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td>Created At</td>
                        <td>{{ $dealer->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>{{ $dealer->updated_at }}</td>
                    </tr>
	            </tbody>
	            <tfoot>
                    <tr>
                        <th colspan="2">
                            <ul class="btn-list">
                                <li><a class="btn btn-primary" href="{{ route('secure.dealers.index') }}"><i class="fa fa-table"></i></a></li>
                                <li><a class="btn btn-warning" href="{{ route('secure.dealers.edit', $dealer->id) }}"><i class="fa fa-pencil"></i></a></li>
                            </ul>
                        </th>
                    </tr>
                </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection
