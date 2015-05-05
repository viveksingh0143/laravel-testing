@extends('layouts.frontend.frontend')

@section('content')
    @if(isset($ad_banner))
        <img class="img-responsive" src="{{ asset('uploads/' . $ad_banner) }}" style="margin-top:70px; width: 100%;" />
    @endif
    <div class="container pagecontainer">
        <div class="hpadding50c">
            <div class="container-fluid">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 wow flipInX animated animated" data-wow-duration="2.0s" style="visibility: visible; -webkit-animation: flipInX 2.0s;">
                    <p class="size30 slim">Used {{ $used_vehicle->model_year }} {{ $used_vehicle->vehicle->bname }} {{ $used_vehicle->vehicle->model }} {{ $used_vehicle->vehicle->variant }}</p>
                    <p><span class="gray" style="font-size:16px">Rating</span>&nbsp;&nbsp; <span class="yellow"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><span><i class="fa fa-star-o"></i></span></p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow pulse animated" data-wow-duration="1.0s" style=" text-align:right;visibility: visible;-webkit-animation-duration: 1.0s; -moz-animation-duration: 1.0s; animation-duration: 1.0s;">
                    <span class="price"><i class="fa fa-inr"></i> {{ $used_vehicle->price }}/-</span><br>
                </div>
            </div>
            <p class="aboutarrow"></p>
        </div>

        <div class="line3"></div>
        <div class="container-fluid" style="margin-top:20px">
            <div class="row">
                @if(isset($pictures) && count($pictures) > 0)
                <div class="col-sm-6">
                    <div id="vehicle-detail-slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($pictures as $index => $picture)
                                <div class="item{{ ($index==0)? ' active':'' }}">
                                    <img src="{{ asset('images/cache/large/' . $picture->path) }}" class="img-responsive" />
                                </div><!-- End Item -->
                            @endforeach
                        </div><!-- End Carousel Inner -->
                        <ul class="nav nav-pills nav-justified">
                            @foreach($pictures as $index => $picture)
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
                            <td class="vt1">Fuel Type</td>
                            <td>{{ empty($used_vehicle->fuel_type)? $used_vehicle->vehicle->fuel_type: $used_vehicle->fuel_type }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Kilometers Driven</td>
                            <td>{{ $used_vehicle->kilometers }} KM</td>
                        </tr>
                        <tr>
                            <td class="vt1">Transmission</td>
                            <td>{{ empty($used_vehicle->transmission_type)? $used_vehicle->vehicle->transmission_type : $used_vehicle->transmission_type }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Body</td>
                            <td>{{ $used_vehicle->vehicle->body_type }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Drive</td>
                            <td>{{ $used_vehicle->vehicle->drive_type }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Colour</td>
                            <td>{{ $used_vehicle->colour }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Number of owners</td>
                            <td>{{ owner_number_to_words($used_vehicle->number_of_owners) }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Registered At</td>
                            <td>{{ $used_vehicle->registered_at }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Insurance</td>
                            <td>{{ $used_vehicle->insurance? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td class="vt1">Manufacturing Year</td>
                            <td>{{ $used_vehicle->model_year }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left" style="border:none;"><span><i>Listed on {{ $used_vehicle->created_at->format('dS F Y') }}</i></span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="line2"></div>
                    <h4>Seller Message</h4>
                    <p align="justify">Overall health of the car is very good and it is well maintained {{ ($used_vehicle->number_of_owners)? 'and ' . strtolower(owner_number_to_words($used_vehicle->number_of_owners)) . ' car' : '' }}.It has {{ strtolower($used_vehicle->vehicle->transmission_type) }} transmission. Colour of car is {{ strtolower($used_vehicle->colour) }}. Car is available for sale in {{ $used_vehicle->city }} at {{ $used_vehicle->location }}.</p>
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
                    {{ $used_vehicle->vehicle->bname }} {{ $used_vehicle->vehicle->model }} {{ $used_vehicle->vehicle->variant }} ({{ $used_vehicle->fuel_type }}) - <span id="emiprincipal">{{ $used_vehicle->price }}</span> INR
                    </h3>
                  </div>
                  <div class="panel-body">
                    <div class="calculator-slider">
                        <div class="slider-header clearfix"><strong><span class="pull-left">1) Downpayment you can</span> <span class="pull-right" id="downpayment-value">{{ $used_vehicle->price/10 }}</span><span class="pull-right"> <i class="fa fa-inr"></i></span></strong></div>
                        <input id="downpaymentslider" type="text" data-slider-min="0" data-slider-max="{{ $used_vehicle->price }}" data-slider-step="5000" data-slider-value="{{ $used_vehicle->price/10 }}" />
                        <div class="slider-footer clearfix">
                            <ul class="slider-marker downpayment-marker">
                                <li class="slider-text-marker first-slider-text-marker"><span class="marker-text">0</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">{{ round(($used_vehicle->price / 500000), 2) }} Lac</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">{{ round((($used_vehicle->price / 500000) * 2), 2) }} Lac</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">{{ round((($used_vehicle->price / 500000) * 3), 2) }} Lac</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker"><span class="marker-text">{{ round((($used_vehicle->price / 500000) * 4), 2) }} Lac</span><span class="half-mark"></span></li>
                                <li class="slider-text-marker last-slider-text-marker"><span class="marker-text">{{ round($used_vehicle->price / 100000, 2) }} Lac</span></li>
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
            <div class="col-sm-4 col-xs-12">
                <div class="line2"></div>
                <h4>FUEL COST PER MONTH OF THIS CAR</h4>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">{{ $used_vehicle->vehicle->bname }} {{ $used_vehicle->vehicle->model }} {{ $used_vehicle->vehicle->variant }} ({{ $used_vehicle->fuel_type }}) - {{ $used_vehicle->price }} INR</h3>
                  </div>
                  <div class="panel-body">
                    <div>ENTER TOTAL DISTANCE DRIVEN PER DAY</div><br />
                    <div class="input-group">
                      <input id="runningcosttext" type="text" class="form-control input-lg" placeholder="Kilometer driven per day" aria-describedby="Kilometer driven per day" value="20" />
                      <span class="input-group-addon" id="basic-addon2">Kilometers</span>
                    </div>
                    <div class="runningcostamountcontainer">
                        <div class="runningcostamount">
                            RUNNING COST <span class="rcostperm"><i class="fa fa-inr"></i><span id="runningcostspan">0</span>*</span> per month
                        </div>
                        <div class="runningcostnote"><sup>*</sup>Includes only fuel cost</div>
                    </div>
                  </div>
                </div>
                <div class="line2"></div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">{{ $used_vehicle->vehicle->bname }} {{ $used_vehicle->vehicle->model }} {{ $used_vehicle->vehicle->variant }} ({{ $used_vehicle->fuel_type }}) Brochure</h3>
                  </div>
                  <div class="panel-body">
                    <div class="brochure">
                      @if(isset($used_vehicle->thumbnail))
                          <img src="{{asset('images/cache/medium/' . $used_vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 300px;" />
                      @elseif(isset($used_vehicle->vehicle->thumbnail))
                          <img src="{{asset('images/cache/medium/' . $used_vehicle->vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 300px;" />
                      @else
                          <img src="{{asset('/carmazic/img/car-clipart.jpg')}}" class="img-responsive" />
                      @endif
                      <div class="caption text-center">
                        <a class="btn btn-primary" href="{{asset('uploads/' . $used_vehicle->vehicle->brochure)}}" target="_blank">Download Brochure</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12 wow pulse animated" data-wow-duration="1.0s" style="visibility: visible;-webkit-animation-duration: 1.0s; -moz-animation-duration: 1.0s; animation-duration: 1.0s;">
                <div class="line2"></div>
                @if(Auth::guest())
                    <h4>GET THE BEST DEAL OF THIS CAR</h4>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                {{ $used_vehicle->vehicle->bname }} {{ $used_vehicle->vehicle->model }} {{ $used_vehicle->vehicle->variant }} ({{ $used_vehicle->fuel_type }}) - Best Deal
                            </h3>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['url' => '/contact-us/get-the-best-deal', 'method' => 'get', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                            {!! Form::hidden('dealer_enquiry', 'User Contact to ' . $used_vehicle->dealer->name) !!}
                            <div class="form-group">
                                {!! Form::label('your_name', 'Your Name:', ['class' => 'control-label']) !!}
                                {!! Form::text('your_name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter your name']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('your_email', 'Your E-Mail:', ['class' => 'control-label']) !!}
                                <div class="input-group">
                                    {!! Form::text('your_email', null, ['class' => 'form-control', 'pattern' => "[^@]+@[^@]+\.[a-zA-Z]{2,6}", 'required' => 'required', 'placeholder' => 'Your E-Mail', 'aria-describedby' => 'basic-addon1']) !!}
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('your_contact_number', 'Your Contact Number:', ['class' => 'control-label']) !!}
                                <div class="input-group">
                                    {!! Form::text('your_contact_number', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Your Contact Number', 'aria-describedby' => 'basic-addon1']) !!}
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Optional Information</label>
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('finance_required', 'Required') !!} Finance Required
                                    </label>
                                </div>
                            </div>
                            <button type="submit button" data-wow-duration="0.3s" data-wow-delay="0.2s" class="btn btn-primary feature-block grayMedium wow flip animated">Send Massage</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                @else
                    <h4>GET THE BEST DEAL OF THIS CAR</h4>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                {{ $used_vehicle->vehicle->bname }} {{ $used_vehicle->vehicle->model }} {{ $used_vehicle->vehicle->variant }} ({{ $used_vehicle->fuel_type }}) - Dealer Information
                            </h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td class="vt1">Company Name</td>
                                    <td>{{ $used_vehicle->dealer->name }}</td>
                                </tr>
                                <tr>
                                    <td class="vt1">Contact Person</td>
                                    <td>{{ $used_vehicle->dealer->contact_person }}</td>
                                </tr>
                                <tr>
                                    <td class="vt1">Mobile Number</td>
                                    <td>{{ $used_vehicle->dealer->mobile_number }}</td>
                                </tr>
                                <tr>
                                    <td class="vt1">Office Number</td>
                                    <td>{{ $used_vehicle->dealer->office_number }}</td>
                                </tr>
                                <tr>
                                    <td class="vt1">Email</td>
                                    <td>{{ $used_vehicle->dealer->email }}</td>
                                </tr>
                                <tr>
                                    <td class="vt1">Address</td>
                                    <td>{{ $used_vehicle->dealer->address }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
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
                                <th>Model Year</th>
                                <td>{{ $used_vehicle->model_year }}</td>
                                <th>Kilometers</th>
                                <td>{{ $used_vehicle->kilometers }}</td>
                                <th>Drive Type</th>
                                <td>{{ $used_vehicle->vehicle->drive_type }}</td>
                            </tr>
                            <tr>
                                <th>Seating Capacity</th>
                                <td>{{ $used_vehicle->vehicle->seating_capacity }}</td>
                                <th>Engine Power</th>
                                <td>{{ $used_vehicle->vehicle->engine_power }}</td>
                                <th>Body Type</th>
                                <td>{{ $used_vehicle->vehicle->body_type }}</td>
                            </tr>
                            <tr>
                                <th>ABS</th>
                                <td>{{ ($used_vehicle->vehicle->abs)? 'Yes' : 'No' }}</td>
                                <th>Power Windows</th>
                                <td>{{ ($used_vehicle->vehicle->power_windows)? 'Yes' : 'No' }}</td>
                                <th>Inbuilt Music System</th>
                                <td>{{ ($used_vehicle->vehicle->inbuilt_music_system)? 'Yes' : 'No' }}</td>
                            </tr>
                            <tr>
                                <th>Sunroof/Moonroof</th>
                                <td>{{ ($used_vehicle->vehicle->sunroof_moonroof)? 'Yes' : 'No' }}</td>
                                <th>Anti Theft Immobilizer</th>
                                <td>{{ ($used_vehicle->vehicle->anti_theft_immobilizer)? 'Yes' : 'No' }}</td>
                                <th>Steering Mounted Controls</th>
                                <td>{{ ($used_vehicle->vehicle->steering_mounted_controls)? 'Yes' : 'No' }}</td>
                            </tr>
                            <tr>
                                <th>Rear Parking Sensors</th>
                                <td>{{ ($used_vehicle->vehicle->rear_parking_sensors)? 'Yes' : 'No' }}</td>
                                <th>Rear Wash Wiper</th>
                                <td>{{ ($used_vehicle->vehicle->rear_wash_wiper)? 'Yes' : 'No' }}</td>
                                <th>Seat Upholstery</th>
                                <td>{{ ($used_vehicle->vehicle->seat_upholstery)? 'Yes' : 'No'  }}</td>
                            </tr>
                            <tr>
                                <th>Adjustable Steering</th>
                                <td>{{ ($used_vehicle->vehicle->adjustable_steering)? 'Yes' : 'No' }}</td>
                                <th>Rear Defogger</th>
                                <td>{{ ($used_vehicle->vehicle->rear_defogger)? 'Yes' : 'No' }}</td>
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
                                @foreach($used_vehicle->vehicle->onRoadPrices as $key => $on_road_price)
                                    <tr>
                                        <td>{{ ($key + 1) }}</td>
                                        <td>{{ $on_road_price->vehicle->bname }} {{ $on_road_price->vehicle->model }} {{ $on_road_price->vehicle->variant }} {{ $on_road_price->type }}</td>
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
                        @if(isset($used_vehicle->vehicle) && isset($used_vehicle->vehicle->brochure))
                            <iframe width="100%" height="1150px" src="{{asset('uploads/' . $used_vehicle->vehicle->brochure)}}"></iframe>
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane" id="video">
                        @if(!empty($used_vehicle->vehicle->video_script))
                        {!! $used_vehicle->vehicle->video_script !!}
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
    $('#runningcosttext').keyup(function() {
        putRunningCost();
    });
    function putRunningCost() {
        var kilometer = getInteger($('#runningcosttext').val());
        $('#runningcostspan').text(Math.round(((kilometer * 30) / 10) * 66.33));
    }
    putRunningCost();
});
</script>
@stop