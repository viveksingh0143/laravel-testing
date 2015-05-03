<fieldset>
    <legend class="text-center">{{ $legend }}</legend>
    {!! Form::hidden('vehicle_id', $vehicle->id) !!}
    <div class="form-group">
        {!! Form::label('brand_id', 'Brand:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('brand_id', $vehicle->bname, ['class' => 'form-control', 'placeholder' => 'Select Brand', 'disabled' => 'disabled']) !!}
        </div>
        {!! Form::label('model', 'Model', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('model', $vehicle->model, ['class' => 'form-control', 'placeholder' => 'Enter model', 'disabled' => 'disabled']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('variant', 'Variant', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('variant', $vehicle->variant, ['class' => 'form-control', 'placeholder' => 'Enter variant', 'disabled' => 'disabled']) !!}
        </div>
        {!! Form::label('colour', 'Colour', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('colour', null, ['class' => 'form-control', 'placeholder' => 'Enter colour']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('model_year', 'Model Year', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('model_year', null, ['class' => 'form-control', 'placeholder' => 'Enter model year']) !!}
        </div>
        {!! Form::label('kilometers', 'Kilometers', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('kilometers', null, ['class' => 'form-control', 'placeholder' => 'Enter kilometers']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('number_of_owners', 'Number Of Owners', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('number_of_owners', null, ['class' => 'form-control', 'placeholder' => 'Enter number of owners']) !!}
        </div>
        {!! Form::label('registered_at', 'Registered At', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('registered_at', null, ['class' => 'form-control', 'placeholder' => 'Enter registered at']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('transmission_type', 'Transmission Type', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('transmission_type', null, ['class' => 'form-control', 'placeholder' => 'Enter transmission type']) !!}
        </div>
        {!! Form::label('fuel_type', 'Fuel Type', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('fuel_type', null, ['class' => 'form-control', 'placeholder' => 'Enter fuel type']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter description', 'rows' => '2']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Enter price']) !!}
        </div>
        {!! Form::label('insurance', 'Insurance', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::select('insurance', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('state', 'State', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => 'Enter state']) !!}
        </div>
        {!! Form::label('city', 'City', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Enter city']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('location', 'Location', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Enter location']) !!}
        </div>
        {!! Form::label('address', 'Address', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Enter address', 'rows' => '2']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('pincode', 'Pincode', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('pincode', null, ['class' => 'form-control', 'placeholder' => 'Enter pincode']) !!}
        </div>
        {!! Form::label('status', 'Status:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::select('status', ['ACTIVE' => 'Active', 'IN-ACTIVE' => 'In-Active', 'PENDING-APPROVAL' => 'Pending Approval'], null, ['class' => 'form-control', 'placeholder' => 'Select Status']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('thumbnail', 'Thumbnail Image:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::file('thumbnail', ['class' => 'form-control', 'placeholder' => 'Select Thumbnail Image']) !!}
        </div>
        <div class="col-sm-6">
            @if(isset($used_vehicle) && isset($used_vehicle->thumbnail))
                <img src="{{asset('uploads/' . $used_vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('pictures', 'Galary Images:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::file('pictures[]', ['multiple' => 'multiple', 'class' => 'form-control', 'placeholder' => 'Select Galary Image']) !!}
        </div>
        <div class="col-sm-6">
            @if(isset($used_vehicle))
                @foreach($used_vehicle->pictures as $picture)
                    <img src="{{asset('uploads/' . $picture->path)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                    <a href="{{ route('secure.pictures.destroy', $picture->id) }}"><i class="fa fa-close"></i></a>
                @endforeach
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            {!! Form::submit($submit_text, ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-warning" href="{{ $list_link }}"><i class="fa fa-table"></i></a>
        </div>
    </div>
</fieldset>