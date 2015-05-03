@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <div class="well well-sm">
            @include('partials.errors')
	        {!! Form::open(['route' => 'secure.pages.store', 'files' => true, 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @include('secure.pages.form', ['legend' => 'Manage Page', 'submit_text' => 'Add Page', 'list_link' => route('secure.pages.index')])
	        {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</div>
@endsection