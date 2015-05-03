@extends('layouts.frontend.frontend')

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/select2/select2.min.css') }}" />
@endsection

@section('row_above_content')
    @include('layouts.frontend.partials.slider')
	@include('layouts.frontend.partials.help_in_selecting_car')
	@include('frontend.partials.searchcars')
    @include('frontend.partials.latestcars')
@stop

@section('content')
    <div class="container-fluid slider_comaer">
        <div class="container">
            <div class="col-sm-8">
                <div class="container-fluid">

                    <div class="row" style="border: 2px solid #CCCCCC">
                        <!-- The carousel -->
                        <div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#transition-timer-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#transition-timer-carousel" data-slide-to="1"></li>
                                <li data-target="#transition-timer-carousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{ asset('/carmazic/img/ads/Carmazic-Banner-Finance-1.jpg') }}" />
                                </div>
                                <div class="item">
                                    <img src="{{ asset('/carmazic/img/ads/Carmazic-Banner-2.jpg') }}" />
                                </div>

                                <div class="item">
                                    <img src="{{ asset('/carmazic/img/ads/Car-Finance.jpg') }}" />
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>

                            <!-- Timer "progress bar" -->
                            <hr class="transition-timer-carousel-progress-bar animate" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="box-style1">
                    <h4>Calculate your insurance EMI</h4>
                    <div class="line2"></div>
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
        </div>
    </div>

    <div class="container-fluid pack_type">
        <div class="container">
            <div class="title_white"><h2>Package Type</h2></div>
            <p align="center" style="color:#FFFFFF">Select your subtable Package</p>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 pack_type_inner">
                <a href="{{ route('new-vehicle-search') }}">
                    <div class="icon_pack wow flip animated" data-wow-duration="0.3s" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-duration: 0.3s; -moz-animation-duration: 0.3s; animation-duration: 0.3s;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                        <i class="fa fa-car"></i>
                    </div>
                    <h3>New Cars</h3>
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 pack_type_inner">
                <a href="{{ route('used-vehicle-search') }}">
                    <div class="icon_pack wow flip animated" data-wow-duration="0.3s" data-wow-delay="0.3s" style="visibility: visible;-webkit-animation-duration: 0.3s; -moz-animation-duration: 0.3s; animation-duration: 0.3s;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        <i class="fa fa-users"></i>
                    </div>
                    <h3>Used Cars</h3>
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 pack_type_inner">
                <a href="#">
                    <div class="icon_pack wow flip animated" data-wow-duration="0.3s" data-wow-delay="0.4s" style="visibility: visible;-webkit-animation-duration: 0.3s; -moz-animation-duration: 0.3s; animation-duration: 0.3s;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                        <i class="fa fa-globe"></i>
                    </div>
                    <h3>On-Road Price</h3>
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 pack_type_inner">
                <a href="{{ route('brand-list') }}">
                    <div class="icon_pack wow flip animated" data-wow-duration="0.3s" data-wow-delay="0.5s" style="visibility: visible;-webkit-animation-duration: 0.3s; -moz-animation-duration: 0.3s; animation-duration: 0.3s;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
                        <i class="fa fa-glass"></i>
                    </div>
                    <h3>Brands List</h3>
                </a>
            </div><!--
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 pack_type_inner">
                <a href="#">
                    <div class="icon_pack wow flip animated" data-wow-duration="0.3s" data-wow-delay="0.6s" style="visibility: visible;-webkit-animation-duration: 0.3s; -moz-animation-duration: 0.3s; animation-duration: 0.3s;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
                        <i class="fa fa-taxi"></i>
                    </div>
                    <h3>Commercial Vehicle</h3>
                </a>
            </div>-->
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 pack_type_inner">
                <a href="#">
                    <div class="icon_pack wow flip animated" data-wow-duration="0.3s" data-wow-delay="0.7s" style="visibility: visible;-webkit-animation-duration: 0.3s; -moz-animation-duration: 0.3s; animation-duration: 0.3s;-webkit-animation-delay: 0.7s; -moz-animation-delay: 0.7s; animation-delay: 0.7s;">
                        <i class="fa fa-line-chart"></i>
                    </div>
                    <h3>Insurance & Finance</h3>
                </a>
            </div>
        </div>
    </div>

    @if(isset($blogPosts))
    <div class="container-fluid">
        <div class="container title2" style="padding-top:50px"><h2>LATEST BLOGS</h2></div>
        <p align="center" style="padding-bottom:33px">View our latest updates...</p>
        <div class="owl_slider" id="owl-demo">
            @foreach($blogPosts as $blog)
            <div class="item padding_left_right"><img class="img-responsive" src="{{ asset('images/cache/medium/' . $blog->thumbnail) }}" alt="Owl Image"> <a href="{{ route('frontend.posts.show', $blog->slug) }}"><h5> {{ $blog->title }}</h5></a></div>
            @endforeach
        </div>

    </div>
    @endif
