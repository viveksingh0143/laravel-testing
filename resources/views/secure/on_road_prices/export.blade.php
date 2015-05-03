<table class="table table-bordered table-hover table-striped table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Variant</th>
            <th>Extra Variant</th>
            <th>State: </th>
            <th>Ex-Showroom Price: </th>
            <th>Regn. Tax & No. Plate Charges: </th>
            <th>Comp. Insurance with 0% Dep cover: </th>
            <th>Warehouse &amp; Handling Charges: </th>
            <th>Extended Warranty (For 2 Years): </th>
            <th>On Road Price Pre Package</th>
            <th>Body Care Package: </th>
            <th>Essential Accessories Kit: </th>
            <th>On Road Price Post Package</th>
        </tr>
    </thead>
    <tbody>
        @foreach($on_road_prices as $on_road_price)
            <tr>
                <td>{{ $on_road_price->id }}</td>
                <td>{{ $on_road_price->vehicle->bname }}</td>
                <td>{{ $on_road_price->vehicle->model }}</td>
                <td>{{ $on_road_price->vehicle->variant }}</td>
                <td>{{ $on_road_price->type }}</td>
                <td>{{ $on_road_price->state }}</td>
                <td>{{ $on_road_price->ex_show_room_price }}</td>
                <td>{{ $on_road_price->registration_charge }}</td>
                <td>{{ $on_road_price->insurance_charge }}</td>
                <td>{{ $on_road_price->warehouse_charge }}</td>
                <td>{{ $on_road_price->extended_warranty_charge }}</td>
                <td>{{ $on_road_price->prePackageRoadPrice }}</td>
                <td>{{ $on_road_price->body_care_charge }}</td>
                <td>{{ $on_road_price->essential_kit_charge }}</td>
                <td>{{ $on_road_price->postPackageRoadPrice }}</td>
            </tr>
        @endforeach
    </tbody>
</table>




