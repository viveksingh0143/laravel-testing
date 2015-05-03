<fieldset>
    <legend class="text-center">{{ $legend }}</legend>
    <div class="form-group">
        {!! Form::label('slug', 'Slug:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter brand slug']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter brand name']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter brand description']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('status', ['ACTIVE' => 'Active', 'IN-ACTIVE' => 'In-Active', 'PENDING-APPROVAL' => 'Pending Approval'], null, ['class' => 'form-control', 'placeholder' => 'Select Status']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('logo', 'Logo:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::file('logo', ['class' => 'form-control', 'placeholder' => 'Select Logo Image']) !!}
        </div>
        <div class="col-sm-5">
            @if(isset($brand) && isset($brand->logo))
                <img src="{{asset('uploads/' . $brand->logo)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit($submit_text, ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-warning" href="{{ $list_link }}"><i class="fa fa-table"></i></a>
        </div>
    </div>
</fieldset>