@endsection


@section('footer')
    <script type="text/javascript" src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
    <script>
        $("select.model_year").select2({placeholder: "Search Year",allowClear: true});
	$("select.slider-brand-remote,select.brand-search,select.brand-search1").select2({placeholder: "Select Brand",allowClear: true});
        $("select.slider-model-remote,select.model-search,select.model-search1").select2({placeholder: "Select model",allowClear: true});
        $("select.slider-variant-remote,select.variant-search,select.variant-search1").select2({placeholder: "Select variant",allowClear: true});
        $("select.colour-search").select2({placeholder: "Select colour",allowClear: true});
        $("select.state-search").select2({placeholder: "Select state",allowClear: true});
        $("select.city-search").select2({placeholder: "Select city",allowClear: true});
        $("select.location-search").select2({placeholder: "Select city",allowClear: true});
        $("select.fuel-search").select2({placeholder: "Select Fuel",allowClear: true});
        $("select.transmission-search").select2({placeholder: "Select Transmission",allowClear: true});

        $("select.slider-brand-remote,select.brand-search,select.brand-search1").on("change", function(e) {
            var brand = $(this).val();
            $target = null;
            $target1 = null;
            if($(this).hasClass("brand-search")) {
                $target = $('select.model-search');
                $target1 = $('select.variant-search');
            } else if($(this).hasClass("brand-search1")) {
                $target = $('select.model-search1');
                $target1 = $('select.variant-search1');
            } else {
                $target = $('select.slider-model-remote');
                $target1 = $('select.slider-variant-remote');
            }
            $.ajax({
                type: "GET",
                url:  "/api/models",
                dataType: 'json',
                data: {brand:brand},
                success: function(data) {
                    $target1.find('option').remove();
                    $target.find('option').remove();
                    $target.append($("<option></option>"));
                    $.each(data, function(key, value) {
                         $target.append($("<option></option>").attr("value",key).text(value));
                    });
                    $target.select2({placeholder: "Select model",allowClear: true});
                },
                error: function() {
                    alert("Timeout Error");
                }
            });
        });

        $("select.slider-model-remote,select.model-search,select.model-search1").on("change", function(e) {
            var brand = null;
            var model = $(this).val();
            $target = null;
            if($(this).hasClass("model-search")) {
                brand = $("select.brand-search").val();
                $target = $('select.variant-search');
            } else if($(this).hasClass("model-search1")) {
                brand = $("select.brand-search1").val();
                $target = $('select.variant-search1');
            } else {
                brand = $('select.slider-brand-remote').val();
                $target = $('select.slider-variant-remote');
            }
            $.ajax({
                type: "GET",
                url:  "/api/variants",
                dataType: 'json',
                data: {brand:brand,model:model},
                success: function(data) {
                    $target.find('option').remove();
                    $target.append($("<option></option>"));
                    $.each(data, function(key, value) {
                         $target.append($("<option></option>").attr("value",key).text(value));
                    });
                    $target.select2({placeholder: "Select variant",allowClear: true});
                },
                error: function() {
                    alert("Timeout Error");
                }
            });
        });


        $("select.state-search").on("change", function(e) {
            var state = $(this).val();
            $target = $('select.city-search');
            $target1 = $('select.location-search');
            $.ajax({
                type: "GET",
                url:  "/api/cities",
                dataType: 'json',
                data: {state:state},
                success: function(data) {
                    $target1.find('option').remove();
                    $target.find('option').remove();
                    $target.append($("<option></option>"));
                    $.each(data, function(key, value) {
                         $target.append($("<option></option>").attr("value",key).text(value));
                    });
                    $target.select2({placeholder: "Select city",allowClear: true});
                },
                error: function() {
                    alert("Timeout Error");
                }
            });
        });

        $("select.city-search").on("change", function(e) {
            var state = $("select.state-search").val();
            var city = $(this).val();
            $target = $('select.location-search');
            $.ajax({
                type: "GET",
                url:  "/api/locations",
                dataType: 'json',
                data: {state:state,location:location},
                success: function(data) {
                    $target.find('option').remove();
                    $target.append($("<option></option>"));
                    $.each(data, function(key, value) {
                         $target.append($("<option></option>").attr("value",key).text(value));
                    });
                    $target.select2({placeholder: "Select location",allowClear: true});
                },
                error: function() {
                    alert("Timeout Error");
                }
            });
        });
    </script>
@endsection