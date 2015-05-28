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
            {!! Form::label('id', 'ID:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('id', @$request['id'], ['class' => 'form-control', 'placeholder' => 'Enter ID']) !!}
            </div>
            {!! Form::label('bname', 'Brand Name:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('bname[]', array('' => '') + $brands, @$request['bname'], ['class' => 'form-control brand-remote', 'placeholder' => 'Search your favorite brand...']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('model', 'Model:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('model[]', array('' => '') + $models, @$request['model'], ['class' => 'form-control model-remote', 'data-placeholder' => 'Select Model']) !!}
            </div>
            {!! Form::label('variant', 'Variant:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('variant[]', array('' => '') + $variants, @$request['variant'], ['class' => 'form-control variant-remote', 'data-placeholder' => 'Select Variant']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('price', 'Price:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('price', @$request['price'], ['class' => 'form-control', 'placeholder' => 'Enter price']) !!}
            </div>
            {!! Form::label('status', 'Status:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('status', ['' => 'Select Any', 'ACTIVE' => 'Active', 'IN-ACTIVE' => 'In-Active', 'PENDING-APPROVAL' => 'Pending Approval'], @$request['status'], ['class' => 'form-control']) !!}
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