<div class="container search-pakadge">
    <div class="title2"><h2>Car Finder</h2></div>
    <p align="center">Enter Car Details & get personalized recommendations</p>
    <div class="search-pakadge wow animated fadeInDown">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#used_cars" role="tab" data-toggle="tab">Used Cars</a></li>
            <li role="presentation"><a href="#new_cars" role="tab" data-toggle="tab">New Cars</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="used_cars">
                {!! Form::open(['url' => '/used-vehicle-search', 'method' => 'get', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('bname', 'Brand', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::select('bname[]',  array('' => '') + $brands, null, ['class' => 'form-control brand-search', 'data-placeholder' => 'Select Brand']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('model', 'Model', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::select('model[]', [], null, ['class' => 'form-control model-search', 'data-placeholder' => 'Select Model']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('variant', 'Variant', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::select('variant[]', [], null, ['class' => 'form-control variant-search', 'data-placeholder' => 'Select Variant']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('colour', 'Colour', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::select('colour[]',  array('' => '') + $colours, null, ['class' => 'form-control colour-search', 'data-placeholder' => 'Select Colour']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('price', 'Maximum Budget', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'What is your max Budget?']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('state', 'State', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::select('state[]',  array('' => '') + $states, null, ['class' => 'form-control state-search', 'data-placeholder' => 'Select state']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('city', 'City', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::select('city[]', [], null, ['class' => 'form-control city-search', 'data-placeholder' => 'Select city']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('location', 'Location', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::select('location[]', [], null, ['class' => 'form-control location-search', 'data-placeholder' => 'Select location']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-primary pull-right" style="margin-right:15px">Find Cars</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div role="tabpanel" class="tab-pane" id="new_cars">
                {!! Form::open(['url' => '/new-vehicle-search', 'method' => 'get', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('bname', 'Brand', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::select('bname[]',  array('' => '') + $brands, null, ['class' => 'form-control brand-search1', 'data-placeholder' => 'Select Brand']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('model', 'Model', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::select('model[]', [], null, ['class' => 'form-control model-search1', 'data-placeholder' => 'Select Model']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('variant', 'Variant', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::select('variant[]', [], null, ['class' => 'form-control variant-search1', 'data-placeholder' => 'Select Variant']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('price', 'Maximum Budget', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'What is your max Budget?']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('fuel_type', 'Fuel Type', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::select('fuel_type[]', $fuel_types, null, ['class' => 'form-control fuel-search', 'data-placeholder' => 'Fuel Type']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    {!! Form::label('transmission_type', 'Transmission Type', ['class' => 'container-fluid control-label']) !!}
                    <div class="container-fluid">
                        {!! Form::select('transmission_type[]', $transmission_types, null, ['class' => 'form-control transmission-search', 'data-placeholder' => 'Transmission Type']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-primary pull-right" style="margin-right:15px">Find Cars</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>