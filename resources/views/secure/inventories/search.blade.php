{!! Form::open(['method' => 'get', 'role' => 'form', 'class' => 'form-horizontal']) !!}
<h2>
    {{ $legend }}
    <a class="btn btn-success" href="{{ $new_link }}"><i class="fa fa-codepen"></i> New</a>
    <a class="btn btn-success advance-search-link" href="#"><i class="fa fa-search"></i> Advance Search</a>

    {!! Form::select('size', ['5' => '5', '10' => '10', '15' => '15', '25' => '25', '50' => '50', '100' => '100',], $size, ['class' => 'page-size search-box']) !!}
</h2>
<div class="well advance-search-div collapse">
    <fieldset>
        <legend class="text-center">Advance Search</legend>
        <div class="form-group">
            {!! Form::label('registration', 'Registration:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('registration', @$request['registration'], ['class' => 'form-control', 'placeholder' => 'Enter registration']) !!}
            </div>
            {!! Form::label('brand', 'Brand:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('brand', @$request['brand'], ['class' => 'form-control', 'placeholder' => 'Enter brand']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('model', 'Model:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('model', @$request['model'], ['class' => 'form-control', 'placeholder' => 'Enter model']) !!}
            </div>
            {!! Form::label('variant', 'Variant:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('variant', @$request['variant'], ['class' => 'form-control', 'placeholder' => 'Enter variant']) !!}
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