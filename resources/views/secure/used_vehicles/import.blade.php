@extends('layouts.backend.backend')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="well well-sm">
					@include('flash::message')
					@include('partials.errors')
					{!! Form::open(['route' => ['secure.dealers.used_vehicles.imported', $dealer->id], 'files' => true, 'role' => 'form', 'class' => 'form-horizontal']) !!}
					<fieldset>
						<legend class="text-center">Dealers ({{ $dealer->name }}) Used Vehicles Import</legend>
						<div class="form-group">
							{!! Form::label('excel_file', 'Excel File:', ['required' => 'required', 'class' => 'col-sm-2 control-label']) !!}
							<div class="col-sm-10">
								{!! Form::file('excel_file', ['class' => 'form-control', 'placeholder' => 'Select excel file']) !!}
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								{!! Form::submit('Start Importing', ['class' => 'btn btn-primary']) !!}
							</div>
						</div>
					</fieldset>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection