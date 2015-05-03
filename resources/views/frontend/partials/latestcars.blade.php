@if(isset($latest_vehicles))
<div class="container-fluid" id="tourpackages-carousel">
    <div class="container title2" style="padding-top:50px"><h2>LATEST VEHICLES</h2></div>
    <p align="center">Best Vehicles Deals</p>
    <div class="row" style="margin-top:36px">
        @foreach($latest_vehicles as $latest_vehicle)
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 offer_home">
                <div class="thumbnail wow animated bounceIn">
                    @if(isset($latest_vehicle->thumbnail))
                        <img src="{{asset('images/cache/large/' . $latest_vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 300px;" />
                    @else
                        <img src="{{asset('/carmazic/img/car-clipart.jpg')}}" class="img-thumbnail img-responsive" style="max-width: 300px;" />
                    @endif
                    <div class="caption">
                        <a href="#"> <strong>{{ $latest_vehicle->vehicle->bname }} {{ $latest_vehicle->vehicle->model }}</strong></a>
                        <p><strong>Year :</strong> {{ $latest_vehicle->model_year }}<br><strong>Price :</strong> <i class="fa fa-inr"></i> {{ $latest_vehicle->price }}</p>
                        <a href="{{ route('used-vehicle-details', [$latest_vehicle->id, str_slug($latest_vehicle->vehicle->bname . ' ' . $latest_vehicle->vehicle->model . ' ' . $latest_vehicle->vehicle->variant)]) }}" class="btn btn-info btn-xs" role="button" style="margin:10px 0 10px 0">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div><!-- End row -->
</div><!-- End container -->
@endif