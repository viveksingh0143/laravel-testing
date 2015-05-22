<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 filter">
    <div class="filtertip">
        <p class="itineraries-found bold"><b>{{ $used_vehicles->total() }}</b> Results Found</p>
        <div class="tip-arrow" style="bottom: -9px;"></div>
    </div>

    <div class="filter_tip1">
        <h4 class="headline">Make</h4>
        <div class="filter-list">
        @foreach($brands as $brand)
        <div class="checkbox">
            <label>
                {!! Form::checkbox('bname[]', $brand, in_array($brand, (@$request['bname'])? $request['bname'] : [])) !!} {{ $brand }}
            </label>
        </div>
        @endforeach
        </div>


        @if(!empty($models))
        <h4 class="headline">Models</h4>
        <div class="filter-list">
        @foreach($models as $model)
        <div class="checkbox">
            <label>
                {!! Form::checkbox('model[]', $model, in_array($model, (@$request['model'])? $request['model'] : [])) !!} {{ $model }}
            </label>
        </div>
        @endforeach
        </div>
        @endif

        @if(!empty($variants))
        <h4 class="headline">Variant</h4>
        <div class="filter-list">
        @foreach($variants as $variant)
        <div class="checkbox">
            <label>
                {!! Form::checkbox('variant[]', $variant, in_array($variant, (@$request['variant'])? $request['variant'] : [])) !!} {{ $variant }}
            </label>
        </div>
        @endforeach
        </div>
        @endif

        <h4 class="headline">Model Year</h4>
        <div class="filter-list">
        @for ($i = date("Y"); $i > date("Y") - 15; $i--)
        <div class="checkbox">
            <label>
                {!! Form::checkbox('model_year[]', $i, in_array($i, (@$request['model_year'])? $request['model_year'] : [])) !!} {{ $i }}
            </label>
        </div>
        @endfor
        </div>

        <h4 class="headline">Budget</h4>
        <div class="filter-list">
            <div class="radio">
                <label>
                {!! Form::radio('price', '', ('' == @$request['price'])) !!} All
                </label>
            </div>
            <div class="radio">
                <label>
                {!! Form::radio('price', '0-50000', ('0-50000' == @$request['price'])) !!} Less than INR 50,000
                </label>
            </div>
            <div class="radio">
                <label>
                {!! Form::radio('price', '50000-100000', ('50000-100000' == @$request['price'])) !!} INR 50,000 to INR 1,00,000
                </label>
            </div>
            <div class="radio">
                <label>
                {!! Form::radio('price', '100000-200000', ('100000-200000' == @$request['price'])) !!} INR 1,00,000 to INR 2,00,000
                </label>
            </div>
            <div class="radio">
                <label>
                {!! Form::radio('price', '200000-300000', ('200000-300000' == @$request['price'])) !!} INR 2,00,000 to INR 3,00,000
                </label>
            </div>
            <div class="radio">
                <label>
                {!! Form::radio('price', '300000-500000', ('300000-500000' == @$request['price'])) !!} INR 5,00,000 to INR 5,00,000
                </label>
            </div>
            <div class="radio">
                <label>
                {!! Form::radio('price', '500000-50000000', ('500000-50000000' == @$request['price'])) !!} More than INR 5,00,000
                </label>
            </div>
        </div>

        <h4 class="headline">Colour</h4>
        <div class="filter-list">
        @foreach($colours as $colour)
            @if(!empty($colour))
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('colour[]', $colour, in_array($colour, (@$request['colour'])? $request['colour'] : [])) !!} {{ $colour }}
                </label>
            </div>
            @endif
        @endforeach
        </div>

        <h4 class="headline">Transmission Type</h4>
        <div class="filter-list">
        @foreach($transmission_types as $transmission_type)
            @if(!empty($transmission_type))
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('transmission_type[]', $transmission_type, in_array($transmission_type, (@$request['transmission_type'])? $request['transmission_type'] : [])) !!} {{ $transmission_type }}
                </label>
            </div>
            @endif
        @endforeach
        </div>

        @if(!empty($body_types) && count($body_types) > 1)
        <h4 class="headline">Body Type</h4>
        <div class="filter-list">
        @foreach($body_types as $body_type)
            @if(!empty($body_type))
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('body_type[]', $body_type, in_array($body_type, (@$request['body_type'])? $request['body_type'] : [])) !!} {{ $body_type }}
                </label>
            </div>
            @endif
        @endforeach
        </div>
        @endif

        <h4 class="headline">Fuel Type</h4>
        <div class="filter-list">
        @foreach($fuel_types as $fuel_type)
            @if(!empty($fuel_type))
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('fuel_type[]', $fuel_type, in_array($fuel_type, (@$request['fuel_type'])? $request['fuel_type'] : [])) !!} {{ $fuel_type }}
                </label>
            </div>
            @endif
        @endforeach
        </div>

        @if(!empty($drive_types) && count($drive_types) > 1)
        <h4 class="headline">Drive Type</h4>
        <div class="filter-list">
        @foreach($drive_types as $drive_type)
            @if(!empty($drive_type))
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('drive_type[]', $drive_type, in_array($drive_type, (@$request['drive_type'])? $request['drive_type'] : [])) !!} {{ $drive_type }}
                </label>
            </div>
            @endif
        @endforeach
        </div>
        @endif



        <h4 class="headline">State</h4>
        <div class="filter-list">
        @foreach($states as $state)
            @if(!empty($state))
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('state[]', $state, in_array($state, (@$request['state'])? $request['state'] : [])) !!} {{ $state }}
                </label>
            </div>
            @endif
        @endforeach
        </div>

        @if(!empty($cities))
        <h4 class="headline">City</h4>
        <div class="filter-list">
        @foreach($cities as $city)
            @if(!empty($city))
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('city[]', $city, in_array($city, (@$request['city'])? $request['city'] : [])) !!} {{ $city }}
                </label>
            </div>
            @endif
        @endforeach
        </div>
        @endif

        @if(!empty($locations))
        <h4 class="headline">Location</h4>
        <div class="filter-list">
        @foreach($locations as $location)
            @if(!empty($city))
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('location[]', $location, in_array($location, (@$request['location'])? $request['location'] : [])) !!} {{ $location }}
                </label>
            </div>
            @endif
        @endforeach
        </div>
        @endif

        <h4 class="headline">Features</h4>
        <div class="filter-list">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('power_windows', true, @$request['power_windows']) !!} Power Windows
                </label>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('insurance', true, @$request['insurance']) !!} Insurance
                </label>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('abs', true, @$request['abs']) !!} ABS
                </label>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('rear_defogger', true, @$request['rear_defogger']) !!} Rear Defogger
                </label>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('inbuilt_music_system', true, @$request['inbuilt_music_system']) !!} Inbuilt Music System
                </label>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('sunroof_moonroof', true, @$request['sunroof_moonroof']) !!} Sunroof Moonroof
                </label>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('anti_theft_immobilizer', true, @$request['anti_theft_immobilizer']) !!} Anti Theft Immobilizer
                </label>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('steering_mounted_controls', true, @$request['steering_mounted_controls']) !!} Steering Mounted Controls
                </label>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('rear_parking_sensors', true, @$request['rear_parking_sensors']) !!} Rear Parking Sensors
                </label>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('rear_wash_wiper', true, @$request['rear_wash_wiper']) !!} Rear Wash Wiper
                </label>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('seat_upholstery', true, @$request['seat_upholstery']) !!} Seat Upholstery
                </label>
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('adjustable_steering', true, @$request['adjustable_steering']) !!} Adjustable Steering
                </label>
            </div>
        </div>
    </div>
</div>