<fieldset>
    <legend class="text-center">{{ $legend }}</legend>
    <div class="form-group">
        {!! Form::label('slug', 'Slug:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter slug']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Company Name:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter dealer name']) !!}
        </div>
        {!! Form::label('contact_person', 'Contact Person:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('contact_person', null, ['class' => 'form-control', 'placeholder' => 'Enter contact person name']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-Mail:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('email', null, ['type' => 'email', 'class' => 'form-control', 'placeholder' => 'Enter dealer email']) !!}
        </div>
        {!! Form::label('website', 'Website:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'Enter website']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('mobile_number', 'Mobile Number:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('mobile_number', null, ['class' => 'form-control', 'placeholder' => 'Enter mobile number']) !!}
        </div>
        {!! Form::label('office_number', 'Office Number:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('office_number', null, ['class' => 'form-control', 'placeholder' => 'Enter office number']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('about_us', 'About Us:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('about_us', null, ['class' => 'form-control', 'placeholder' => 'Enter about us']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('state', 'State:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => 'Enter state']) !!}
        </div>
        {!! Form::label('city', 'City:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Enter city']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('location', 'Location:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Enter location']) !!}
        </div>
        {!! Form::label('pincode', 'Pincode:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('pincode', null, ['class' => 'form-control', 'placeholder' => 'Enter Pincode']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('address', 'Address:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Enter Address', 'rows' => '2']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::select('status', ['ACTIVE' => 'Active', 'IN-ACTIVE' => 'In-Active', 'PENDING-APPROVAL' => 'Pending Approval'], null, ['class' => 'form-control', 'placeholder' => 'Select Status']) !!}
        </div>
        {!! Form::label('user_id', 'Attached User:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::select('user_id', $users, null, ['class' => 'form-control', 'placeholder' => 'Attached User']) !!}
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
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit($submit_text, ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-warning" href="{{ $list_link }}"><i class="fa fa-table"></i></a>
        </div>
    </div>
</fieldset>