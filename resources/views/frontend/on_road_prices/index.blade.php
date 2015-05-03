@extends('layouts.frontend.frontend')

@section('content')
<div class="container-fluid pagecontainer">
    <div class="hpadding50c">
        <div class="container-fluid">
            <div class="col-sm-12 col-xs-12 wow flipInX animated animated" data-wow-duration="2.0s" style="visibility: visible; -webkit-animation: flipInX 2.0s;">
                <p class="size30 slim">Vehicles on road prices</p>
            </div>
        </div>
        <p class="aboutarrow"></p>
    </div>
    <div class="line4"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('flash::message')
                {!! Form::open(['method' => 'get', 'role' => 'form']) !!}
                <table class="table table-bordered table-hover table-striped table-responsive">
                    <thead>
                        <tr>
                            <th style="width:30px;">S.No.</th>
                            <th>Carlin/Variant</th>
                            <th>Ex-Showroom Price</th>
                            <th>Registration Charge</th>
                            <th>Insurance Charge</th>
                            <th>Warehouse Charge</th>
                            <th>Extended Warranty Charge</th>
                            <th>On Road Price (Pre Packaged)</th>
                            <th>Body Care Charge</th>
                            <th>Essential Kit Charge</th>
                            <th>On Road Price (Post Packaged)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($on_road_prices as $key => $on_road_price)
                            <tr>
                                <td>{{ (($on_road_prices->currentPage() - 1) * $on_road_prices->perPage()) + ($key + 1) }}</td>
                                <td>{{ $on_road_price->vehicle->brand->name }} {{ $on_road_price->vehicle->model }} {{ $on_road_price->vehicle->variant }} {{ $on_road_price->type }}</td>
                                <td>{{ $on_road_price->ex_show_room_price }} INR</td>
                                <td>{{ $on_road_price->registration_charge }} INR</td>
                                <td>{{ $on_road_price->insurance_charge }} INR</td>
                                <td>{{ $on_road_price->warehouse_charge }} INR</td>
                                <td>{{ $on_road_price->extended_warranty_charge }} INR</td>
                                <td>{{ $on_road_price->prePackageRoadPrice }} INR</td>
                                <td>{{ $on_road_price->body_care_charge }} INR</td>
                                <td>{{ $on_road_price->essential_kit_charge }} INR</td>
                                <td>{{ $on_road_price->postPackageRoadPrice }} INR</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="11">
                                <div class="pagination-no-margin">{!! $on_road_prices->appends(@$request)->render() !!}</div>
                            </th>
                        </tr>
                    </tfoot>
                </table>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection