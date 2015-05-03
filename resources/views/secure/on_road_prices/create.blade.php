@extends('layouts.backend.backend')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    @include('partials.errors')
                    {!! Form::open(['route' => ['secure.on-road-prices.store'], 'role' => 'form', 'class' => 'form-horizontal']) !!}
                    @include('secure.on_road_prices.form', ['legend' => 'Manage On Road Price', 'submit_text' => 'Add On Road Price', 'list_link' => route('secure.on-road-prices.index')])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection