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
                {!! Form::text('bname', @$request['bname'], ['class' => 'form-control', 'placeholder' => 'Enter brand name']) !!}
            </div>
            {!! Form::label('model', 'Model:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('model', @$request['model'], ['class' => 'form-control', 'placeholder' => 'Enter model']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('variant', 'Variant:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('variant', @$request['variant'], ['class' => 'form-control', 'placeholder' => 'Enter variant']) !!}
            </div>
            {!! Form::label('price', 'Price:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('price', @$request['price'], ['class' => 'form-control', 'placeholder' => 'Enter price']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('city', 'City:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('city', @$request['city'], ['class' => 'form-control', 'placeholder' => 'Enter city']) !!}
            </div>
            {!! Form::label('location', 'Location:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('location', @$request['location'], ['class' => 'form-control', 'placeholder' => 'Enter location']) !!}
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