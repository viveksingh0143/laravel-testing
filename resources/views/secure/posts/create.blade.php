@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <div class="well well-sm">
            @include('partials.errors')
	        {!! Form::open(['route' => 'secure.posts.store', 'files' => true, 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @include('secure.posts.form', ['legend' => 'Manage Post', 'submit_text' => 'Add Post', 'list_link' => route('secure.posts.index')])
	        {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</div>
@endsection