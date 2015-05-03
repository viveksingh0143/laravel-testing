@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <h1>{{ $on_road_price->vehicle->bname }}/{{ $on_road_price->vehicle->model }}/{{ $on_road_price->vehicle->variant}} On Road Price Details</h1>
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            @if(isset($on_road_price) && isset($on_road_price->vehicle->thumbnail))
                <thead>
                    <tr>
                        <td colspan="2"><img src="{{asset('uploads/' . $on_road_price->vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" /></td>
                    </tr>
                </thead>
                @endif
                <tbody>
                    <tr>
                        <td>ID: </td>
                        <td>{{ $on_road_price->id }}</td>
                    </tr>
                    <tr>
                        <td>Brand: </td>
                        <td>{{ $on_road_price->vehicle->bname }}</td>
                    </tr>
                    <tr>
                        <td>Model: </td>
                        <td>{{ $on_road_price->vehicle->model }}</td>
                    </tr>
                    <tr>
                        <td>Variant: </td>
                        <td>{{ $on_road_price->vehicle->variant }}</td>
                    </tr>
                    <tr>
                        <td>Extra Variant: </td>
                        <td>{{ $on_road_price->type }}</td>
                    </tr>
                    <tr>
                        <td>State: </td>
                        <td>{{ $on_road_price->state }}</td>
                    </tr>
                    <tr>
                        <td>Ex-Showroom Price: </td>
                        <td>{{ $on_road_price->ex_show_room_price }} INR</td>
                    </tr>
                    <tr>
                        <td>Regn. Tax & No. Plate Charges: </td>
                        <td>{{ $on_road_price->registration_charge }} INR</td>
                    </tr>
                    <tr>
                        <td>Comp. Insurance with 0% Dep cover: </td>
                        <td>{{ $on_road_price->insurance_charge }} INR</td>
                    </tr>
                    <tr>
                        <td>Warehouse &amp; Handling Charges: </td>
                        <td>{{ $on_road_price->warehouse_charge }} INR</td>
                    </tr>
                    <tr>
                        <td>Extended Warranty (For 2 Years): </td>
                        <td>{{ $on_road_price->extended_warranty_charge }} INR</td>
                    </tr>
                    <tr>
                        <td>Body Care Package: </td>
                        <td>{{ $on_road_price->body_care_charge }} INR</td>
                    </tr>
                    <tr>
                        <td>Essential Accessories Kit: </td>
                        <td>{{ $on_road_price->essential_kit_charge }} INR</td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>{{ $on_road_price->created_at }} INR</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>{{ $on_road_price->updated_at }} INR</td>
                    </tr>
	            </tbody>
	            <tfoot>
                    <tr>
                        <th colspan="2">
                            <ul class="btn-list">
                                <li><a class="btn btn-primary" href="{{ route('secure.on-road-prices.index') }}"><i class="fa fa-table"></i></a></li>
                                <li><a class="btn btn-warning" href="{{ route('secure.on-road-prices.edit', [$on_road_price->id]) }}"><i class="fa fa-pencil"></i></a></li>
                            </ul>
                        </th>
                    </tr>
                </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection