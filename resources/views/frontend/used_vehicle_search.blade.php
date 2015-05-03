@extends('layouts.frontend.frontend')

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/select2/select2.min.css') }}" />
@endsection

@section('content')
    <div class="container pagecontainer">
        {!! Form::open(['url' => '/used-vehicle-search', 'method' => 'get', 'role' => 'form', 'class' => 'form-horizontal form-change-submit']) !!}
        @include('frontend.partials.used_vehicle_search_sidebar')
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 description">
            @include('frontend.partials.used_vehicle_search_sortbar')
            <div class="line2"></div>
            @foreach($used_vehicles as $used_vehicle)
            <div class="container-fluid description_inner">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 img_description">
                    @if(isset($used_vehicle->thumbnail))
                        <img src="{{asset('images/cache/medium/' . $used_vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 300px;" />
                    @elseif(isset($used_vehicle->vehicle->thumbnail))
                        <img src="{{asset('images/cache/medium/' . $used_vehicle->vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 300px;" />
                    @else
                        <img src="{{asset('/carmazic/img/car-clipart.jpg')}}" class="img-thumbnail img-responsive" style="max-width: 300px;" />
                    @endif
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 description_inner1 wow flipInX animated" data-wow-duration="0.8s" style="visibility: visible;-webkit-animation-duration: 0.8s; -moz-animation-duration: 0.8s; animation-duration: 0.8s;">
                    <div class="container-fluid" >
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 description_inner_right">
                            <a href="{{ route('used-vehicle-details', [$used_vehicle->id, str_slug($used_vehicle->vehicle->bname . ' ' . $used_vehicle->vehicle->model . ' ' . $used_vehicle->vehicle->variant)]) }}">{{ $used_vehicle->vehicle->bname }} {{ $used_vehicle->vehicle->model }} {{ $used_vehicle->vehicle->variant }}</a>
                            <p class="gray"><i class="fa fa-map-marker"></i> {{ $used_vehicle->state }} <i class="fa fa-paint-brush color_car"></i> {{ $used_vehicle->colour }}</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 description_inner_left">
                            <span class="price1"><i class="fa fa-inr"></i> {{ ($used_vehicle->price)? $used_vehicle->price : 'NP' }}/-</span><br>
                        </div>
                    </div>
                    <div class="line3"></div>
                    <div class="container-fluid des_inner">
                        <div class="row">
                        <div class="col-sm-4 des_inner_2">
                            <strong><i class="fa fa-road"></i> {{ $used_vehicle->kilometers }} km</strong>
                        </div>
                        <div class="col-sm-4 des_inner_2">
                            <strong><i class="fa fa-car"></i> {{ $used_vehicle->model_year }} Model</strong>
                        </div>
                        <div class="col-sm-4 des_inner_2">
                            <strong><i class="fa fa-filter"></i> {{ empty($used_vehicle->fuel_type)? $used_vehicle->vehicle->fuel_type: $used_vehicle->fuel_type }}</strong>
                        </div>
                        <div class="col-sm-4 des_inner_2">
                            <strong><i class="fa fa-tachometer"></i> {{ empty($used_vehicle->transmission_type)? $used_vehicle->vehicle->transmission_type : $used_vehicle->transmission_type }}</strong>
                        </div>
                        <div class="col-sm-4 des_inner_2">
                            <strong><i class="fa fa-user-plus"></i> {{ owner_number_to_words($used_vehicle->number_of_owners) }}</strong>
                        </div>
                        @if(!Auth::guest())
                        <div class="col-sm-4 des_inner_2">
                            <strong><i class="fa fa-user-plus"></i> {{ $used_vehicle->dealer->name }}</strong>
                        </div>
                        @endif
                        </div>
                        <div class="row">
                        <a href="{{ route('used-vehicle-details', [$used_vehicle->id, str_slug($used_vehicle->vehicle->bname . ' ' . $used_vehicle->vehicle->model . ' ' . $used_vehicle->vehicle->variant)]) }}" target="_blank" type="button" class="pull-right btn btn-success" style="margin-left:5px">Details</a>
                        <a href="{{ route('used-vehicle-seller-details', [$used_vehicle->id, $used_vehicle->dealer->slug]) }}" target="_blank" type="button" class="pull-right btn btn-info">Get Seller Details</a>
                        <a href="{{ route('used-vehicle-compare-push', [$used_vehicle->id]) }}" type="button" class="pull-right btn btn-success {{ ($more_compare || in_array($used_vehicle->id, $ready_to_compare))? 'disabled' : '' }}" style="margin-right:5px">Compare</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line4"></div>
            @endforeach
            {!! $used_vehicles->appends($request)->render() !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection


@section('footer')
    <script type="text/javascript" src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
    <script>$('select').select2();</script>
@endsection