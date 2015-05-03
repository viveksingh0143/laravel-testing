<fieldset>
    <legend class="text-center">{{ $legend }}</legend>
    {!! Form::hidden('vehicle_id', $vehicle->id) !!}
    <div class="form-group">
        {!! Form::label('brand_id', 'Brand:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('brand_id', $vehicle->bname, ['class' => 'form-control', 'placeholder' => 'Select Brand', 'disabled' => 'disabled']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('model', 'Model', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('model', $vehicle->model, ['class' => 'form-control', 'placeholder' => 'Enter model', 'disabled' => 'disabled']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('variant', 'Variant', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('variant', $vehicle->variant, ['class' => 'form-control', 'placeholder' => 'Enter variant', 'disabled' => 'disabled']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Enter price']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('status', ['ACTIVE' => 'Active', 'IN-ACTIVE' => 'In-Active', 'PENDING-APPROVAL' => 'Pending Approval'], null, ['class' => 'form-control', 'placeholder' => 'Select Status']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit($submit_text, ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-warning" href="{{ $list_link }}"><i class="fa fa-table"></i></a>
        </div>
    </div>
</fieldset>