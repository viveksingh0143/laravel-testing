@extends('layouts.frontend.frontend')

@section('content')
    <div class="container base-container">
        <div class="hpadding50c">
            <div class="container-fluid">
                <div class="col-sm-12 col-xs-12 wow flipInX animated animated" data-wow-duration="2.0s" style="visibility: visible; -webkit-animation: flipInX 2.0s;">
                    <p class="size30 slim">Get the seller details</p>
                </div>
            </div>
            <p class="aboutarrow"></p>
        </div>

        <div class="line4"></div>

        <div class="container-fluid">
            <div class="form_box page-body">
                {!! Form::open(['url' => '/contact-us/get-the-best-deal', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                <div class="container-fluid">
                    {!! Form::hidden('Brand', $usedVehicle->vehicle->bname) !!}
                    {!! Form::hidden('Model', $usedVehicle->vehicle->model) !!}
                    {!! Form::hidden('Variant', $usedVehicle->vehicle->variant) !!}
                    {!! Form::hidden('Model Year', $usedVehicle->model_year) !!}
                    {!! Form::hidden('Dealer', $dealer->name) !!}
                    {!! Form::hidden('Location', $dealer->location) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Your Name', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('name', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'Your Name']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Your E-Mail', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('email', null, ['pattern' => "[^@]+@[^@]+\.[a-zA-Z]{2,6}", 'required' => 'required', 'class' => 'form-control', 'placeholder' => 'Your E-Mail']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('contact_us', 'Contact No.', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('contact_us', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'Your contact number']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">Get Details</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection