<fieldset>
    <legend class="text-center">{{ $legend }}</legend>
    <div class="form-group">
        {!! Form::label('slug', 'Slug:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter post slug']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter post title']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('excerpt', 'Excerpt:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'placeholder' => 'Enter post excerpt']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Description:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Enter post body']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('status', ['ACTIVE' => 'Active', 'IN-ACTIVE' => 'In-Active', 'DRAFT' => 'Draft'], null, ['class' => 'form-control', 'placeholder' => 'Select Status']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('thumbnail', 'Thumbnail:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::file('thumbnail', ['class' => 'form-control', 'placeholder' => 'Select Thumbnail Image']) !!}
        </div>
        <div class="col-sm-5">
            @if(isset($post) && isset($post->thumbnail))
                <img src="{{asset('uploads/' . $post->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
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