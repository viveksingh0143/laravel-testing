{!! Form::open(['method' => 'get', 'role' => 'form', 'class' => 'form-horizontal']) !!}
<h2>
    {{ $legend }}
    <a class="btn btn-success" href="{{ $new_link }}"><i class="fa fa-codepen"></i> New</a>
    <a class="btn btn-success advance-search-link" href="#"><i class="fa fa-search"></i> Advance Search</a>
    <a class="btn btn-info" href="{{ route('secure.users.export', $request) }}"><i class="fa fa-export"></i> Export</a>
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
            {!! Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('name', @$request['name'], ['class' => 'form-control', 'placeholder' => 'Enter name']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-Mail:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('email', @$request['email'], ['class' => 'form-control', 'placeholder' => 'Enter email']) !!}
            </div>
            {!! Form::label('role', 'Role:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('role', ['' => 'Any Role', 'ADMIN' => 'Administrator', 'DEALER' => 'Dealer', 'WEB-USER' => 'Web User'], @$request['role'], ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('status', 'Status:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('status', ['' => 'Select Any', 'ACTIVE' => 'Active', 'IN-ACTIVE' => 'In-Active', 'PENDING-APPROVAL' => 'Pending Approval'], @$request['status'], ['class' => 'form-control']) !!}
            </div>
            {!! Form::label('confirmed', 'Confirmed:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('confirmed', ['' => 'Select Any', 'no' => 'No', 'yes' => 'Yes'], @$request['confirmed'], ['class' => 'form-control']) !!}
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