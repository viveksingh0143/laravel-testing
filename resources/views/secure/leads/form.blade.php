<fieldset>
    <legend class="text-center">{{ $legend }}</legend>
    <div class="form-group">
        {!! Form::label('type', 'Type:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Enter lead type']) !!}
        </div>
        {!! Form::label('subject', 'Subject:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Enter lead subject']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Query/Request:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Enter query text']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::select('status', ['ACTIVE' => 'Active', 'IN-ACTIVE' => 'In-Active', 'PENDING-APPROVAL' => 'Pending Approval'], null, ['class' => 'form-control', 'placeholder' => 'Select Status']) !!}
        </div>
        {!! Form::label('user_id', 'Attached to User:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::select('user_id', ['-1' => 'All Users'] + $users, null, ['class' => 'form-control', 'placeholder' => 'Attached to user']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit($submit_text, ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-warning" href="{{ $list_link }}"><i class="fa fa-table"></i></a>
        </div>
    </div>
</fieldset>