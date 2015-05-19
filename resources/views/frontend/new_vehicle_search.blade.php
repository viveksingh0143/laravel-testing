@extends('layouts.frontend.frontend')

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/select2/select2.min.css') }}" />
@endsection

@section('content')
    <div class="container pagecontainer">
        {!! Form::open(['url' => '/new-vehicle-search', 'method' => 'get', 'role' => 'form', 'class' => 'form-horizontal form-change-submit']) !!}
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 filter">
            <div class="filtertip">
                <p class="itineraries-found bold"><b>{{ $vehicles->total() }}</b> Results Found</p>
                <div class="tip-arrow" style="bottom: -9px;"></div>
            </div>

            <div class="filter_tip1">
                <h4 class="headline">Make</h4>
                <div class="filter-list">
                @foreach($brands as $brand)
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('bname[]', $brand, in_array($brand, (@$request['bname'])? $request['bname'] : [])) !!} {{ $brand }}
                    </label>
                </div>
                @endforeach
                </div>


                @if(!empty($models))
                <h4 class="headline">Models</h4>
                <div class="filter-list">
                @foreach($models as $model)
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('model[]', $model, in_array($model, (@$request['model'])? $request['model'] : [])) !!} {{ $model }}
                    </label>
                </div>
                @endforeach
                </div>
                @endif

                @if(!empty($variants))
                <h4 class="headline">Variant</h4>
                <div class="filter-list">
                @foreach($variants as $variant)
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('variant[]', $variant, in_array($variant, (@$request['variant'])? $request['variant'] : [])) !!} {{ $variant }}
                    </label>
                </div>
                @endforeach
                </div>
                @endif

                <h4 class="headline">Budget</h4>
                <div class="filter-list">
                    <div class="radio">
                        <label>
                        {!! Form::radio('price', '', ('' == @$request['price'])) !!} All
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        {!! Form::radio('price', '0-50000', ('0-50000' == @$request['price'])) !!} Less than INR 50,000
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        {!! Form::radio('price', '50000-100000', ('50000-100000' == @$request['price'])) !!} INR 50,000 to INR 1,00,000
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        {!! Form::radio('price', '100000-200000', ('100000-200000' == @$request['price'])) !!} INR 1,00,000 to INR 2,00,000
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        {!! Form::radio('price', '200000-300000', ('200000-300000' == @$request['price'])) !!} INR 2,00,000 to INR 3,00,000
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        {!! Form::radio('price', '300000-500000', ('300000-500000' == @$request['price'])) !!} INR 5,00,000 to INR 5,00,000
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        {!! Form::radio('price', '500000-50000000', ('500000-50000000' == @$request['price'])) !!} More than INR 5,00,000
                        </label>
                    </div>
                </div>

                <h4 class="headline">Transmission Type</h4>
                <div class="filter-list">
                @foreach($transmission_types as $transmission_type)
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('transmission_type[]', $transmission_type, in_array($transmission_type, (@$request['transmission_type'])? $request['transmission_type'] : [])) !!} {{ $transmission_type }}
                        </label>
                    </div>
                @endforeach
                </div>

                @if(!empty($body_types) && count($body_types) > 1)
                <h4 class="headline">Body Type</h4>
                <div class="filter-list">
                @foreach($body_types as $body_type)
                    @if(!empty($body_type))
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('body_type[]', $body_type, in_array($body_type, (@$request['body_type'])? $request['body_type'] : [])) !!} {{ $body_type }}
                        </label>
                    </div>
                    @endif
                @endforeach
                </div>
                @endif

                <h4 class="headline">Fuel Type</h4>
                <div class="filter-list">
                @foreach($fuel_types as $fuel_type)
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('fuel_type[]', $fuel_type, in_array($fuel_type, (@$request['fuel_type'])? $request['fuel_type'] : [])) !!} {{ $fuel_type }}
                        </label>
                    </div>
                @endforeach
                </div>

                @if(!empty($drive_types) && count($drive_types) > 1)
                <h4 class="headline">Drive Type</h4>
                <div class="filter-list">
                @foreach($drive_types as $drive_type)
                    @if(!empty($drive_type))
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('drive_type[]', $drive_type, in_array($drive_type, (@$request['drive_type'])? $request['drive_type'] : [])) !!} {{ $drive_type }}
                        </label>
                    </div>
                    @endif
                @endforeach
                </div>
                @endif

                <h4 class="headline">Features</h4>
                <div class="filter-list">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('power_windows', true, @$request['power_windows']) !!} Power Windows
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('abs', true, @$request['abs']) !!} ABS
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('rear_defogger', true, @$request['rear_defogger']) !!} Rear Defogger
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('inbuilt_music_system', true, @$request['inbuilt_music_system']) !!} Inbuilt Music System
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('sunroof_moonroof', true, @$request['sunroof_moonroof']) !!} Sunroof Moonroof
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('anti_theft_immobilizer', true, @$request['anti_theft_immobilizer']) !!} Anti Theft Immobilizer
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('steering_mounted_controls', true, @$request['steering_mounted_controls']) !!} Steering Mounted Controls
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('rear_parking_sensors', true, @$request['rear_parking_sensors']) !!} Rear Parking Sensors
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('rear_wash_wiper', true, @$request['rear_wash_wiper']) !!} Rear Wash Wiper
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('seat_upholstery', true, @$request['seat_upholstery']) !!} Seat Upholstery
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('adjustable_steering', true, @$request['adjustable_steering']) !!} Adjustable Steering
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 description">
            <div class="container-fluid">
                <form class="form-horizontal" role="form">
                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <h4>Short by :</h4>
                    </div>
                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="container-fluid">
                            {!! Form::select('psort', ['' => 'Price', 'asc' => 'Low to High', 'desc' => 'High to Low'], @$request['psort'], ['class' => 'form-control', 'placeholder' => 'Price']) !!}
                        </div>
                    </div>
                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="container-fluid" id="Duration">
                            {!! Form::select('ysort', ['' => 'Manufacturing', 'asc' => 'Oldest', 'desc' => 'Newest'], @$request['ysort'], ['class' => 'form-control', 'placeholder' => 'Manufacturing']) !!}
                        </div>
                    </div>
                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="container-fluid" id="persons">
                            <select class="form-control">
                                <option>Popular</option>
                                <option>Most Popular</option>
                                <option>Bestseller</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="line2"></div>
            @foreach($vehicles as $vehicle)
            <div class="container-fluid description_inner">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 img_description">
                    @if(isset($vehicle->thumbnail))
                        <img src="{{asset('images/cache/medium/' . $vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 300px;" />
                    @elseif(isset($vehicle->thumbnail))
                        <img src="{{asset('images/cache/medium/' . $vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 300px;" />
                    @else
                        <img src="{{asset('/carmazic/img/car-clipart.jpg')}}" class="img-thumbnail img-responsive" style="max-width: 300px;" />
                    @endif
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 description_inner1 wow flipInX animated" data-wow-duration="0.8s" style="visibility: visible;-webkit-animation-duration: 0.8s; -moz-animation-duration: 0.8s; animation-duration: 0.8s;">
                    <div class="container-fluid" >
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 description_inner_right">
                            <a href="{{ route('new-vehicle-details', [$vehicle->id, str_slug($vehicle->bname . ' ' . $vehicle->model . ' ' . $vehicle->variant)]) }}">{{ $vehicle->bname }} {{ $vehicle->model }} {{ $vehicle->variant }}</a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 description_inner_left">
                            <span class="price1"><i class="fa fa-inr"></i> {{ ($vehicle->price)? $vehicle->price : 'NP' }}/-</span><br>
                        </div>
                    </div>
                    <div class="line3"></div>
                    <div class="container-fluid des_inner">
                        <div class="row">
                            <div class="col-sm-4 des_inner_2">
                                <strong><i class="fa fa-filter"></i> {{ $vehicle->fuel_type }}</strong>
                            </div>
                            <div class="col-sm-4 des_inner_2">
                                <strong><i class="fa fa-tachometer"></i> {{ $vehicle->transmission_type }}</strong>
                            </div>
                        </div>
                        <div class="row">
                            <a href="{{ route('new-vehicle-details', [$vehicle->id, str_slug($vehicle->bname . ' ' . $vehicle->model . ' ' . $vehicle->variant)]) }}" target="_blank" type="button" class="pull-right btn btn-success" style="margin-left:5px">Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line4"></div>
            @endforeach
            {!! $vehicles->appends($request)->render() !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection


@section('footer')
    <script type="text/javascript" src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
    <script>$('select').select2();</script>
@endsection