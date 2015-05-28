@extends('layouts.backend.backend')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/select2/select2.min.css') }}" />
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        @include('dealer.used_vehicles.search', ['legend' => 'Used Vehicles Search'])
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
						<th style="width:120px;">Year</th>
						<th style="width:120px;">Colour</th>
						<th style="width:100px;">Price (INR)</th>
						<th>Dealer</th>
						<th>Contact Number</th>
						<th class="view-action"></th>
                    </tr>
	            </thead>
	            <tbody>
	                @foreach($used_vehicles as $key => $used_vehicle)
                        <tr>
							<td>{{ (($used_vehicles->currentPage() - 1) * $used_vehicles->perPage()) + ($key + 1) }}</td>
                            <td>{{ $used_vehicle->vehicle->bname }}</td>
                            <td>{{ $used_vehicle->vehicle->model }}</td>
							<td>{{ $used_vehicle->vehicle->variant }}</td>
							<td>{{ $used_vehicle->transmission_type }}</td>
							<td>{{ $used_vehicle->fuel_type }}</td>
							<td>{{ $used_vehicle->model_year }}</td>
							<td>{{ $used_vehicle->colour }}</td>
							<td>{{ $used_vehicle->price }}</td>
							<td><a target="_blank" href="{{ route('dealer-page', $used_vehicle->dealer->slug) }}">{{ $used_vehicle->dealer->name }}</a></td>
							<td>{{ $used_vehicle->dealer->mobile_number }}/{{ $used_vehicle->dealer->office_number }}</td>
							<td><a target="_blank" href="{{ route('used-vehicle-details', [$used_vehicle->id, Str::slug($used_vehicle->vehicle->bname . ' ' . $used_vehicle->vehicle->model . ' ' . $used_vehicle->vehicle->variant)]) }}"><i class="fa fa-eye"></i> View </a></td>
                        </tr>
	                @endforeach
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th colspan="12">
							<div class="pagination-no-margin">{!! $used_vehicles->appends(@$request)->render() !!}</div>
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
        $("select.city-remote").select2({placeholder: "Select city",allowClear: true});
        $("select.location-remote").select2({placeholder: "Select city",allowClear: true});
        $("select#model_year").select2({placeholder: "Select Model Year",allowClear: true});
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

        $("select.city-remote").on("change", function(e) {
            var city = $(this).val();
            $target = $('select.location-remote');
            $.ajax({
                type: "GET",
                url:  "/api/locations",
                dataType: 'json',
                data: {city:city},
                success: function(data) {
                    $target.find('option').remove();
                    $target.append($("<option></option>"));
                    $.each(data, function(key, value) {
                         $target.append($("<option></option>").attr("value",key).text(value));
                    });
                    $target.select2({placeholder: "Select location",allowClear: true});
                },
                error: function() {
                    alert("Timeout Error");
                }
            });
        });
    </script>
@endsection