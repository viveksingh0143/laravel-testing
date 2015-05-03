<!------------------------------------------------------Slider-------------------------------------------->
<div class="container-fluid">
    <div class="row">
        <div class="container-fluid slider_1">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{ asset('/carmazic/img/slider/slide1.jpg') }}" alt="First slide">
                    </div>
                    <div class="item">
                        <img src="{{ asset('/carmazic/img/slider/slide2.jpg') }}" alt="Second slide">

                    </div>
                    <div class="item">
                        <img src="{{ asset('/carmazic/img/slider/slide3.jpg') }}" alt="Third slide">

                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
            <div class="main-text hidden-xs">
                <div class="container-fluid text-center">
                    <h1>Which car do want...</h1>
                    {!! Form::open(['url' => '/used-vehicle-search', 'method' => 'get', 'role' => 'form', 'class' => 'form-inline']) !!}
                    <div class="form-group" style="min-width: 200px;">
                        {!! Form::select('bname[]', array('' => '') + $brands, null, ['class' => 'form-control slider-brand-remote', 'placeholder' => 'Search your favorite Model...']) !!}
                    </div>
                    <div class="form-group" style="min-width: 200px;">
                        {!! Form::select('model[]', [], null, ['class' => 'form-control slider-model-remote', 'placeholder' => 'Search your favorite Model...']) !!}
                    </div>
                    <div class="form-group" style="min-width: 200px;">
                        {!! Form::select('variant[]', [], null, ['class' => 'form-control slider-variant-remote', 'placeholder' => 'Search your favorite Model...']) !!}
                    </div>
                    <div class="form-group" style="min-width: 200px;">
<select id="model_year" name="model_year[]" class="form-control model_year" placeholder="Search Year...">
@for ($i = $current_year; $i > ($current_year - 15); $i--)
<option></option>
    <option value="{{ $i }}">{{ $i }}</option>
@endfor
</select>
                    </div>
                    <button class="btn btn-primary" type="submit">Find Model</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="push">
</div>

<!-------------------------------------------------End of Slider------------------------------------------>
