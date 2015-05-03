@extends('layouts.frontend.frontend')

@section('content')
    <div class="container pagecontainer">
        <div class="hpadding50c">
            <div class="container-fluid">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 wow flipInX animated animated" data-wow-duration="2.0s" style="visibility: visible; -webkit-animation: flipInX 2.0s;">
                    <p class="size30 slim">Compare Used Vehicles</p>
                </div>
            </div>
            <p class="aboutarrow"></p>
        </div>

        @if(!empty($used_vehicles_compare))
        <div class="line3"></div>
        <div class="container-fluid" style="margin-top:20px">
            <div class="row">
                <div class="col-sm-12">
                <table class="table table-bordered table-striped table-responsive">
                    <tr>
                        <td>Brand</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ $used_vehicle->vehicle->bname }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Model</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ $used_vehicle->vehicle->model }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Variant</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ $used_vehicle->vehicle->variant }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Transmission</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ empty($used_vehicle->transmission_type)? $used_vehicle->vehicle->transmission_type : $used_vehicle->transmission_type }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Fuel</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ empty($used_vehicle->fuel_type)? $used_vehicle->vehicle->fuel_type: $used_vehicle->fuel_type }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Picture</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>
                            <div class="thumbnail">
                                @if(isset($used_vehicle->thumbnail))
                                    <img src="{{asset('images/cache/medium/' . $used_vehicle->thumbnail)}}" class="img-responsive" />
                                @elseif(isset($used_vehicle->vehicle->thumbnail))
                                    <img src="{{asset('images/cache/medium/' . $used_vehicle->vehicle->thumbnail)}}" class="img-responsive" />
                                @else
                                    <img src="{{asset('/carmazic/img/car-clipart.jpg')}}" class="img-responsive" />
                                @endif
                            </div>
                        </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Colour</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ $used_vehicle->colour }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Model Year</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ $used_vehicle->model_year }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Kilometers</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ $used_vehicle->kilometers }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Price (INR)</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ $used_vehicle->price }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Insurance</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ ($used_vehicle->insurance)? 'Yes' : 'No' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Body Type</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ $used_vehicle->body_type }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Drive Type</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ $used_vehicle->drive_type }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Seating Capacity</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ $used_vehicle->seating_capacity }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Engine Power</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ $used_vehicle->engine_power }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Power Windows</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ ($used_vehicle->vehicle->power_windows)? 'Yes' : 'No' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>ABS</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ ($used_vehicle->vehicle->abs)? 'Yes' : 'No' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Rear Defogger</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ ($used_vehicle->vehicle->rear_defogger)? 'Yes' : 'No' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Inbuilt Music System</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ ($used_vehicle->vehicle->inbuilt_music_system)? 'Yes' : 'No' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Sunroof/Moonroof</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ ($used_vehicle->vehicle->sunroof_moonroof)? 'Yes' : 'No' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Anti Theft Immobilizer</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ ($used_vehicle->vehicle->anti_theft_immobilizer)? 'Yes' : 'No' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Steering Mounted Controls</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ ($used_vehicle->vehicle->steering_mounted_controls)? 'Yes' : 'No' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Rear Parking Sensors</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ ($used_vehicle->vehicle->rear_parking_sensors)? 'Yes' : 'No' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Rear Wash Wiper</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ ($used_vehicle->vehicle->rear_wash_wiper)? 'Yes' : 'No' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Seat Upholstery</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ ($used_vehicle->vehicle->seat_upholstery)? 'Yes' : 'No' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Adjustable Steering</td>
                        @foreach($used_vehicles_compare as $used_vehicle)
                        <td>{{ ($used_vehicle->vehicle->adjustable_steering)? 'Yes' : 'No' }}</td>
                        @endforeach
                    </tr>
                </table>
                </div>
            </div>
        </div>
        @endif
    </div>


    @if(isset($related_vehicles))
    <div class="container-fluid" id="tourpackages-carousel">
        <div class="container title2" style="padding-top:50px"><h2>See Also</h2></div>
        <p align="center">Related Search Results</p>
        <div class="row" style="margin-top:36px">
            @foreach($related_vehicles as $rvehicle)
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 offer_home">
                <div class="thumbnail wow animated bounceIn">
                    @if(isset($rvehicle->featured_image))
                        <img src="{{asset('images/cache/medium/' . $rvehicle->featured_image)}}" class="img-thumbnail img-responsive" style="max-width: 265px;max-height: 225px;" />
                    @else
                        <img src="{{asset('/carmazic/img/car-clipart.jpg')}}" class="img-thumbnail img-responsive" style="max-width: 265px;max-height: 225px;" />
                    @endif
                    <div class="caption">
                        <a href="{{ route('car-details', $rvehicle->id) }}">{{ $rvehicle->model }}</a><br>
                        <a href="{{ route('car-details', $rvehicle->id) }}" class="btn btn-info btn-xs" role="button" style="margin:10px 0 10px 0">Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!-- End row -->
    </div><!-- End container -->
    @endif
@endsection