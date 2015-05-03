@extends('layouts.frontend.frontend')

@section('content')
<div class="container pagecontainer">
	<div class="row">
	    <div class="col-md-12">
	        <div class="well well-sm">
            @include('partials.errors')
	        {!! Form::model($user, ['method' => 'POST', 'route' => ['dashboard.users.profile_update', $user->id], 'files' => true, 'role' => 'form', 'class' => 'form-horizontal']) !!}
                <fieldset>
                    <legend class="text-center">Update Your Profile</legend>
                    <div class="form-group">
                        {!! Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter user name']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Password:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::password('password', null, ['class' => 'form-control', 'placeholder' => 'Enter password']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Re-Password:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::password('password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
                        </div>
                    </div>
                    @if(isset($dealer))
                    <div class="form-group">
                        {!! Form::label('contact_person', 'Contact Person:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('contact_person', $dealer->contact_person, ['class' => 'form-control', 'placeholder' => 'Enter contact person name']) !!}
                        </div>
                        {!! Form::label('website', 'Website:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('website', $dealer->website, ['class' => 'form-control', 'placeholder' => 'Enter website']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('mobile_number', 'Mobile Number:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('mobile_number', $dealer->mobile_number, ['class' => 'form-control', 'placeholder' => 'Enter mobile number']) !!}
                        </div>
                        {!! Form::label('office_number', 'Office Number:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('office_number', $dealer->office_number, ['class' => 'form-control', 'placeholder' => 'Enter office number']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('about_us', 'About Us:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('about_us', $dealer->about_us, ['class' => 'form-control', 'placeholder' => 'Enter about us']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('state', 'State:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('state', $dealer->state, ['class' => 'form-control', 'placeholder' => 'Enter state']) !!}
                        </div>
                        {!! Form::label('city', 'City:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('city', $dealer->city, ['class' => 'form-control', 'placeholder' => 'Enter city']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('location', 'Location:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('location', $dealer->location, ['class' => 'form-control', 'placeholder' => 'Enter location']) !!}
                        </div>
                        {!! Form::label('pincode', 'Pincode:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('pincode', $dealer->pincode, ['class' => 'form-control', 'placeholder' => 'Enter Pincode']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Address:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('address', $dealer->address, ['class' => 'form-control', 'placeholder' => 'Enter Address', 'rows' => '2']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('ad_image', 'Ad Image:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::file('ad_image', ['class' => 'form-control', 'placeholder' => 'Select Advertisement Image']) !!}
                        </div>
                        <div class="col-sm-6">
                            @if(isset($dealer) && isset($dealer->ad_image))
                                <img src="{{ asset('uploads/' . $dealer->ad_image) }}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('logo', 'Logo:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::file('logo', ['class' => 'form-control', 'placeholder' => 'Select Logo Image']) !!}
                        </div>
                        <div class="col-sm-6">
                            @if(isset($dealer) && isset($dealer->logo))
                                <img src="{{ asset('uploads/' . $dealer->logo) }}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('pictures', 'Galary Images:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::file('pictures[]', ['multiple' => 'multiple', 'class' => 'form-control', 'placeholder' => 'Select Galary Image']) !!}
                        </div>
                        <div class="col-sm-6">
                            @if(isset($dealer))
                                @foreach($dealer->pictures as $picture)
                                    <img src="{{asset('uploads/' . $picture->path)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                                    <a href="{{ route('secure.pictures.destroy', $picture->id) }}"><i class="fa fa-close"></i></a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </fieldset>
	        {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</div>
@stop