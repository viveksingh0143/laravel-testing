@extends('layouts.frontend.frontend')

@section('content')
    <div class="container pagecontainer">
        <div class="hpadding50c">
            <div class="container-fluid">
                <div class="col-sm-12 col-xs-12 wow flipInX animated animated" data-wow-duration="2.0s" style="visibility: visible; -webkit-animation: flipInX 2.0s;">
                    <p class="size30 slim"><a href="{{ route('frontend.posts.show', $post->slug) }}">{{ $post->title }}</a></p>
                </div>
            </div>
            <p class="aboutarrow"></p>
        </div>

        <div class="line4"></div>
        <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                @if(isset($post->thumbnail))
                  <img src="{{ asset('images/cache/large/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="img-thumbnail pull-left img-left-margin page-thumbnail" />
                @endif
                {!! $post->body !!}
              </div>
            </div>
            <div class="line4"></div>
        </div>
    </div>
@endsection