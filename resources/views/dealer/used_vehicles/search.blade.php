{!! Form::open(['method' => 'get', 'role' => 'form', 'class' => 'form-horizontal']) !!}
<h2>
    {{ $legend }}
    <a class="btn btn-success advance-search-link" href="#"><i class="fa fa-search"></i> Advance Search</a>
    {!! Form::select('size', ['5' => '5', '10' => '10', '15' => '15', '25' => '25', '50' => '50', '100' => '100',], $size, ['class' => 'page-size search-box']) !!}
</h2>
<div class="well advance-search-div collapse">
    <fieldset>
        <legend class="text-center">Advance Search</legend>
        <div class="form-group">
            {!! Form::label('bname', 'Brand Name:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('bname[]', array('' => '') + $brands, @$request['bname'], ['class' => 'form-control brand-remote', 'placeholder' => 'Search your favorite brand...']) !!}
            </div>
            {!! Form::label('model', 'Model:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('model[]', array('' => '') + $models, @$request['model'], ['class' => 'form-control model-remote', 'data-placeholder' => 'Select Model']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('variant', 'Variant:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('variant[]', array('' => '') + $variants, @$request['variant'], ['class' => 'form-control variant-remote', 'data-placeholder' => 'Select Variant']) !!}
            </div>
            {!! Form::label('price', 'Price:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('price', @$request['price'], ['class' => 'form-control', 'placeholder' => 'Enter price']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('city', 'City:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('city[]', array('' => '') + $cities, @$request['city'], ['class' => 'form-control city-remote', 'data-placeholder' => 'Select City']) !!}
            </div>
            {!! Form::label('location', 'Location:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('location[]', array('' => '') + $locations, @$request['location'], ['class' => 'form-control location-remote', 'data-placeholder' => 'Select Location']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('dealer-name', 'Dealer Name:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('dealer-name', @$request['company-name'], ['class' => 'form-control', 'placeholder' => 'Enter dealer name']) !!}
            </div>
            {!! Form::label('model_year', 'Model Year:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('model_year', ['' => 'Search By Year'] + array_combine(range(date("Y"), (date("Y")-20)), range(date("Y"), (date("Y")-20))), @$request['model_year'], ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::button('<i class="fa fa-search"></i> Search', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </fieldset>
</div>
{!! Form::close() !!}