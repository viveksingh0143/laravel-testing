<div class="modal fade" id="search-car-req" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Get the best deal</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'contact-us-best-deal', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('type', 'Guest Query') !!}
                {!! Form::hidden('subject', 'Best deal of this vehicle') !!}

                {!! Form::open(['url' => '/contact-us/get-the-best-deal', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                <div class="container-fluid">
                    <div class="form-group">
                        {!! Form::label('brand', 'Brand', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::select('brand', array('' => '') + $brands, null, ['required' => 'required', 'class' => 'form-control brand-search', 'data-placeholder' => 'Select Brand']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('model', 'Model', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::select('model', [], null, ['class' => 'form-control model-search', 'data-placeholder' => 'Select Model']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('variant', 'Variant', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::select('variant', [], null, ['class' => 'form-control variant-search', 'data-placeholder' => 'Select Variant']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('max_budget', 'Maximum Budget', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('max_budget', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'What is your max Budget?']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('model_year', 'Model Year', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('model_year', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'Preferred Model Year']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Your Name', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('name', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'Your Name']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Your E-Mail', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('email', null, ['pattern' => "[^@]+@[^@]+\.[a-zA-Z]{2,6}", 'required' => 'required', 'class' => 'form-control', 'placeholder' => 'Your E-Mail']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('contact_us', 'Contact No.', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('contact_us', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'Your contact number']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="new-car-req" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Get the best deal</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'contact-us-best-deal', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('type', 'Guest Query') !!}
                {!! Form::hidden('subject', 'Best deal of this vehicle') !!}

                <div class="container-fluid">
                    <div class="form-group">
                        {!! Form::label('brand', 'Brand', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::select('brand', array('' => '') + $brands, null, ['required' => 'required', 'class' => 'form-control brand-search', 'data-placeholder' => 'Select Brand']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('model', 'Model', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::select('model', [], null, ['class' => 'form-control model-search', 'data-placeholder' => 'Select Model']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('variant', 'Variant', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::select('variant', [], null, ['class' => 'form-control variant-search', 'data-placeholder' => 'Select Variant']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('max_budget', 'Maximum Budget', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('max_budget', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'What is your max Budget?']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Your Name', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('name', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'Your Name']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Your E-Mail', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('email', null, ['pattern' => "[^@]+@[^@]+\.[a-zA-Z]{2,6}", 'required' => 'required', 'class' => 'form-control', 'placeholder' => 'Your E-Mail']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('contact_us', 'Contact No.', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('contact_us', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'Your contact number']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="com-car-req" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Get the best deal</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'contact-us-best-deal', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('type', 'Guest Query') !!}
                {!! Form::hidden('subject', 'Best deal of this vehicle') !!}
                <div class="container-fluid">
                    <div class="form-group">
                        {!! Form::label('brand', 'Brand', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::select('brand', array('' => '') + $brands, null, ['required' => 'required', 'class' => 'form-control brand-search', 'data-placeholder' => 'Select Brand']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('model', 'Model', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::select('model', [], null, ['class' => 'form-control model-search', 'data-placeholder' => 'Select Model']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('variant', 'Variant', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::select('variant', [], null, ['class' => 'form-control variant-search', 'data-placeholder' => 'Select Variant']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('max_budget', 'Maximum Budget', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('max_budget', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'What is your max Budget?']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('model_year', 'Model Year', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('model_year', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'Preferred Model Year']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Your Name', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('name', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'Your Name']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Your E-Mail', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('email', null, ['pattern' => "[^@]+@[^@]+\.[a-zA-Z]{2,6}", 'required' => 'required', 'class' => 'form-control', 'placeholder' => 'Your E-Mail']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('contact_us', 'Contact No.', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('contact_us', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'Your contact number']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>