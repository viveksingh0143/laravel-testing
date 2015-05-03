@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('dealer.dealers.search', ['legend' => 'Search Dealers'])
			@include('flash::message')
            <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>E-Mail</th>
						<th>Contact Person</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Location</th>
                        <th class="view-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($dealers  as $key => $dealer)
                        <tr>
                            <td>{{ (($dealers->currentPage() - 1) * $dealers->perPage()) + ($key + 1) }}</td>
                            <td>{{ $dealer->name }}</td>
                            <td>{{ $dealer->email }}</td>
                            <td>{{ $dealer->contact_person }}</td>
                            <td>{{ $dealer->state }}</td>
                            <td>{{ $dealer->city }}</td>
                            <td>{{ $dealer->location }}</td>
                            <td><a href="{{ route('dealer-area.dealers.show', [$dealer->id]) }}"><i class="fa fa-eye"></i> View </a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="9">
                            <div class="pagination-no-margin">{!! $dealers->appends(@$request)->render() !!}</div>
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection