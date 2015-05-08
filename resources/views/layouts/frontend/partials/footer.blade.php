 	<div class="container-fluid test">
    <div class="row">
        <div class="container-fluid">
            <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                <!-- Bottom Carousel Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#quote-carousel" data-slide-to="1"></li>
                    <li data-target="#quote-carousel" data-slide-to="2"></li>
					<li data-target="#quote-carousel" data-slide-to="3"></li>
					<li data-target="#quote-carousel" data-slide-to="4"></li>
					<li data-target="#quote-carousel" data-slide-to="5"></li>
                </ol>

                <!-- Carousel Slides / Quotes -->
                <div class="carousel-inner">
					
					<div class="item active">
                        <blockquote>
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <img class="img-circle" src="{{ asset('/carmazic/img/testimonial/gurav_moters.jpg') }}" style="width: 100px;height:100px;">
                                </div>
                                <div class="col-sm-9 white">
                                    <p class="paddingright">From the moment walking through the doors you can tell this is no ordinary auto sales place. Buying a vehicle from Carmazic Auto Sales was a great, stress free and yes, even fun, experience.</p>
                                    <small class="white">Gaurav motors</small>
                                </div>
                            </div>
                        </blockquote>
                    </div>
					
                    <!-- Quote 1 -->
                    <div class="item">
                        <blockquote>
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <img class="img-circle" src="{{ asset('/carmazic/img/testimonial/kumar_car_world.jpg') }}" style="width: 100px;height:100px;">
                                </div>
                                <div class="col-sm-9 white">
                                    <p class="paddingright">The guys that helped me were great and I appreciated the time and effort they put in to help me with my car buying experience with you all. </p>
                                    <small class="white">Kumar,s car world</small>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                    <!-- Quote 2 -->
                    <div class="item">
                        <blockquote>
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <img class="img-circle" src="{{ asset('/carmazic/img/testimonial/Satguru_moters.jpg') }}" style="width: 100px;height:100px;">
                                </div>
                                <div class="col-sm-9 white">
                                    <p class="paddingright">Superb service. Friendly environment. Excellent coffee. This how buying a car should be. If Carlsberg sold cars..... It wouldn't be anywhere near as good as this place. The Kronenbourg Premier Cru of car dealers. </p>
                                    <small class="white">Satguru motors</small>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                    <!-- Quote 3 -->
                    <div class="item">
                        <blockquote>
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <img class="img-circle" src="{{ asset('/carmazic/img/testimonial/sara_moters.jpg') }}" style="width: 100px;height:100px;">
                                </div>
                                <div class="col-sm-9 white">
                                    <p class="paddingright">Just a line to thank you on the professional way your company conducted the sale, from detailed information of vehicle, the car is better than you described I certainly appreciate the 1st class service and professionalism.</p>
                                    <small class="white">Sara auto</small>
                                </div>
                            </div>
                        </blockquote>
                    </div>
					
					<div class="item">
                        <blockquote>
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <img class="img-circle" src="{{ asset('/carmazic/img/testimonial/shiv_shakti_moters.jpg') }}" style="width: 100px;height:100px;">
                                </div>
                                <div class="col-sm-9 white">
                                    <p class="paddingright">From the initial till delivery it was a very good experience in carmazic, the sales consultant was very co-operative & I didn't find any small kind of inconvenience from Carmazic. </p>
                                    <small class="white">Shiv shakti motors</small>
                                </div>
                            </div>
                        </blockquote>
                    </div>
					
					<div class="item">
                        <blockquote>
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <img class="img-circle" src="{{ asset('/carmazic/img/testimonial/durga_moters.jpg') }}" style="width: 100px;height:100px;">
                                </div>
                                <div class="col-sm-9 white">
                                    <p class="paddingright">We were very pleased. We did not feel an overwhelming pressure to buy right away. We were treated wonderfully. All questions were answered and we were given all the information we needed to think over our decision had we opted to do so.</p>
                                    <small class="white">Durga motors</small>
                                </div>
                            </div>
                        </blockquote>
                    </div>			
					
					
                </div>

                <!-- Carousel Buttons Next/Prev -->
                <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-circle-left"></i></a>
                <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid foot">
	<div class="container foot_1">
		<div class="container-fluid col-lg-3 col-md-3 col-sm-6 col-xs-12 foot_inner foot_inner_xs">
			<h4>Find your Car</h4>
			<p><i class="fa fa-map-marker skyblu"></i>&nbsp; D-55 A, Pandav Nagar, Delhi-92</p>
			<p><i class="fa fa-phone skyblu"></i>&nbsp; +91-9266663096</p>
			<p><i class="fa fa-envelope-o skyblu"></i>&nbsp; carmazicinfo@gmail.com</p>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 foot_inner foot_inner_xs">
			<h4>Customer Support</h4>
			<ul style="list-style:none">
				<li><a href="{{ route('frontend.pages.show', 'frequently-asked-questions') }}">Faq</a></li>
				<li><a href="{{ route('frontend.pages.show', 'help-for-insurance-finance') }}">Help for Insurance & Finance</a></li>
				<li><a href="{{ route('frontend.pages.show', 'payment-option') }}">Payment Option</a></li>
				<li><a href="{{ route('frontend.pages.show', 'selecting-a-car-tips') }}">Selecting a Car Tips</a></li>
			</ul>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 foot_inner foot_inner_xs">
			<h4>Follow Us</h4>
			<div class="center-block">
				<a href="https://www.facebook.com/carmazicdelhi" target="_blank"><i id="social" class="fa fa-facebook-square fa-3x social-fb"></i></a>
				<a href="https://twitter.com/carmazic" target="_blank"><i id="social" class="fa fa-twitter-square fa-3x social-tw"></i></a>
				<a href="#"><i id="social" class="fa fa-google-plus-square fa-3x social-gp"></i></a>
				<a href="#"><i id="social" class="fa fa-envelope-square fa-3x social-em"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 foot_inner">
			<h4>Don't miss our exclusive Offers</h4>
			<div class="input-group">
                <input type="text" class="form-control" />
                <span class="input-group-btn">
                    <button class="btn btn-info" type="button">Signup</button>
                </span>
			</div><!-- /input-group -->
			<div class="row">
				<div class="container-fluid">
					<form action="" class="search-form">
						<div class="form-group has-feedback">
							<label for="search" class="sr-only">Search</label>
							<input type="text" class="form-control" name="search" id="search" placeholder="Search by model...">
							<span class="glyphicon glyphicon-search form-control-feedback"></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="container foot_2" style="padding-top:18px">
		
		<div class="col-sm-9 foot2">
			<ul>
				<li><a href="{{ route('frontend.pages.show', 'about-us') }}">About us</a></li>
				<li><a href="{{ route('frontend.pages.show', 'contact-us') }}">Contact Us</a></li>
				<li><a href="{{ route('used-vehicle-search') }}">Find Cars</a></li>
				<li><a href="{{ route('frontend.pages.show', 'terms-and-conditions') }}">Terms and Conditions</a></li>
				<li><a href="{{ route('frontend.pages.show', 'privacy-policy') }}">Privacy Policy</a></li>
			</ul>
		</div>

		<div class="col-sm-3 foot_3">
			<p>Copyright © 2014</p>
		</div>
	</div>
</div>