@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <div class="well well-sm">
            @include('partials.errors')
	        {!! Form::model($post, ['method' => 'PATCH', 'route' => ['secure.posts.update', $post->id], 'files' => true, 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @include('secure.posts.form', ['legend' => 'Manage Post', 'submit_text' => 'Update Post', 'list_link' => route('secure.posts.index')])
	        {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</div>
@endsection