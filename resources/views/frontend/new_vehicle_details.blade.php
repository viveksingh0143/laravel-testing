@extends('layouts.frontend.frontend')

@section('header')
<style>
#vehicle-detail-slider .nav a small {
display:block;
}
#vehicle-detail-slider .nav {
background:#eee;
}
#vehicle-detail-slider .nav a {
border-radius:0px;
}
#vehicle-detail-slider .carousel-inner {
    height: 350px;
}
#vehicle-detail-slider img.img-responsive {
    max-height: 350px;
    max-width: 100%;
    margin-left: auto;
    margin-right: auto;
}
</style>
@stop

@section('content')
    <div class="container pagecontainer">
        <div class="hpadding50c">
            <div class="container-fluid">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 wow flipInX animated animated" data-wow-duration="2.0s" style="visibility: visible; -webkit-animation: flipInX 2.0s;">
                    <p class="size30 slim">New {{ $vehicle->brand->name }} {{ $vehicle->model }} {{ $vehicle->variant }}</p>
                    <p><span class="gray" style="font-size:16px">Rating</span>&nbsp;&nbsp; <span class="yellow"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><span><i class="fa fa-star-o"></i></span></p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow pulse animated" data-wow-duration="1.0s" style=" text-align:right;visibility: visible;-webkit-animation-duration: 1.0s; -moz-animation-duration: 1.0s; animation-duration: 1.0s;">
                    <span class="price"><i class="fa fa-inr"></i> {{ $vehicle->price }}/-</span><br>
                </div>
            </div>
            <p class="aboutarrow"></p>
        </div>

        <div class="line3"></div>
        <div class="container-fluid" style="margin-top:20px">
            <div class="row">
                @if(count($vehicle->pictures) > 0)
                <div class="col-sm-6">
                    <div id="vehicle-detail-slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($vehicle->pictures as $index => $picture)
                                <div class="item{{ ($index==0)? ' active':'' }}">
                                <img src="{{ asset('images/cache/large/' . $picture->path) }}" class="img-responsive" />
                            </div><!-- End Item -->
                            @endforeach
                        </div><!-- End Carousel Inner -->
                        <ul class="nav nav-pills nav-justified">
                            @foreach($vehicle->pictures as $index => $picture)
                                <li data-target="#vehicle-detail-slider" data-slide-to="{{ $index }}" {{ ($index==0)? 'class="active"':'' }}><a href="#"><img src="{{ asset('images/cache/small/' . $picture->path) }}" class="img-responsive" /></a></li>
                            @endforeach
                        </ul>
                    </div><!-- End Carousel -->
                </div>
                @endif
                <div class="col-sm-6 form_box">
                    <h4>GENERAL INFORMATION</h4>
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td class="vt1">Make</td>
                            <td>{{ $vehicle->bname }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Model</td>
                            <td>{{ $vehicle->model }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Variant</td>
                            <td>{{ $vehicle->variant }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Fuel Type</td>
                            <td>{{ $vehicle->fuel_type }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Transmission</td>
                            <td>{{ $vehicle->transmission_type }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Body</td>
                            <td>{{ $vehicle->body_type }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Drive</td>
                            <td>{{ $vehicle->drive_type }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left" style="border:none;"><span><i>Listed on {{ $vehicle->created_at->format('dS F Y') }}</i></span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="line4"></div>
        <div class="container-fluid">
            <div class="col-sm-4 col-xs-12">
                <div class="line2"></div>
                <h4>CALCULATE LOAN & EMI OF THIS CAR</h4>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                    {{ $vehicle->bname }} {{ $vehicle->model }} {{ $vehicle->variant }} ({{ $vehicle->fuel_type }}) - <span id="emiprincipal">{{ $vehicle->price }}</span> INR
                    </h3>
                  </div>
                  <div class="panel-body">
                    <div class="calculator-slider">
                        <div class="slider-header clearfix"><strong><span class="pull-left">1) Downpayment you can</span> <span class="pull-right" id="downpayment-value">{{ $vehicle->price/10 }}</span><span class="pull-right"> <i class="fa fa-inr"></i></span></strong></div>
                        <input id="downpaymentslider" type="text" data-slider-min="0" data-slider-max="{{ $vehicle->price }}" data-slider-step="5000" data-slider-value="{{ $vehicle->price/10 }}" />
                        <div class="slider-footer clearfix">
                            <ul class="slider-marker downpayment-marker">
                                <li class="slider-text-marker first-slider-text-marker"><span class="marker-text">0</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">{{ round(($vehicle->price / 500000), 2) }} Lac</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">{{ round((($vehicle->price / 500000) * 2), 2) }} Lac</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">{{ round((($vehicle->price / 500000) * 3), 2) }} Lac</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">{{ round((($vehicle->price / 500000) * 4), 2) }} Lac</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker last-slider-text-marker"><span class="marker-text">{{ round($vehicle->price / 100000, 2) }} Lac</span></li>
                            </ul>
                        </div>
                    </div>
                    <br /><br />
                    <div class="calculator-slider">
                        <div class="slider-header clearfix"><strong><span class="pull-left">2) Bank Interest Rate</span> <span class="pull-right">%</span> <span class="pull-right" id="bankinterest-value">12.5</span></strong></div>
                        <input id="bankinterestslider" type="text" data-slider-min="8" data-slider-max="24" data-slider-step=".5" data-slider-value="12.5" />
                        <div class="slider-footer clearfix">
                            <ul class="slider-marker interest-marker">
                                <li class="slider-text-marker first-slider-text-marker"><span class="marker-text">8</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">9</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">10</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">11</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">12</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">13</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">14</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">15</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">16</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">17</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">18</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">19</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">20</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">21</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">22</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">23</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker last-slider-text-marker"><span class="marker-text">24</span></li>
                            </ul>
                        </div>
                    </div>
                    <br /><br />
                    <div class="calculator-slider">
                        <div class="slider-header clearfix"><strong><span class="pull-left">3) Loan Period</span> <span class="pull-right">Months</span> <span class="pull-right" id="loanperiod-value">36</span></strong></div>
                        <input id="loanperiodslider" type="text" data-slider-min="12" data-slider-max="84" data-slider-step="1" data-slider-value="36" />
                        <div class="slider-footer clearfix">
                            <ul class="slider-marker loanperiod-marker">
                                <li class="slider-text-marker first-slider-text-marker"><span class="marker-text">12</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">24</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">36</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">48</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">60</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">72</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker last-slider-text-marker"><span class="marker-text">84</span></li>
                            </ul>
                        </div>
                    </div>
                    <br /><br />
                    <div class="clearfix">
                        <div class="emipermonth">
                            <div class="emipermonthtext">EMI <i class="fa fa-caret-right direction"></i> <span>per/month</span></div>
                            <div class="emiamount">
                                <i class="fa fa-inr"></i><span id="emivalue">0</span>
                            </div>
                            <div class="eminote">Calculated on Ex-showroom Price</div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12 wow pulse animated" data-wow-duration="1.0s" style="visibility: visible;-webkit-animation-duration: 1.0s; -moz-animation-duration: 1.0s; animation-duration: 1.0s;">
                <div class="line2"></div>
                <h4>GET THE BEST DEAL OF THIS CAR</h4>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ $vehicle->bname }} {{ $vehicle->model }} {{ $vehicle->variant }} ({{ $vehicle->fuel_type }}) - Best Deal
                        </h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'contact-us-best-deal', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                        {!! Form::hidden('type', 'Guest Query') !!}
                        {!! Form::hidden('subject', 'Best deal offer new vehicle') !!}
                        <div class="form-group">
                            {!! Form::label('Name', 'Your Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('Name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter your name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('E-Mail', 'Your E-Mail:', ['class' => 'control-label']) !!}
                            <div class="input-group">
                                {!! Form::text('E-Mail', null, ['class' => 'form-control', 'pattern' => "[^@]+@[^@]+\.[a-zA-Z]{2,6}", 'required' => 'required', 'placeholder' => 'Your E-Mail', 'aria-describedby' => 'basic-addon1']) !!}
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('Contact Number', 'Your Contact Number:', ['class' => 'control-label']) !!}
                            <div class="input-group">
                                {!! Form::text('Contact Number', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Your Contact Number', 'aria-describedby' => 'basic-addon1']) !!}
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Optional Information</label>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('Finance Required') !!} Finance Required
                                </label>
                            </div>
                        </div>
                        <button type="submit button" data-wow-duration="0.3s" data-wow-delay="0.2s" class="btn btn-primary feature-block grayMedium wow flip animated">Send Massage</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="line2"></div>
                <h4>FUEL COST PER MONTH OF THIS CAR</h4>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">{{ $vehicle->bname }} {{ $vehicle->model }} {{ $vehicle->variant }} ({{ $vehicle->fuel_type }}) - {{ $vehicle->price }} INR</h3>
                  </div>
                  <div class="panel-body">
                    <div>ENTER TOTAL DISTANCE DRIVEN PER DAY</div><br />
                    <div class="input-group">
                      <input id="runningcosttext" type="text" class="form-control input-lg" placeholder="Kilometer driven per day" aria-describedby="Kilometer driven per day" value="20" />
                      <span class="input-group-addon" id="basic-addon2">Kilometers</span>
                    </div>
                    <div class="input-group">
                      <input id="milagetext" type="text" class="form-control input-lg" placeholder="Milage" aria-describedby="Milage" value="10" />
                      <span class="input-group-addon" id="basic-addon2">Milage&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <div class="input-group">
                      <input id="fuelcosttext" type="text" class="form-control input-lg" placeholder="Fuel Cost" aria-describedby="Fuel Cost in INR" value="66.66" />
                      <span class="input-group-addon" id="basic-addon2">FUEL Cost</span>
                    </div>
                    <div class="runningcostamountcontainer">
                        <div class="runningcostamount">
                            RUNNING COST <span class="rcostperm"><i class="fa fa-inr"></i><span id="runningcostspan">0</span>*</span> per month
                        </div>
                        <div class="runningcostnote"><sup>*</sup>Includes only fuel cost on milage of 10km/L@66.33INR</div>
                    </div>
                  </div>
                </div>
                <div class="line2"></div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">{{ $vehicle->bname }} {{ $vehicle->model }} {{ $vehicle->variant }} ({{ $vehicle->fuel_type }}) Brochure</h3>
                  </div>
                  <div class="panel-body">
                    <div class="brochure">
                      @if(isset($vehicle->thumbnail))
                          <img src="{{asset('images/cache/medium/' . $vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 300px;" />
                      @elseif(isset($vehicle->thumbnail))
                          <img src="{{asset('images/cache/medium/' . $vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 300px;" />
                      @else
                          <img src="{{asset('/carmazic/img/car-clipart.jpg')}}" class="img-responsive" />
                      @endif
                      <div class="caption text-center">
                        <a class="btn btn-primary" href="{{asset('uploads/' . $vehicle->brochure)}}" target="_blank">Download Brochure</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="line4"></div>


        <div class="container-fluid">
            <div role="tabpanel" class="tabpanel_details">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Features &amp; Accessories</a></li>
                    <li role="presentation"><a href="#onroadprices" aria-controls="onroadprices" role="tab" data-toggle="tab">On Road Price</a></li>
                    <li role="presentation"><a href="#brochure" aria-controls="Brochure" role="tab" data-toggle="tab">Brochure</a></li>
                    <li role="presentation"><a href="#video" aria-controls="Videos" role="tab" data-toggle="tab">Video</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <table class="table table-bordered">
                            <tr>
                                <th>Transmission</th>
                                <td>{{ $vehicle->transmission_type }}</td>
                                <th>Body Type</th>
                                <td>{{ $vehicle->body_type }}</td>
                                <th>Fuel Type</th>
                                <td>{{ $vehicle->fuel_type }}</td>
                            </tr>
                            <tr>
                                <th>Seating Capacity</th>
                                <td>{{ $vehicle->seating_capacity }}</td>
                                <th>Engine Power</th>
                                <td>{{ $vehicle->engine_power }}</td>
                                <th>Power Windows</th>
                                <td>{{ ($vehicle->power_windows)? 'Yes' : 'No' }}</td>
                            </tr>
                            <tr>
                                <th>ABS</th>
                                <td>{{ ($vehicle->abs)? 'Yes' : 'No' }}</td>
                                <th>Rear Defogger</th>
                                <td>{{ ($vehicle->rear_defogger)? 'Yes' : 'No' }}</td>
                                <th>Inbuilt Music System</th>
                                <td>{{ ($vehicle->inbuilt_music_system)? 'Yes' : 'No' }}</td>
                            </tr>
                            <tr>
                                <th>Sunroof/Moonroof</th>
                                <td>{{ ($vehicle->sunroof_moonroof)? 'Yes' : 'No' }}</td>
                                <th>Anti Theft Immobilizer</th>
                                <td>{{ ($vehicle->anti_theft_immobilizer)? 'Yes' : 'No' }}</td>
                                <th>Steering Mounted Controls</th>
                                <td>{{ ($vehicle->steering_mounted_controls)? 'Yes' : 'No' }}</td>
                            </tr>
                            <tr>
                                <th>Rear Parking Sensors</th>
                                <td>{{ ($vehicle->rear_parking_sensors)? 'Yes' : 'No' }}</td>
                                <th>Rear Wash Wiper</th>
                                <td>{{ ($vehicle->rear_wash_wiper)? 'Yes' : 'No' }}</td>
                                <th>Seat Upholstery</th>
                                <td>{{ ($vehicle->seat_upholstery)? 'Yes' : 'No'  }}</td>
                            </tr>
                            <tr>
                                <th>Adjustable Steering</th>
                                <td>{{ ($vehicle->adjustable_steering)? 'Yes' : 'No' }}</td>
                                <th>Drive Type</th>
                                <td>{{ $vehicle->drive_type }}</td>
                                <th></th>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="onroadprices">
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
                                @foreach($vehicle->onRoadPrices as $key => $on_road_price)
                                    <tr>
                                        <td>{{ ($key + 1) }}</td>
                                        <td>{{ $vehicle->bname }} {{ $vehicle->model }} {{ $vehicle->variant }} {{ $on_road_price->type }}</td>
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
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="brochure">
                        @if(isset($vehicle) && isset($vehicle->brochure))
                            <iframe width="100%" height="1150px" src="{{asset('uploads/' . $vehicle->brochure)}}"></iframe>
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane" id="video">
                        @if(!empty($vehicle->video_script))
                        {!! $vehicle->video_script !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
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


@section('footer')
<script>
$(function() {
    $('#vehicle-detail-slider').carousel({
        interval:   4000
    });

    var clickEvent = false;
    $('#vehicle-detail-slider').on('click', '.nav a', function() {
        clickEvent = true;
        $('.nav li').removeClass('active');
        $(this).parent().addClass('active');
    }).on('slid.bs.carousel', function(e) {
        if(!clickEvent) {
            var count = $('.nav').children().length -1;
            var current = $('.nav li.active');
            current.removeClass('active').next().addClass('active');
            var id = parseInt(current.data('slide-to'));
            if(count == id) {
                $('.nav li').first().addClass('active');
            }
        }
        clickEvent = false;
    });

    $('#downpaymentslider').slider({
    	formatter: function(value) {
    	    calculateEMI();
    		return 'Current value: ' + value;
    	}
    });
    $('#bankinterestslider').slider({
        formatter: function(value) {
            calculateEMI();
            return 'Current rate: ' + value + '%';
        }
    });
    $('#loanperiodslider').slider({
        formatter: function(value) {
            calculateEMI();
            return 'Current periods: ' + value + ' months';
        }
    });
    //emivalue
    $("#downpaymentslider").on("slide", function(slideEvt) {
    	$("#downpayment-value").text(slideEvt.value);
    });
    $("#bankinterestslider").on("slide", function(slideEvt) {

    	$("#bankinterest-value").text(slideEvt.value);
    });
    $("#loanperiodslider").on("slide", function(slideEvt) {
        $("#loanperiod-value").text(slideEvt.value);
    });
    calculateEMI();
    function calculateEMI() {
        var emionamount = getFloat($('#emiprincipal').text());
        var downpayment = getFloat($('#downpaymentslider').slider('getValue'));
        var p = emionamount - downpayment;
        if(p < 0) {
            p = 0;
        }
        var r = (getFloat($('#bankinterestslider').slider('getValue'))/12)/100;
        var n = getFloat($('#loanperiodslider').slider('getValue'));
        $emi = Math.round(p * r * (Math.pow((1 + r), n)/(Math.pow((1 + r), n) - 1)));
        $('#emivalue').text($emi);
    }

    function getFloat(str) {
        if(str == undefined || str == '' || isNaN(str)) {
            return 0;
        } else {
            return parseFloat(str);
        }
    }
    function getInteger(str) {
        if(str == undefined || str == '' || isNaN(str)) {
            return 0;
        } else {
            return parseInt(str);
        }
    }
    $('#runningcosttext,#fuelcosttext,#milagetext').keyup(function() {
        putRunningCost();
    });
    function putRunningCost() {
        var fuelcost = getInteger($('#fuelcosttext').val());
        var milage = getInteger($('#milagetext').val());
        var kilometer = getInteger($('#runningcosttext').val());
        $('#runningcostspan').text(Math.round(((kilometer * 30) / milage) * fuelcost));
    }
    putRunningCost();
});
</script>
@stop