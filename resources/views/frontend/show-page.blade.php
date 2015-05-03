@extends('layouts.frontend.frontend_inner')

@section('content')
    <div class="container base-container">
        <div class="container-fluid">
            <div class="col-sm-12 wow flipInX animated animated animated"><div class="page-title">{{ $page->title }}</div></div>
            <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow pulse animated animated" data-wow-duration="1.0s" style="text-align: right; visibility: visible; -webkit-animation-duration: 1s;">
                <span class="price"><i class="fa fa-inr"></i> 3,30,00,000/-</span><br>
            </div>-->
        </div>
        <p class="page-header-arrow"></p>
        <div class="line3"></div>
        <div class="container-fluid">
            <div class="form_box page-body">
                @if(!empty($page->thumbnail))<img src="{{ asset('images/cache/large/' . $page->thumbnail) }}" class="img-responsive img-thumbnail pull-right post-img">@endif
                {{ $page->body }}
            </div>
        </div>
    </div>
@endsection