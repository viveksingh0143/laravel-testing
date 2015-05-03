@extends('layouts.backend.backend')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-6">
	        <div class="panel panel-primary">
                <div class="panel-heading">Vehicle Information</div>
                <div class="panel-body">
                    <table class="table table-striped">
                      <tr><th style="width:250px;">Registration</th><td>{{ $inventory->registration }}</td></tr>
                      <tr><th style="width:250px;">Brand</th><td>{{ $inventory->brand }}</td></tr>
                      <tr><th style="width:250px;">Model</th><td>{{ $inventory->model }}</td></tr>
                      <tr><th style="width:250px;">Variant</th><td>{{ $inventory->variant }}</td></tr>
                      <tr><th style="width:250px;">Model Year</th><td>{{ $inventory->model_year }}</td></tr>
                      <tr><th style="width:250px;">Fuel Type</th><td>{{ $inventory->fuel_type }}</td></tr>
                      <tr><th style="width:250px;">Colour</th><td>{{ $inventory->colour }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">Purchase Information</div>
                <div class="panel-body">
                  <table class="table table-striped">
                    <tr><th style="width:250px;">Owner</th><td>{{ $inventory->owner }}</td></tr>
                    <tr><th style="width:250px;">Owner ID</th><td>{{ $inventory->owner_id }}</td></tr>
                    <tr><th style="width:250px;">Purchase Date</th><td>{{ $inventory->purchase_date }}</td></tr>
                    <tr><th style="width:250px;">Seller Name</th><td>{{ $inventory->seller_name }}</td></tr>
                    <tr><th style="width:250px;">Seller Contact</th><td>{{ $inventory->seller_contact }}</td></tr>
                    <tr><th style="width:250px;">Seller Address</th><td>{{ $inventory->seller_address }}</td></tr>
                    <tr><th style="width:250px;">Dealer Name</th><td>{{ $inventory->seller_dealer_name }}</td></tr>
                    <tr><th style="width:250px;">Dealer Contact</th><td>{{ $inventory->seller_dealer_contact }}</td></tr>
                    <tr><th style="width:250px;">Dealer Address</th><td>{{ $inventory->seller_dealer_address }}</td></tr>
                    <tr><th style="width:250px;">Purchase Amount</th><td>{{ $inventory->purchase_amount }} INR</td></tr>
                    <tr><th style="width:250px;">Expenses Amount</th><td>{{ $inventory->expenses }} INR</td></tr>
                  </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">Sold Information</div>
                <div class="panel-body">
                  <table class="table table-striped">
                    <tr><th style="width:250px;">Sold Date</th><td>{{ $inventory->selling_date }}</td></tr>
                    <tr><th style="width:250px;">Purchaser Name</th><td>{{ $inventory->purchaser_name }}</td></tr>
                    <tr><th style="width:250px;">Purchaser Address</th><td>{{ $inventory->purchaser_address }}</td></tr>
                    <tr><th style="width:250px;">Purchaser Contact</th><td>{{ $inventory->purchaser_contact }}</td></tr>
                    <tr><th style="width:250px;">Dealer Name</th><td>{{ $inventory->purchase_dealer_name }}</td></tr>
                    <tr><th style="width:250px;">Dealer Contact</th><td>{{ $inventory->purchase_dealer_contact }}</td></tr>
                    <tr><th style="width:250px;">Dealer Address</th><td>{{ $inventory->purchase_dealer_address }}</td></tr>
                    <tr><th style="width:250px;">Sold Amount</th><td>{{ $inventory->sold_amount }} INR</td></tr>
                  </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">Mediator/Transfer Information</div>
                <div class="panel-body">
                  <table class="table table-striped">
                    <tr><th style="width:250px;">Transfer Date</th><td>{{ $inventory->transfer_date }}</td></tr>
                    <tr><th style="width:250px;">RTO Agent Name</th><td>{{ $inventory->transfer_mediator }}</td></tr>
                    <tr><th style="width:250px;">RTO Agent Contact</th><td>{{ $inventory->mediator_contact }}</td></tr>
                  </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">Finance Information</div>
                <div class="panel-body">
                  <table class="table table-striped">
                    <tr><th style="width:250px;">Bank Name</th><td>{{ $inventory->finance_bank }}</td></tr>
                    <tr><th style="width:250px;">Contact Person</th><td>{{ $inventory->finance_contact }}</td></tr>
                    <tr><th style="width:250px;">Financed Amount (INR)</th><td>{{ $inventory->finance_amount }}</td></tr>
                  </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">Related Documents Images</div>
                <div class="panel-body">
                  <table class="table table-striped">
                    <tr><th>Caption</th><th>Image</th></tr>
                    @foreach($inventory->pictures as $picture)
                    <tr>
                        <td>{{ $picture->caption }}</td>
                        <td><img src="{{asset('uploads/' . $picture->path)}}" class="img-thumbnail img-responsive" style="max-width: 250px;" /></td>
                    </tr>
                    @endforeach
                  </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Other Information</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr><th style="width:250px;">Created At</th><td>{{ $inventory->created_at }}</td></tr>
                        <tr><th style="width:250px;">Updated At</th><td>{{ $inventory->updated_at }}</td></tr>
                        <tr>
                            <td colspan="2">
                                <ul class="btn-list">
                                    <li><a class="btn btn-primary" href="{{ route('secure.inventories.index') }}"><i class="fa fa-table"></i> Select All</a></li>
                                    <li><a class="btn btn-warning" href="{{ route('secure.inventories.edit', $inventory->id) }}"><i class="fa fa-pencil"></i> Edit</a></li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
	    </div>
	</div>
</div>
@endsection
