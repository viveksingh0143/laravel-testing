@extends('layouts.backend.backend')

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/select2/select2.min.css') }}" />
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('dealer.used_vehicles.vehicle_list_search', ['legend' => 'Vehicle Selection'])
			@include('flash::message')
	        <table class="table table-bordered table-hover table-striped table-responsive">
	            <thead>
                    <tr>
                        <th style="width:90px;">S.No.</th>
                        <th>Brand</th>
                        <th>Model</th>
						<th style="width:120px;">Variant</th>
						<th>Transmission</th>
                        <th>Fuel</th>
                        <th style="width:100px;">Price (INR)</th>
						<th style="width:115px;">Status</th>
						<th class="select-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->id }}</td>
                            <td>{{ $vehicle->brand->name }}</td>
                            <td>{{ $vehicle->model }}</td>
							<td>{{ $vehicle->variant }}</td>
							<td>{{ $vehicle->transmission_type }}</td>
							<td>{{ $vehicle->fuel_type }}</td>
							<td>{{ $vehicle->price }}</td>
							<td>{{ $vehicle->status }}</td>
							<td><a href="{{ route('dealer-area.used_vehicles.create_form', [$vehicle->id]) }}"><i class="fa fa-dot-circle-o"></i> Select</a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="11">
							<div class="pagination-no-margin">{!! $vehicles->appends(@$request)->render() !!}</div>
	                    </th>
	                </tr>
	            </tfoot>
	        </table>
	    </div>
	</div>
</div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
    <script>
	$("select.brand-remote").select2({placeholder: "Select Brand",allowClear: true});
        $("select.model-remote").select2({placeholder: "Select model",allowClear: true});
        $("select.variant-remote").select2({placeholder: "Select variant",allowClear: true});

        $("select.brand-remote").on("change", function(e) {
            var brand = $(this).val();
            $target = $('select.model-remote');
            $target1 = $('select.variant-remote');
            $.ajax({
                type: "GET",
                url:  "/api/models",
                dataType: 'json',
                data: {brand:brand},
                success: function(data) {
                    $target1.find('option').remove();
                    $target.find('option').remove();
                    $target.append($("<option></option>"));
                    $.each(data, function(key, value) {
                         $target.append($("<option></option>").attr("value",key).text(value));
                    });
                    $target.select2({placeholder: "Select model",allowClear: true});
                },
                error: function() {
                    alert("Timeout Error");
                }
            });
        });

        $("select.model-remote").on("change", function(e) {
            var brand = null;
            var model = $(this).val();
            brand = $('select.brand-remote').val();
            $target = $('select.variant-remote');
            $.ajax({
                type: "GET",
                url:  "/api/variants",
                dataType: 'json',
                data: {brand:brand,model:model},
                success: function(data) {
                    $target.find('option').remove();
                    $target.append($("<option></option>"));
                    $.each(data, function(key, value) {
                         $target.append($("<option></option>").attr("value",key).text(value));
                    });
                    $target.select2({placeholder: "Select variant",allowClear: true});
                },
                error: function() {
                    alert("Timeout Error");
                }
            });
        });
    </script>
@endsection