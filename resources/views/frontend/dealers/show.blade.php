<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dealer Details</title>
    <!-- Bootstrap -->
    <link href="{{ asset('/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
    <link href="{{ asset('/plugins/font-awesome/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/carmazic/css/dealer.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @include('layouts.analytics')
</head>
<body style="padding-top: 50px;">
<!--------------------------------------------------------------------------------------------------->
<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner" id="home">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
           @if(!empty($dealer->logo))
               <img class="pull-left" style="max-height: 50px;" src="{{ asset('images/cache/small/' . $dealer->logo) }}" class="img-responsive" />
           @else
               <img class="pull-left" style="max-height: 50px;" src="{{ asset('/carmazic/img/logo/carmazic-logo.png') }}" class="img-responsive" />
           @endif



            <ul class="nav navbar-nav">
                <li>
                    <a href="#home"><i class="fa fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="#about-us"><i class="fa fa-group"></i> About Us</a>
                </li>
                <li>
                    <a href="#latest-vehicles"><i class="fa fa-car"></i> Latest Vehicles</a>
                </li>
                <li>
                    <a href="#contact-us"><i class="fa fa-envelope-o"></i> Contact Us</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<!-------------------------------------------------------------------------------------------------->
@if($dealer->pictures && count($dealer->pictures) > 0)
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($dealer->pictures as $key => $picture)
        <li data-target="#carousel-example-generic" data-slide-to="{{ $key }}" {{($key==0)? 'class="active"' : ''}}></li>
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach($dealer->pictures as $key => $picture)
        <div class="item {{($key==0)? 'active' : ''}}">
            <img src="{{ asset('uploads/' . $picture->path) }}" style="width:100%;" />
        </div>
        @endforeach
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@endif

@if(isset($dealer) && (!empty($dealer->geoloc) || !empty($dealer->geoloc)))
<div class="container-fluid about_feture" id="about-us">
    <div class="container">
        <div class="title_text">
            <h1 class="title">About Us</h1>
            <div class="topaz-line opacity-zero show animated fadeIn" data-animate="fadeIn" data-delay="0">
                <i class="fa fa-car"></i>
            </div>
            Short details about us
        </div>
        @if(!empty($dealer->about_us))
        <div class="col-sm-7 about_content">
            <p class="gray"><i class="fa fa-quote-left fa-2x pull-left fa-border"></i> {{ $dealer->about_us }}</p>
        </div>
        @endif
        <div class="col-sm-{{ (!empty($dealer->about_us))? '5' : '12' }}">
            @if(isset($dealer) && !empty($dealer->geoloc))
                <iframe
                  width="100%"
                  height="450"
                  frameborder="0" style="border:0"
                  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBG5DSTQ6pK8-O8I6VBGEbBGJ2g6iWiqZA&q={{ $dealer->geoloc }}">
                </iframe>
            @endif
        </div>
    </div>
</div>
@endif

<section class="latest_vhecle" id="latest-vehicles">
    <div class="container">
        <div class="title_text">
            <h1 class="title">Latest Vehicles</h1>
            <div class="topaz-line opacity-zero show animated fadeIn" data-animate="fadeIn" data-delay="0">
                <i class="fa fa-car"></i>
            </div>
            <p>Latest vehicles list at our shop.</p>
        </div>
    </div>
    <div class="container">
        @foreach($dealer->usedVehicles as $latest_vehicle)
        <div class="col-md-4 col-sm-4">
            <div class="property">
                <a href="property-detail.html">
                    <div class="property-image">
                        @if(!empty($latest_vehicle->thumbnail))
                            <img src="{{asset('images/cache/medium/' . $latest_vehicle->thumbnail)}}" class="img-thumbnail img-responsive" />
                        @elseif(!empty($latest_vehicle->vehicle->thumbnail))
                        @else
                            <img src="{{asset('/carmazic/img/car-clipart.jpg')}}" class="img-thumbnail img-responsive" />
                        @endif
                    </div>
                    <div class="overlay-2">
                        <div class="info">
                            <div class="tag price"><i class="fa fa-inr"></i> {{ $latest_vehicle->price }}</div>
                            <h3>{{ $latest_vehicle->vehicle->bname }} {{ $latest_vehicle->vehicle->model }} {{ $latest_vehicle->vehicle->variant }}</h3>
                            <figure>{{ $latest_vehicle->color }}</figure>
                        </div>
                        <ul class="additional-info">
                            <li>
                                <header><i class="fa fa-road"></i></header>
                                <figure>{{ $latest_vehicle->kilometers }} KM</figure>
                            </li>
                            <li>
                                <header><i class="fa fa-car"></i></header>
                                <figure>{{ $latest_vehicle->model_year }} Model</figure>
                            </li>
                            <li>
                                <header><i class="fa fa-filter"></i></header>
                                <figure>{{ $latest_vehicle->fuel_type }}</figure>
                            </li>
                            <li>
                                <header><i class="fa fa-tachometer"></i></header>
                                <figure>{{ $latest_vehicle->transmission_type }}</figure>
                            </li>
                        </ul>
                    </div>
                </a>
            </div><!-- /.property -->
        </div>
        @endforeach
    </div>
</section>


