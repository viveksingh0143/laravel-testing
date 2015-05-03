<div class="container-fluid">
    <form class="form-horizontal" role="form">
        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <h4>Short by :</h4>
        </div>
        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="container-fluid">
                {!! Form::select('psort', ['' => 'Price', 'asc' => 'Low to High', 'desc' => 'High to Low'], @$request['psort'], ['class' => 'form-control', 'placeholder' => 'Price']) !!}
            </div>
        </div>
        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="container-fluid" id="Duration">
                {!! Form::select('ysort', ['' => 'Manufacturing', 'asc' => 'Oldest', 'desc' => 'Newest'], @$request['ysort'], ['class' => 'form-control', 'placeholder' => 'Manufacturing']) !!}
            </div>
        </div>
        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="container-fluid" id="persons">
                <select class="form-control">
                    <option>Popular</option>
                    <option>Most Popular</option>
                    <option>Bestseller</option>
                </select>
            </div>
        </div>
    </form>
</div>