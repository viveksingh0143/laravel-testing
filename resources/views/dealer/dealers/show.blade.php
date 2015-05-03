@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <h1>{{ $dealer->name }} Details</h1>
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <tbody>
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
                    @if($dealer->logo)
                    <tr>
                        <td>Logo: </td>
                        <td>
                            <img src="{{asset('uploads/' . $dealer->logo)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                        </td>
                    </tr>
                    @endif
	            </tbody>
	            <tfoot>
                    <tr>
                        <th colspan="2">
                            <ul class="btn-list">
                                <li><a class="btn btn-primary" href="{{ route('dealer-area.dealers.index') }}"><i class="fa fa-table"></i> List</a></li>
                            </ul>
                        </th>
                    </tr>
                </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection
