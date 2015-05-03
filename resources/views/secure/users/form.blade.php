<fieldset>
    <legend class="text-center">{{ $legend }}</legend>
    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter user name']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-Mail:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('email', null, ['type' => 'email', 'class' => 'form-control', 'placeholder' => 'Enter user email']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::password('password', null, ['class' => 'form-control', 'placeholder' => 'Enter password']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Re-Password:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::password('password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('group', 'Role:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('role', $roles, null, ['class' => 'form-control', 'placeholder' => 'Select Role']) !!}
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