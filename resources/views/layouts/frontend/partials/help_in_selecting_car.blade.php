<div class="container-fluid log_in">
    <div class="container">
        <div class="col-sm-8">
            <h1 class="white padding_more">We Help you in selecting a car...</h1>
            <h3 class="green">As perfect as you have dream for it</h3>
            <div>
                <a href="{{ url('/auth/login') }}" type="button" class="btn btn-success wow bounceInLeft animated" data-wow-delay=".3s">Sign In</a>
                <a href="{{ url('/secure/vehicles/create') }}" class="btn btn-info btn-lg btn1 wow bounceInLeft animated" data-wow-delay="1.0s">Post free Car</a>
                <a href="{{ url('/auth/dealer-register') }}" class="btn btn-danger btn1 wow bounceInLeft animated" data-wow-delay=".7s">Sign Up</a>
            </div>
        </div>
        <div class="col-sm-4">
            <img class="img-responsive" src="{{ asset('/carmazic/img/ads/Carmazic-Banner-Finance-1.jpg') }}" style="padding-top:9px;">
        </div>
    </div>
</div>