<fieldset>
    <legend class="text-center">{{ $legend }}</legend>
    <div class="form-group">
        {!! Form::label('brand_id', 'Brand:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('brand_id', $brands, null, ['class' => 'form-control', 'placeholder' => 'Select Brand']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('model', 'Model', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'Enter model']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('variant', 'Variant', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('variant', null, ['class' => 'form-control', 'placeholder' => 'Enter variant']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter small description']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('transmission_type', 'Transmission Type', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('transmission_type', ['MANUAL' => 'MANUAL', 'AUTOMATIC' => 'AUTOMATIC'], null, ['class' => 'form-control', 'placeholder' => 'Select transmission type']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('body_type', 'Body Type', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('body_type', ['HATCHBACK' => 'HATCHBACK', 'COUPE' => 'COUPE', 'SUV/MUV' => 'SUV/MUV', 'MINIVAN/VAN' => 'MINIVAN/VAN', 'TRUCK' => 'TRUCK', 'STATION WAGON' => 'STATION WAGON', 'SEDAN' => 'SEDAN', 'CONVERTIBLE' => 'CONVERTIBLE'], null, ['class' => 'form-control', 'placeholder' => 'Select body type']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('fuel_type', 'Fuel Type', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('fuel_type', ['PETROL' => 'PETROL', 'CNG' => 'CNG', 'LPG' => 'LPG', 'DIESEL' => 'DIESEL', 'ELECTRIC' => 'ELECTRIC', 'HYBRID' => 'HYBRID'], null, ['class' => 'form-control', 'placeholder' => 'Select fuel type']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Enter price']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('engine_power', 'Engine Power (BHP)', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('engine_power', null, ['class' => 'form-control', 'placeholder' => 'Enter engine Power']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('seating_capacity', 'Seating Capacity', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('seating_capacity', null, ['class' => 'form-control', 'placeholder' => 'Enter seating capacity']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('drive_type', 'Drive Type', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('drive_type', ['FRONT WHEEL' => 'FRONT WHEEL', 'REAR WHEEL' => 'REAR WHEEL', '4X4/4 WHEEL DRIVE' => '4X4/4 WHEEL DRIVE', '4X2/2 WHEEL DRIVE' => '4X2/2 WHEEL DRIVE'], null, ['class' => 'form-control', 'placeholder' => 'Select drive type']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10">
            <label class="col-sm-2 control-label">Features</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <div class="col-sm-6">
                {!! Form::label('power_windows', 'Power Windows', ['class' => 'col-sm-8 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('power_windows', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                {!! Form::label('abs', 'ABS', ['class' => 'col-sm-8 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('abs', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                {!! Form::label('rear_defogger', 'Rear Defogger', ['class' => 'col-sm-8 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('rear_defogger', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                {!! Form::label('inbuilt_music_system', 'Inbuilt Music System', ['class' => 'col-sm-8 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('inbuilt_music_system', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                {!! Form::label('sunroof_moonroof', 'Sunroof Moonroof', ['class' => 'col-sm-8 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('sunroof_moonroof', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                {!! Form::label('anti_theft_immobilizer', 'Anti Theft Immobilizer', ['class' => 'col-sm-8 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('anti_theft_immobilizer', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                {!! Form::label('steering_mounted_controls', 'Steering Mounted Controls', ['class' => 'col-sm-8 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('steering_mounted_controls', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                {!! Form::label('rear_parking_sensors', 'Rear Parking Sensors', ['class' => 'col-sm-8 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('rear_parking_sensors', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                {!! Form::label('rear_wash_wiper', 'Rear Wash Wiper', ['class' => 'col-sm-8 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('rear_wash_wiper', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                {!! Form::label('seat_upholstery', 'Seat Upholstery', ['class' => 'col-sm-8 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('seat_upholstery', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                {!! Form::label('adjustable_steering', 'Adjustable Steering', ['class' => 'col-sm-8 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('adjustable_steering', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('video_script', 'Video Script:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::textarea('video_script', null, ['class' => 'form-control', 'placeholder' => 'Enter video script', 'rows' => 3]) !!}
        </div>
        <div class="col-sm-5">
            @if(isset($vehicle) && !empty($vehicle->video_script))
                {!! $vehicle->video_script !!}
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('thumbnail', 'Thumbnail Image:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::file('thumbnail', ['class' => 'form-control', 'placeholder' => 'Select Thumbnail Image']) !!}
        </div>
        <div class="col-sm-5">
            @if(isset($vehicle) && isset($vehicle->thumbnail))
                <img src="{{asset('uploads/' . $vehicle->thumbnail)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('brochure', 'Brochure:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::file('brochure', ['class' => 'form-control', 'placeholder' => 'Select brochure']) !!}
        </div>
        <div class="col-sm-5">
            @if(isset($vehicle) && isset($vehicle->brochure))
                <iframe width="100%" src="{{asset('uploads/' . $vehicle->brochure)}}"></iframe>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('pictures', 'Galary Images:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::file('pictures[]', ['multiple' => 'multiple', 'class' => 'form-control', 'placeholder' => 'Select Galary Image']) !!}
        </div>
        <div class="col-sm-5">
            @if(isset($vehicle))
                @foreach($vehicle->pictures as $picture)
                    <img src="{{asset('uploads/' . $picture->path)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                    <a href="{{ route('secure.pictures.destroy', $picture->id) }}"><i class="fa fa-close"></i></a>
                @endforeach
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('status', ['ACTIVE' => 'Active', 'IN-ACTIVE' => 'In-Active', 'PENDING-APPROVAL' => 'Pending Approval'], null, ['class' => 'form-control', 'placeholder' => 'Select Status']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit($submit_text, ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-warning" href="{{ $list_link }}"><i class="fa fa-table"></i></a>
        </div>
    </div>
</fieldset>