<section class="why_us">
    <div class="title_text">
        <h1 class="title">Why Choose Us</h1>
        <div class="topaz-line opacity-zero show animated fadeIn" data-animate="fadeIn" data-delay="0">
            <i class="fa fa-car"></i>
        </div>
        <p>Get the best deal from us.</p>
    </div>
    <div class="container">
        <div class="col-sm-4">
            <div class="icon-box-1">
                <span><i class="fa fa-money"></i></span>
                <div class="icon-box-content">
                    <h4><a href="single-service.html">FIXED RATES</a></h4>
                    <p>Lorem ipsum dolor sit, omis unde duis elit. Lactus nibh lorem, malesuada rutrum moris in, commodo a elit.
                        Nulla ornare proin porta velit non quam faucibus dolor.</p>
                </div><!-- end .icon-box-content -->
            </div>
        </div>
        <div class="col-sm-4">
            <div class="icon-box-1">
                <span><i class="fa fa-line-chart"></i></span>
                <div class="icon-box-content">
                    <h4><a href="single-service.html">RELIABLE TRANSFERS</a></h4>
                    <p>Lorem ipsum dolor sit, omis unde duis elit. Lactus nibh lorem, malesuada rutrum moris in, commodo a elit.
                        Nulla ornare proin porta velit non quam faucibus dolor.</p>
                </div><!-- end .icon-box-content -->
            </div>
        </div>
        <div class="col-sm-4">
            <div class="icon-box-1">
                <span><i class="fa fa-child"></i></span>
                <div class="icon-box-content">
                    <h4><a href="single-service.html">NO BOOKING FEES</a></h4>
                    <p>Lorem ipsum dolor sit, omis unde duis elit. Lactus nibh lorem, malesuada rutrum moris in, commodo a elit.
                        Nulla ornare proin porta velit non quam faucibus dolor.</p>
                </div><!-- end .icon-box-content -->
            </div>
        </div>
        <div class="col-sm-4">
            <div class="icon-box-1">
                <span><i class="fa fa-exclamation-circle"></i></span>
                <div class="icon-box-content">
                    <h4><a href="single-service.html">FREE CANCELLATION</a></h4>
                    <p>Lorem ipsum dolor sit, omis unde duis elit. Lactus nibh lorem, malesuada rutrum moris in, commodo a elit.
                        Nulla ornare proin porta velit non quam faucibus dolor.</p>
                </div><!-- end .icon-box-content -->
            </div>
        </div>
        <div class="col-sm-4">
            <div class="icon-box-1">
                <span><i class="fa fa-coffee"></i></span>
                <div class="icon-box-content">
                    <h4><a href="single-service.html">BOOKING FLEXIBILITY</a></h4>
                    <p>Lorem ipsum dolor sit, omis unde duis elit. Lactus nibh lorem, malesuada rutrum moris in, commodo a elit.
                        Nulla ornare proin porta velit non quam faucibus dolor.</p>
                </div><!-- end .icon-box-content -->
            </div>
        </div>
        <div class="col-sm-4">
            <div class="icon-box-1">
                <span><i class="fa fa-gift"></i></span>
                <div class="icon-box-content">
                    <h4><a href="single-service.html">BENEFITS FOR PARTNERS</a></h4>
                    <p>Lorem ipsum dolor sit, omis unde duis elit. Lactus nibh lorem, malesuada rutrum moris in, commodo a elit.
                        Nulla ornare proin porta velit non quam faucibus dolor.</p>
                </div><!-- end .icon-box-content -->
            </div>
        </div>
    </div>
</section>

<section class="enqiry full_back" id="contact-us">
    <div class="container-fluid fuul_back_2">
        <div class="col-sm-6 col-border-right">
            <h1>We are Happy to help You</h1>
            {!! Form::open(['route' => 'contact-us-best-deal', 'role' => 'form']) !!}
                {!! Form::hidden('type', 'Guest Query') !!}
                {!! Form::hidden('subject', 'Dealer Contact Us') !!}
                {!! Form::hidden('user_id', $dealer->user->id) !!}
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input name="Name" type="text" class="form-control" id="Name" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <label for="E-Mail">Email address</label>
                    <input name="E-Mail" type="email" class="form-control" id="E-Mail" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="Mobile Number">Mobile No</label>
                    <input name="Mobile Number" type="text" class="form-control" id="Mobile Number" placeholder="Mobile No">
                </div>
                <div class="form-group">
                    <label for="Your Message" placeholder="Message">Your Message</label>
                    <textarea name="Your Message" id="Your Message" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="button stroke big di_white animated fadeInRightBig" data-direction="down" data-animate="fadeInRightBig" data-delay="0">Submit</button>
            {!! Form::close() !!}
        </div>
    </div>
</section>


<section class="footer">
    <div class="container footer_inner">
        <div class="col-sm-6">
            <h4 class="title_block"><span>About us</span></h4>
            <p align="justify">{{ $dealer->about_us }}</p>
        </div>
        <div class="col-sm-3">
            <h4 class="title_block"><span>Welcome</span></h4>
            <ul class="foot_ul">
                <li><a href="#home">Home</a></li>
                <li><a href="#about-us"> About Us</a></li>
                <li><a href="#latest-vehicles"> Latest Vehicles</a></li>
                <li><a href="#contact-us"> Contact Us</a></li>
            </ul>
        </div>
        <div class="col-sm-3">
            <h4 class="title_block"><span>Contect Us</span></h4>
            <ul class="foot_ul">
                <li><i class="fa fa-map-marker"></i> {{ $dealer->address }} {{ $dealer->location }} {{ $dealer->city }} {{ $dealer->state }}</li>
                <li><i class="fa fa-phone"></i> {{ $dealer->mobile_number }} | {{ $dealer->office_number }}</li>
                <li><i class="fa fa-envelope-o"></i> {{ $dealer->email }}</li>
            </ul>
        </div>
    </div>
</section>

<script type="text/javascript" src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/bootstrap/bootstrap.min.js') }}"></script>
</body>
</html>