@extends('layouts.frontend.frontend')

@section('content')
    <div class="container pagecontainer">
        <div class="hpadding50c">
            <div class="container-fluid">
                <div class="col-sm-12 col-xs-12 wow flipInX animated animated" data-wow-duration="2.0s" style="visibility: visible; -webkit-animation: flipInX 2.0s;">
                    <p class="size30 slim">Carmazic.com</p>
                </div>
            </div>
            <p class="aboutarrow"></p>
        </div>

        <div class="line4"></div>
        <div class="container-fluid">
            @foreach($pages as $page)
            <div class="row">
              <div class="col-sm-12">
                <h4><a href="{{ route('frontend.pages.show', $page->slug) }}">{{ $page->title }}</a></h4>
                @if(isset($page->thumbnail))
                  <img src="{{ asset('images/cache/medium/' . $page->thumbnail) }}" alt="{{ $page->title }}" class="img-thumbnail pull-left img-left-margin" />
                @endif
                @if(!empty($page->excerpt))
                  {!! $page->excerpt !!}
                @else
                  {!! Str::words($page->body, 100) !!}
                @endif
              </div>
            </div>
            <div class="line4"></div>
            @endforeach
            <div class="row">
              <div class="col-sm-12">
                {!! $pages->appends(@$request)->render() !!}
              </div>
            </div>
        </div>
    </div>
@endsection