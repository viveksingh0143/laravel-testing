<fieldset>
    <legend class="text-center">{{ $legend }}</legend>
    <div class="panel panel-primary">
        <div class="panel-heading">Vehicle Information</div>
        <div class="panel-body">
            <div class="form-group">
                {!! Form::label('registration', 'Registration', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('registration', null, ['class' => 'form-control', 'placeholder' => 'Enter Registration']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('brand', 'Brand', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('brand', null, ['class' => 'form-control', 'placeholder' => 'Enter Brand']) !!}
                </div>
                {!! Form::label('model', 'Model', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'Enter Model']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('variant', 'Variant', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('variant', null, ['class' => 'form-control', 'placeholder' => 'Enter Variant']) !!}
                </div>
                {!! Form::label('model_year', 'Model Year', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('model_year', null, ['class' => 'form-control date-year', 'placeholder' => 'Enter Model Year']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('fuel_type', 'Fuel Type', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('fuel_type', ['PETROL' => 'PETROL', 'CNG' => 'CNG', 'LPG' => 'LPG', 'DIESEL' => 'DIESEL', 'ELECTRIC' => 'ELECTRIC', 'HYBRID' => 'HYBRID'], null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::label('colour', 'Colour', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('colour', ['WHITE' => 'WHITE', 'BLACK' => 'BLACK', 'SILVER' => 'SILVER', 'RED' => 'RED', 'BLUE' => 'BLUE', 'GREY' => 'GREY', 'BEIGE' => 'BEIGE', 'BROWN' => 'BROWN', 'GOLD' => 'GOLD', 'YELLOW' => 'YELLOW', 'GREEN' => 'GREEN', 'PURPLE' => 'PURPLE', 'MAROON' => 'MAROON', 'OTHERS' => 'OTHERS'], null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading">Purchase Information</div>
        <div class="panel-body">
            <div class="form-group">
                {!! Form::label('owner', 'Owner Name', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('owner', null, ['class' => 'form-control', 'placeholder' => 'Enter Owner']) !!}
                </div>
                {!! Form::label('owner_id', 'Owner ID', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('owner_id', null, ['class' => 'form-control', 'placeholder' => 'Enter Owner ID']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('seller_name', 'Seller Name', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('seller_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Seller Name']) !!}
                </div>
                {!! Form::label('purchase_date', 'Purchase Date', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('purchase_date', null, ['class' => 'form-control date', 'placeholder' => 'Enter Purchase Date']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('seller_contact', 'Seller Contact', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('seller_contact', null, ['class' => 'form-control', 'placeholder' => 'Enter Seller Contact']) !!}
                </div>
                {!! Form::label('seller_address', 'Seller Address', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::textarea('seller_address', null, ['rows' => 3, 'class' => 'form-control', 'placeholder' => 'Enter Seller Address']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('seller_dealer_name', 'Dealer Name', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('seller_dealer_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Seller Dealer Name']) !!}
                </div>
                {!! Form::label('seller_dealer_contact', 'Dealer Contact', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('seller_dealer_contact', null, ['class' => 'form-control', 'placeholder' => 'Enter Seller Dealer Contact']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('seller_dealer_address', 'Dealer Address', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('seller_dealer_address', null, ['rows' => 3, 'class' => 'form-control', 'placeholder' => 'Enter Seller Dealer Address']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('purchase_amount', 'Purchase', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('purchase_amount', null, ['class' => 'form-control', 'placeholder' => 'Enter Purchase Amount']) !!}
                </div>
                {!! Form::label('expenses', 'Expenses', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('expenses', null, ['class' => 'form-control', 'placeholder' => 'Enter Expenses']) !!}
                </div>
            </div>
        </div>
    </div>


    <div class="panel panel-info">
        <div class="panel-heading">Sold Information</div>
        <div class="panel-body">
            <div class="form-group">
                {!! Form::label('purchaser_name', 'Purchaser Name', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('purchaser_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Purchaser Name']) !!}
                </div>
                {!! Form::label('selling_date', 'Sold Date', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('selling_date', null, ['class' => 'form-control date', 'placeholder' => 'Enter Sold Date']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('purchaser_address', 'Purchaser Address', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::textarea('purchaser_address', null, ['rows' => 3, 'class' => 'form-control', 'placeholder' => 'Enter Purchaser Address']) !!}
                </div>
                {!! Form::label('purchaser_contact', 'Purchaser Contact', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('purchaser_contact', null, ['class' => 'form-control', 'placeholder' => 'Enter Purchaser Contact']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('purchase_dealer_name', 'Dealer Name', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('purchase_dealer_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Purchase Dealer Name']) !!}
                </div>
                {!! Form::label('purchase_dealer_contact', 'Dealer Contact', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('purchase_dealer_contact', null, ['class' => 'form-control', 'placeholder' => 'Enter Purchase Dealer Contact']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('purchase_dealer_address', 'Dealer Address', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('purchase_dealer_address', null, ['rows' => 3, 'class' => 'form-control', 'placeholder' => 'Enter Purchase Dealer Address']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('sold_amount', 'Sold Amount', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('sold_amount', null, ['class' => 'form-control', 'placeholder' => 'Enter Sold Amount']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-warning">
        <div class="panel-heading">Mediator/Transfer Information</div>
        <div class="panel-body">
            <div class="form-group">
                {!! Form::label('transfer_date', 'Transfer Date', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('transfer_date', null, ['class' => 'form-control date', 'placeholder' => 'Enter Transfer Date']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('transfer_mediator', 'RTO Agent Name', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('transfer_mediator', null, ['class' => 'form-control', 'placeholder' => 'Enter Transfer Mediator']) !!}
                </div>
                {!! Form::label('mediator_contact', 'RTO Agent Contact', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('mediator_contact', null, ['class' => 'form-control', 'placeholder' => 'Enter Mediator Contact']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading">Finance Information</div>
        <div class="panel-body">
            <div class="form-group">
                {!! Form::label('finance_bank', 'Bank Name', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('finance_bank', null, ['class' => 'form-control', 'placeholder' => 'Enter Bank Name']) !!}
                </div>
                {!! Form::label('finance_amount', 'Amount (INR)', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('finance_amount', null, ['class' => 'form-control', 'placeholder' => 'Enter Financed Amount']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('finance_contact', 'Contact Person', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('finance_contact', null, ['class' => 'form-control', 'placeholder' => 'Enter Contact Person']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">Related Documents Images</div>
        <div class="panel-body">
            <div class="form-group">
                {!! Form::label('pictures', 'Document Images:', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-5">
                    {!! Form::file('pictures[]', ['multiple' => 'multiple', 'class' => 'form-control', 'placeholder' => 'Select Document Images']) !!}
                </div>
                <div class="col-sm-5">
                    @if(isset($inventory))
                        @foreach($inventory->pictures as $picture)
                            <img src="{{asset('uploads/' . $picture->path)}}" class="img-thumbnail img-responsive" style="max-width: 150px;" />
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit($submit_text, ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-warning" href="{{ $list_link }}"><i class="fa fa-table"></i></a>
        </div>
    </div>
</fieldset>