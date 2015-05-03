@extends('layouts.backend.backend')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}" />
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <div class="well well-sm">
            @include('dealer.partials.errors')
	        {!! Form::model($inventory, ['method' => 'PATCH', 'route' => ['dealer.inventories.update', $inventory->id], 'files' => true, 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @include('dealer.inventories.form', ['legend' => 'Manage Record', 'submit_text' => 'Update Record', 'list_link' => route('dealer.inventories.index')])
	        {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="{{ asset('/plugins/moment/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        $('input.date').datetimepicker({
            'format' : 'DD-MM-YYYY hh:mm A'
        });
    });
</script>
@endsection