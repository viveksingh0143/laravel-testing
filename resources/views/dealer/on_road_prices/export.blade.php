<table class="table table-bordered table-hover table-striped table-responsive">
    <thead>
        <tr>
            <th>S.No.</th>
            <th>Carlin/Variant</th>
            <th>Ex-Showroom Price</th>
            <th>Registration Charge</th>
            <th>Insurance Charge</th>
            <th>Warehouse Charge</th>
            <th>Extended Warranty Charge</th>
            <th>On Road Price (Pre Packaged)</th>
            <th>Body Care Charge</th>
            <th>Essential Kit Charge</th>
            <th>On Road Price (Post Packaged)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($on_road_prices as $key => $on_road_price)
            <tr>
                <td>{{ (($on_road_prices->currentPage() - 1) * $on_road_prices->perPage()) + ($key + 1) }}</td>
                <td>{{ $on_road_price->vehicle->brand->name }} {{ $on_road_price->vehicle->model }} {{ $on_road_price->vehicle->variant }} {{ $on_road_price->type }}</td>
                <td>{{ $on_road_price->ex_show_room_price }} INR</td>
                <td>{{ $on_road_price->registration_charge }} INR</td>
                <td>{{ $on_road_price->insurance_charge }} INR</td>
                <td>{{ $on_road_price->warehouse_charge }} INR</td>
                <td>{{ $on_road_price->extended_warranty_charge }} INR</td>
                <td>{{ $on_road_price->prePackageRoadPrice }} INR</td>
                <td>{{ $on_road_price->body_care_charge }} INR</td>
                <td>{{ $on_road_price->essential_kit_charge }} INR</td>
                <td>{{ $on_road_price->postPackageRoadPrice }} INR</td>
            </tr>
        @endforeach
    </tbody>
</table>




