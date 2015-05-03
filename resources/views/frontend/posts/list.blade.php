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
            @foreach($posts as $post)
            <div class="row">
              <div class="col-sm-12">
                <h4><a href="{{ route('frontend.posts.show', $post->slug) }}">{{ $post->title }}</a></h4>
                @if(isset($post->thumbnail))
                  <img src="{{ asset('images/cache/medium/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="img-thumbnail pull-left img-left-margin post-thumbnail" />
                @endif
                @if(!empty($post->excerpt))
                  {!! $post->excerpt !!}
                @else
                  {!! Str::words($post->body, 100) !!}
                @endif
              </div>
            </div>
            <div class="line4"></div>
            @endforeach
            <div class="row">
              <div class="col-sm-12">
                {!! $posts->appends(@$request)->render() !!}
              </div>
            </div>
        </div>
    </div>
@endsection