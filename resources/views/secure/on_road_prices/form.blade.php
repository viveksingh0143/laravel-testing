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
        {!! Form::label('state', 'State', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => 'Enter state']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('type', 'Extra Variant', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Enter extra variant']) !!}
        </div>
        {!! Form::label('ex_show_room_price', 'Ex-Showroom Price', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('ex_show_room_price', null, ['class' => 'form-control', 'placeholder' => 'Enter price']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('registration_charge', 'Regn. Tax & No. Plate Charges', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('registration_charge', null, ['class' => 'form-control', 'placeholder' => 'Enter charges']) !!}
        </div>
        {!! Form::label('insurance_charge', 'Comp. Insurance with 0% Dep cover', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('insurance_charge', null, ['class' => 'form-control', 'placeholder' => 'Enter charges']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('warehouse_charge', 'Warehouse &amp; Handling Charges', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('warehouse_charge', null, ['class' => 'form-control', 'placeholder' => 'Enter charges']) !!}
        </div>
        {!! Form::label('extended_warranty_charge', 'Extended Warranty (For 2 Years)', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('extended_warranty_charge', null, ['class' => 'form-control', 'placeholder' => 'Enter charges']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('body_care_charge', 'Body Care Package', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('body_care_charge', null, ['class' => 'form-control', 'placeholder' => 'Enter charges']) !!}
        </div>
        {!! Form::label('essential_kit_charge', 'Essential Accessories Kit', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('essential_kit_charge', null, ['class' => 'form-control', 'placeholder' => 'Enter charges']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            {!! Form::submit($submit_text, ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-warning" href="{{ $list_link }}"><i class="fa fa-table"></i></a>
        </div>
    </div>
</fieldset>