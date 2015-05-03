{!! Form::open(['method' => 'get', 'role' => 'form', 'class' => 'form-horizontal']) !!}
<h2>
    {{ $legend }}
    <a class="btn btn-success" href="{{ $new_link }}"><i class="fa fa-codepen"></i> New</a>
    <a class="btn btn-success advance-search-link" href="#"><i class="fa fa-search"></i> Advance Search</a>
    <a class="btn btn-info" href="{{ route('secure.dealers.export', $request) }}"><i class="fa fa-export"></i> Export</a>
    <a class="btn btn-warning" href="{{ route('secure.dealers.import', $request) }}"><i class="fa fa-export"></i> Import</a>
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
            {!! Form::label('name', 'Company Name:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('name', @$request['name'], ['class' => 'form-control', 'placeholder' => 'Enter company name']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-Mail:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('email', @$request['email'], ['type' => 'email', 'class' => 'form-control', 'placeholder' => 'Enter dealer email']) !!}
            </div>
            {!! Form::label('contact_person', 'Contact Person:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('contact_person', @$request['contact_person'], ['class' => 'form-control', 'placeholder' => 'Enter contact person name']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('state', 'State:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('state', @$request['state'], ['class' => 'form-control', 'placeholder' => 'Enter state']) !!}
            </div>
            {!! Form::label('city', 'City:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('city', @$request['city'], ['class' => 'form-control', 'placeholder' => 'Enter city']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('location', 'Location:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('location', @$request['location'], ['class' => 'form-control', 'placeholder' => 'Enter location']) !!}
            </div>
            {!! Form::label('pincode', 'Pincode:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('pincode', @$request['pincode'], ['class' => 'form-control', 'placeholder' => 'Enter Pincode']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('status', 'Status:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('status', ['' => 'Select Any', 'ACTIVE' => 'Active', 'IN-ACTIVE' => 'In-Active', 'PENDING-APPROVAL' => 'Pending Approval'], @$request['status'], ['class' => 'form-control', 'placeholder' => 'Select Status']) !!}
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