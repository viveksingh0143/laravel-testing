<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dealer Details</title>
    <link href="{{ asset('/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
    <link href="{{ asset('/plugins/font-awesome/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/plugins/owl.carousel/owl.carousel.css') }}" rel="stylesheet" />
    <link href="{{ asset('/plugins/owl.carousel/owl.theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('/carmazic/css/dealer.css?ver=1.0') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @include('layouts.analytics')
  </head>

  <body>
    <div class="container-fluid panel_dealer" role="tabpanel">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs navbar-fixed-top" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i> Home</a></li>
        <li role="presentation"><a href="#about_us" aria-controls="about_us" role="tab" data-toggle="tab"><i class="fa fa-group"></i> About Us</a></li>
        <li role="presentation"><a href="#latest_vehicles" aria-controls="latest_vehicles" role="tab" data-toggle="tab"><i class="fa fa-car"></i> Latest Vehicles</a></li>
        <li role="presentation"><a href="#contact_us" aria-controls="contact_us" role="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i> Contact Us</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
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
            <div class="container padding_30">
                <div class="col-sm-6">
                    <div class="divider-strip"><h2>About Us</h2><span class="strip-block"></span></div>
                    <p class="gray" align="justify"><i class="fa fa-quote-left fa-2x pull-left fa-border"></i>
                        @if(!empty($dealer->about_us))
                            {{ $dealer->about_us }}
                        @endif
                    </p>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
            <div class="container padding_bottom_30">
                <div class="divider-strip"><h2>Our Latest Vehicles</h2><span class="strip-block"></span></div>
                <div id="owl-demo">
                  @foreach($dealer->usedVehicles as $latest_vehicle)
                  <div class="item">
                    <div class="property">
                        <a href="{{ route('used-vehicle-details',  [$latest_vehicle->id, str_slug($latest_vehicle->vehicle->bname . ' ' . $latest_vehicle->vehicle->model . ' ' . $latest_vehicle->vehicle->variant)]) }}">
                            <div class="property-image">
                                @if(!empty($latest_vehicle->thumbnail))
                                    <img src="{{asset('images/cache/medium/' . $latest_vehicle->thumbnail)}}" class="img-thumbnail img-responsive" />
                                @elseif(!empty($latest_vehicle->vehicle->thumbnail))
                                    <img src="{{asset('images/cache/medium/' . $latest_vehicle->vehicle->thumbnail)}}" class="img-thumbnail img-responsive" />
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
            </div>

            <section class="enqiry full_back">
                <div class="container-fluid fuul_back_2">
                    <div class="col-sm-6 col-border-right">
                        <h1>We are Happy to help You</h1>
                        {!! Form::open(['route' => 'contact-us-best-deal', 'role' => 'form']) !!}
                            {!! Form::hidden('type', 'Guest Query') !!}
                            {!! Form::hidden('subject', 'Dealer Contact Us') !!}
                            {!! Form::hidden('user_id', $dealer->user->id) !!}
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input name="Name" type="text" class="form-control" id="Name" placeholder="Your Name" required="required">
                            </div>
                            <div class="form-group">
                                <label for="E-Mail">Email address</label>
                                <input name="E-Mail" type="email" class="form-control" id="E-Mail" placeholder="Enter email" required="required">
                            </div>
                            <div class="form-group">
                                <label for="Mobile Number">Mobile No</label>
                                <input name="Mobile Number" type="text" class="form-control" id="Mobile Number" placeholder="Mobile No" required="required">
                            </div>
                            <div class="form-group">
                                <label for="Your Message" placeholder="Message">Your Message</label>
                                <textarea name="Your Message" id="Your Message" class="form-control" rows="3" required="required"></textarea>
                            </div>
                            <button type="submit" class="button stroke big di_white animated fadeInRightBig" data-direction="down" data-animate="fadeInRightBig" data-delay="0">Submit</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </section>

            <section class="footer">
                <div class="container footer_inner">
                    <ul class="foot_ul">
                        <li><i class="fa fa-map-marker"></i> {{ $dealer->address }}</li>
                        <li><i class="fa fa-phone"></i> {{ $dealer->mobile_number }} | {{ $dealer->office_number }}</li>
                        <li><i class="fa fa-envelope-o"></i> {{ $dealer->email }}</li>
                        <li>Copyright <i class="fa fa-copyright"></i> all rights reserved by carmazic.com</li>
                    </ul>
                </div>
            </section>
        </div>

        <div role="tabpanel" class="tab-pane" id="about_us">
            <div class="padding_top_delar"></div>
            <div class="container-fluid about_feture">
                <div class="container">
                    <div class="title_text">
                        <h1 class="title">About Us</h1>
                        <div class="topaz-line opacity-zero show animated fadeIn" data-animate="fadeIn" data-delay="0">
                            <i class="fa fa-car"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        @if(!empty($dealer->logo))
                           <img class="pull-left" style="max-height: 50px;" src="{{ asset('images/cache/small/' . $dealer->logo) }}" class="img-responsive" />
                       @else
                           <img class="pull-left" style="max-height: 50px;" src="{{ asset('/carmazic/img/logo/carmazic-logo.png') }}" class="img-responsive" />
                       @endif
                    </div>
                    <div class="col-sm-9 about_content">
                        <div class="divider-strip"><h2>A Short History</h2><span class="strip-block"></span></div>
                        <p class="gray"><i class="fa fa-quote-left fa-2x pull-left fa-border"></i>
                        @if(!empty($dealer->about_us))
                            {{ $dealer->about_us }}
                        @endif
                        </p>
                    </div>
                </div>
            </div>
            <section class="no_padding">
                @if($dealer->ad_image)
                <img src="{{ asset('uploads/' . $dealer->ad_image) }}" class="img-responsive" />
                @endif
            </section>
            <section class="footer">
                <div class="container footer_inner">
                    <ul class="foot_ul">
                        <li><i class="fa fa-map-marker"></i> {{ $dealer->address }}</li>
                        <li><i class="fa fa-phone"></i> {{ $dealer->mobile_number }} | {{ $dealer->office_number }}</li>
                        <li><i class="fa fa-envelope-o"></i> {{ $dealer->email }}</li>
                        <li>Copyright <i class="fa fa-copyright"></i> all rights reserved by carmazic.com</li>
                    </ul>
                </div>
            </section>
        </div>

        <div role="tabpanel" class="tab-pane" id="latest_vehicles">
            <div class="padding_top_delar">
            </div>
            <div class="container">
                <div class="divider-strip"><h2>Our Wide Range of Vehicle</h2><span class="strip-block"></span></div>
                <div class="table-div">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Make - Model</th>
                          <th>variant</th>
                          <th>Year</th>
                          <th>Color</th>
                          <th>Owner</th>
                          <th>Insurance</th>
                          <th>Kms</th>
                          <th>Fuel Type</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dealer->usedVehicles as $latest_vehicle)
                        <tr>
                            <td>{{ $latest_vehicle->vehicle->bname }} {{ $latest_vehicle->vehicle->model }}</td>
                            <td>{{ $latest_vehicle->vehicle->variant }}</td>
                            <td>{{ $latest_vehicle->model_year }}</td>
                            <td>{{ $latest_vehicle->color }}</td>
                            <td>{{ owner_number_to_words($latest_vehicle->number_of_owners) }}</td>
                            <td>{{ $latest_vehicle->insurance? 'Yes' : 'No' }}</td>
                            <td>{{ $latest_vehicle->kilometers }}</td>
                            <td>{{ $latest_vehicle->fuel_type }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
            <section class="footer">
                <div class="container footer_inner">
                    <ul class="foot_ul">
                        <li><i class="fa fa-map-marker"></i> {{ $dealer->address }}</li>
                        <li><i class="fa fa-phone"></i> {{ $dealer->mobile_number }} | {{ $dealer->office_number }}</li>
                        <li><i class="fa fa-envelope-o"></i> {{ $dealer->email }}</li>
                        <li>Copyright <i class="fa fa-copyright"></i> all rights reserved by carmazic.com</li>
                    </ul>
                </div>
            </section>
        </div>

        <div role="tabpanel" class="tab-pane" id="contact_us">
            <div class="padding_top_delar">
            </div>
            <div class="container">
                <div class="col-sm-6">
                    <div class="divider-strip"><h2>Contact Us</h2><span class="strip-block"></span></div>
                        <ul style="list-style:none">
                            <li>
                                <div class="icon-box-1">
                                    <span><i class="fa fa-user"></i></span>
                                    <div class="icon-box-content">
                                         <p>{{ $dealer->name }}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="icon-box-1">
                                    <span><i class="fa fa-phone"></i></span>
                                    <div class="icon-box-content">
                                        <p>{{ $dealer->mobile_number }} | {{ $dealer->office_number }}</p>
                                    </div><!-- end .icon-box-content -->
                                </div>
                            </li>
                            <li>
                                <div class="icon-box-1">
                                    <span><i class="fa fa-money"></i></span>
                                    <div class="icon-box-content">
                                         <p>{{ $dealer->address }}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="icon-box-1">
                                    <span><i class="fa fa-envelope-o"></i></span>
                                    <div class="icon-box-content">
                                        <p>{{ $dealer->email }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @if($dealer->ad_image)
                        <img src="{{ asset('uploads/' . $dealer->ad_image) }}" class="img-responsive" />
                        @endif
                </div>

                <div class="col-sm-6">
                    @if(!empty($dealer->geoloc))
                        <iframe
                          width="100%"
                          height="450"
                          frameborder="0" style="border:0"
                          src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBG5DSTQ6pK8-O8I6VBGEbBGJ2g6iWiqZA&q={{ $dealer->geoloc }}">
                        </iframe>
                    @else
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.3192549448454!2d77.150948!3d28.650158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d02e2dc354855%3A0xab3988b09a82af69!2s55%2C+Block+B%2C+Pandav+Nagar%2C+Khampur%2C+New+Delhi%2C+Delhi+110008!5e0!3m2!1sen!2sin!4v1429975770789" width="100%" height="450" frameborder="0" style="border:0"></iframe>
                    @endif
                </div>

            </div>
            <section class="footer">
                <div class="container footer_inner">
                    <ul class="foot_ul">
                        <li><i class="fa fa-map-marker"></i> {{ $dealer->address }}</li>
                        <li><i class="fa fa-phone"></i> {{ $dealer->mobile_number }} | {{ $dealer->office_number }}</li>
                        <li><i class="fa fa-envelope-o"></i> {{ $dealer->email }}</li>
                        <li>Copyright <i class="fa fa-copyright"></i> all rights reserved by carmazic.com</li>
                    </ul>
                </div>
            </section>
        </div>
      </div>

    </div>
    <script type="text/javascript" src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/owl.carousel/owl.carousel.min.js') }}"></script>
    <script>
    // JavaScript Document
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
          autoPlay: 3000, //Set AutoPlay to 3 seconds
          items : 3,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,2]
      });
    });
    </script>
  </body>
</html>