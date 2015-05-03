@extends('layouts.frontend.frontend')

@section('content')
    <div class="container pagecontainer">
        <div class="hpadding50c">
            <div class="container-fluid">
                <div class="col-sm-12 col-xs-12 wow flipInX animated animated" data-wow-duration="2.0s" style="visibility: visible; -webkit-animation: flipInX 2.0s;">
                    <p class="size30 slim">All the brands in India</p>
                </div>
            </div>
            <p class="aboutarrow"></p>
        </div>

        <div class="line4"></div>
        <div class="container-fluid">
            <div class="row">
            @foreach($all_brands as $brand)
              <div class="col-xs-6 col-md-3">
                <h4><a href="{{ route('brand-used-vehicle', $brand->slug) }}">{{ $brand->name }}</a></h4>
                @if(isset($brand->logo))
                <a href="{{ route('brand-used-vehicle', $brand->slug) }}" class="thumbnail">
                  <img src="{{ 'images/cache/medium/' . $brand->logo }}" alt="{{ $brand->name }}" />
                </a>
                @endif
              </div>
            @endforeach
            </div>
        </div>
        <div class="line4"></div>
    </div>
@endsection