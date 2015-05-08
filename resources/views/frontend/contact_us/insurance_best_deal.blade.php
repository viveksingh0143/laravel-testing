@extends('layouts.frontend.frontend')

@section('content')
    <div class="container base-container">
        <div class="hpadding50c">
            <div class="container-fluid">
                <div class="col-sm-12 col-xs-12 wow flipInX animated animated" data-wow-duration="2.0s" style="visibility: visible; -webkit-animation: flipInX 2.0s;">
                    <p class="size30 slim">Get the insurance done</p>
                </div>
            </div>
            <p class="aboutarrow"></p>
        </div>

        <div class="line4"></div>

        <div class="container-fluid form_insurance">
          {!! Form::open(['route' => 'contact-us-best-deal', 'role' => 'form', 'id' => 'insurance-form', 'class' => 'form-horizontal']) !!}
          {!! Form::hidden('type', 'Guest Query') !!}
          {!! Form::hidden('subject', 'Need insurance of this vehicle') !!}

          <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
              <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p><i class="fa fa-car"></i> About Your Private Car</p>
              </div>
              <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><i class="fa fa-street-view"></i> About You</p>
              </div>
              <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><i class="fa fa-key"></i> About Your Car</p>
              </div>
            </div>
          </div>
          <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
              <div class="col-md-12">
                <div class="tittle-line">
                  <h4>About Your Private Car</h4>
                  <div class="divider-1 small">
                    <div class="divider-small"></div>
                  </div>
                </div>
                <div class="container-fluid padding_bottom">
                  <div class="form-group">
                    <label class="control-label col-sm-4">You are looking to</label>
                    <div class="col-sm-8">
                      <div class="radio">
                        <label>
                          <input required="required" type="radio" name="Looking For" value="Buy insurance for new car" >
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          Buy insurance for new car
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input required="required" type="radio" name="Looking For" value="Renew your car insurance">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          Renew your car insurance
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="container-fluid form-gp">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Which Car do you drive</label>
                    <div class="col-sm-8 input-group">
                      <input name="Car (Brand)" maxlength="100" type="text" class="form-control" placeholder="Please enter your car Brand" />
                       <span class="input-group-addon"><i class="fa fa-car"></i></span>
                    </div>
                  </div>
                </div>
                <div class="container-fluid form-gp padding_bottom">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Select the Fuel you fill</label>
                    <div class="col-sm-8">
                      <div class="radio">
                        <label>
                          <input name="Fuel Used" type="radio" name="02" value="Petrol">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          Petrol
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input name="Fuel Used" type="radio" name="02" value="Diesel">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          Diesel
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input name="Fuel Used" type="radio" name="02" value="CNG">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          CNG
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input name="Fuel Used" type="radio" name="02" value="CNG/Petrol">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          CNG/Petrol
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="container-fluid form-gp padding_bottom">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Is a CNG / LPG Kit fitted in your Car?</label>
                    <div class="col-sm-8">
                      <div class="radio">
                        <label>
                          <input name="CNG/LPG Fitted" type="radio" class="cng_kit" value="Yes">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input name="CNG/LPG Fitted" type="radio" class="cng_kit" value="No">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          No
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="hide_kit box">
                  <div class="container-fluid form-gp padding_bottom">
                    <div class="form-group">
                      <label class="control-label col-sm-4"></label>
                      <div class="col-sm-8">
                        <div class="radio">
                          <label>
                            <input type="radio" name="CNG/LPG Fitted By" class="cng_fitted" value="Company Fitted">
                            <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                            Company fitted
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="CNG/LPG Fitted By" class="cng_fitted" value="Externally Fitted">
                            <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                            Externally fitted
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="hide_kit_cost box_fitted">
                  <div class="container-fluid form-gp">
                    <div class="form-group">
                      <label class="control-label col-sm-4">Cost of Externally fitted Kit</label>
                      <div class="col-sm-8 input-group">
                        <input name="Cost of externally fitted kit" type="text" class="form-control" placeholder="Who much you pay for Externally fitted Kit" />
                         <span class="input-group-addon"><i class="fa fa-car"></i></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="container-fluid form-gp">
                  <div class="form-group">
                    <label class="control-label col-sm-4">What is your Car Registration Number?</label>
                    <div class="col-sm-8 input-group">
                      <input name="Car Registration Number" maxlength="100" type="text" class="form-control" placeholder="Car Registration Number" />
                       <span class="input-group-addon"><i class="fa fa-building"></i></span>
                    </div>
                  </div>
                </div>

                <div class="col-md-8 col-md-offset-4">
                  <button class="nextBtn hvr-bounce-to-right" type="button" >Next</button>
                </div>
              </div>
            </div>
          </div>
          <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
              <div class="col-md-12">
                <div class="tittle-line">
                  <h4>About You</h4>
                  <div class="divider-1 small">
                    <div class="divider-small"></div>
                  </div>
                </div>
                <div class="container-fluid">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Your Name</label>
                    <div class="col-sm-8 input-group">
                      <input name="Customer name" maxlength="100" type="text" class="form-control" placeholder="Your Name" />
                       <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                    </div>
                  </div>
                </div>
                <div class="container-fluid form-gp">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Your Mobile No</label>
                    <div class="col-sm-8 input-group">
                      <input name="Customer Mobile Number" maxlength="100" type="text" class="form-control" placeholder="Mobile No" />
                       <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    </div>
                  </div>
                </div>
                <div class="container-fluid form-gp">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Your Email id</label>
                    <div class="col-sm-8 input-group">
                      <input name="email" type="email" class="form-control" placeholder="Email id" />
                       <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                    </div>
                  </div>
                </div>
                <div class="container-fluid form-gp">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Your DOB</label>
                    <div class="col-sm-8 input-group">
                      <input name="Customer DOB" type="date" class="form-control" placeholder="Email id" />
                       <span class="input-group-addon"><i class="fa fa-child"></i></span>
                    </div>
                  </div>
                </div>

                <div class="container-fluid form-gp padding_bottom">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Gender</label>
                    <div class="col-sm-8">
                      <div class="radio">
                        <label>
                          <input name="Customer Gender" type="radio" value="Male">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          Male
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="Customer Gender" value="Femail">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          Female
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="container-fluid form-gp padding_bottom">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Marital Status</label>
                    <div class="col-sm-8">
                      <div class="radio">
                        <label>
                          <input type="radio" name="Marital Status" value="Single">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          Single
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="Marital Status" value="Married">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          Married
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="container-fluid form-gp">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Your City of Residence</label>
                    <div class="col-sm-8 input-group">
                      <input name="Customer City" maxlength="100" type="text" class="form-control" placeholder="Your City" />
                       <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    </div>
                  </div>
                </div>

                <div class="container-fluid form-gp">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Annual Income</label>
                    <div class="col-sm-8 input-group">
                       <select name="Customer Income" class="form-control">
                        <option value="1">upto 3 lakhs</option>
                        <option selected="selected" value="2">3 - 5 lakhs</option>
                        <option value="3">5 - 7 lakhs</option>
                        <option value="4">7 - 10 lakhs</option>
                        <option value="5">10 - 15 lakhs</option>
                        <option value="6">15 lakhs +</option>
                      </select>
                      <span class="input-group-addon"><i class="fa fa-money"></i></span>
                    </div>
                  </div>
                </div>

                <div class="col-md-8 col-md-offset-4">
                  <button class="nextBtn hvr-bounce-to-right" type="button" >Next</button>
                </div>
              </div>
            </div>
          </div>


          <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
              <div class="col-md-12">
                <div class="tittle-line">
                  <h4>About Your Car</h4>
                  <div class="divider-1 small">
                    <div class="divider-small"></div>
                  </div>
                </div>
                <div class="container-fluid">
                  <div class="form-group">
                    <label class="control-label col-sm-5">Tell us the car Variant</label>
                    <div class="col-sm-7 input-group">
                        <input name="Car Variant" type="text" class="form-control" />
                        <span class="input-group-addon"><i class="fa fa-car"></i></span>
                    </div>
                  </div>
                </div>

                <div class="container-fluid form-gp padding_bottom">
                  <div class="form-group">
                    <label class="control-label col-sm-5">Who will be the vehicle owner mentioned on the Car RC?</label>
                    <div class="col-sm-7">
                      <div class="radio">
                        <label>
                          <input type="radio" name="Car Owner" class="rcowner" value="Self Owned">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          You
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="Car Owner" class="rcowner" value="Someone Else">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          Someone else
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="Car Owner" class="rcowner" value="Company Owner">
                          <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                          Your Company
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="hide_kit_owner_1 box_owner">
                  <div class="container-fluid form-gp">
                    <div class="form-group">
                      <label class="control-label col-sm-5">Who will be the vehicle owner mentioned on the Car RC?</label>
                      <div class="col-sm-7 input-group">
                        <input name="Owner in RC" maxlength="100" type="text" class="form-control" placeholder="Your Name" />
                        <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                      </div>
                    </div>
                  </div>

                  <div class="container-fluid form-gp">
                    <div class="form-group">
                      <label class="control-label col-sm-5">In which year was the car first registered?</label>
                      <div class="col-sm-7 input-group">
                        <input name="Car Registered Year" type="number" class="form-control" placeholder="Enter Year" />
                         <span class="input-group-addon"><i class="fa fa-child"></i></span>
                      </div>
                    </div>
                  </div>

                  <div class="container-fluid form-gp padding_bottom">
                    <div class="form-group">
                      <label class="control-label col-sm-5">Do you want to transfer any NCB from a previous car to this one?</label>
                      <div class="col-sm-7">
                        <div class="radio">
                          <label>
                            <input type="radio" name="Transfer Any NCB" class="transfer_ncb" value="Yes">
                            <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                            Yes
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="Transfer Any NCB" class="transfer_ncb" value="No">
                            <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                            No
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="hide_kit_ncb box_ncb">
                    <div class="container-fluid form-gp padding_bottom">
                      <div class="form-group">
                        <label class="control-label col-sm-5">How much NCB did your Previous Car have?</label>
                        <div class="col-sm-7">
                          <div class="radio">
                            <label>
                              <input type="radio" name="Previous NCB" value="20%">
                              <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                              20 %
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Previous NCB" value="25%">
                              <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                              25 %
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Previous NCB" value="35%">
                              <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                              35 %
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Previous NCB" value="45%">
                              <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                              45 %
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Previous NCB" value="50%">
                              <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                              50 %
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Previous NCB" value="65%">
                              <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                              65 %
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="container-fluid form-gp">
                    <div class="form-group">
                      <label class="control-label col-sm-5">When will your policy start from?</label>
                      <div class="col-sm-7 input-group">
                        <input name="Policy Starts From" type="date" class="form-control" placeholder="Email id" />
                         <span class="input-group-addon"><i class="fa fa-child"></i></span>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="hide_kit_owner_2 box_owner">
                  <div class="container-fluid form-gp">
                    <div class="form-group">
                      <label class="control-label col-sm-5">When will your policy start from?</label>
                      <div class="col-sm-7 input-group">
                        <input type="date" class="form-control" placeholder="Email id" />
                         <span class="input-group-addon"><i class="fa fa-child"></i></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-7 col-md-offset-5">
                  <button class="hvr-bounce-to-right" type="submit">Finish!</button>
                </div>
              </div>
          </div>
          {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('header')
<style>
/* CSS Document */

.form_insurance{
margin-top: 18px;
padding: 30px 18px;
background-color: #f9f9f9;
}
.form-gp{
border-top: 1px solid #eaeaea;
}
.padding_bottom{
padding-bottom: 18px;
}

.form-group {
  padding: 18px 0px;
  margin-bottom: 0px;
}
.form-control {
  border-radius: 0px;
}
.input-group-addon {
  padding: 6px 20px;
  border-radius: 0px;
}
label.control-label {
  text-align: right;
  font-size: 17px;
  font-variant: small-caps;
}
.box{
        display: none;
    }
.box_fitted{
display: none;
}
.box_owner_1{
display: none;
}
.box_owner{
display: none;
}
.box_ncb{
display: none;
}
form {
  padding: 36px;
  font-variant: small-caps;
  background: #ffffff;
}

.tittle-line {
  margin-bottom: 33px;
    font-variant: small-caps;
}
.tittle-line>h4{
font-size: 21px;
}
.divider-1.small {
  margin-bottom: -1px;
}
.divider-1 {
  width: 100%;
  height: 2px;
  background-color: #e1e1e1;
}
.divider-small {
  width: 94px;
  height: 2px;
  margin-bottom: -1px;
  background-color: #0094ff;
}


.stepwizard-step p {
    margin-top: 10px;
	font-variant: small-caps;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
	padding-bottom: 18px;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 0px;
}

.checkbox label:after,
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
}

.radio .cr {
	color: #0094ff;
    border-radius: 50%;
}

.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}

.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}

.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}

.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}

.checkbox label input[type="checkbox"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
}
.checkbox label, .radio label {
  padding-left: 0px;
}
.checkbox, .radio {
	  margin-top: 4px;
  display: inline;
  padding-right: 18px;
}


.input-group[class*=col-] {
  float: none;
  padding-right: 15px;
  padding-left: 15px;
}

.input-group-addon:last-child {
  background: #0094ff;
  border: #0094ff;
  color: #FFFFFF;
  border-left: 0;
}




.hvr-bounce-to-right {
	margin: 18px 0px;
	color: #0094ff;
	text-decoration: none;
	border: 2px solid #0094ff;
	padding: 9px 33px;
	background: transparent;
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -moz-osx-font-smoothing: grayscale;
  position: relative;
  -webkit-transition-property: color;
  transition-property: color;
  -webkit-transition-duration: 0.5s;
  transition-duration: 0.5s;
}
.hvr-bounce-to-right:before {
  content: "";
  position: absolute;
  z-index: -1;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #0094ff;
  -webkit-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transform-origin: 0 50%;
  transform-origin: 0 50%;
  -webkit-transition-property: transform;
  transition-property: transform;
  -webkit-transition-duration: 0.5s;
  transition-duration: 0.5s;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.hvr-bounce-to-right:hover, .hvr-bounce-to-right:focus, .hvr-bounce-to-right:active {
	text-decoration: none;
  color: white;
  border: 2px solid #0094ff;
}
.hvr-bounce-to-right:hover:before, .hvr-bounce-to-right:focus:before, .hvr-bounce-to-right:active:before {

  -webkit-transform: scaleX(1);
  transform: scaleX(1);
  -webkit-transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
  transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
}
</style>
@endsection

@section('footer')
    <script>
    // JavaScript Document

    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),$item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });


    $(document).ready(function(){
            $("input.cng_kit").click(function(){
                if($(this).attr("value")=="Yes"){
                    $(".box").hide();
                    $(".hide_kit").show();
                }
    			if($(this).attr("value")=="No"){
                    $(".box").show();
                    $(".hide_kit").hide();
                }
            });

            $("input.cng_fitted").click(function(){
                if($(this).attr("value")=="Externally Fitted"){
                    $(".box_fitted").hide();
                    $(".hide_kit_cost").show();
                }
    			if($(this).attr("value")=="Company Fitted"){
                    $(".box_fitted").show();
                    $(".hide_kit_cost").hide();
                }
            });

    		$("input.rcowner").click(function(){
                if($(this).attr("value")=="Self Owned"){
                    $(".box_owner").hide();
                    $(".hide_kit_owner_1").show();
                } else if($(this).attr("value")=="Someone Else"){
    				$(".hide_kit_owner_2").show();
                    $(".box_owner").hide();
                } else if($(this).attr("value")=="Company Owner"){
                    $(".hide_kit_owner_2").show();
                    $(".box_owner").hide();
                }
            });

    		$("input.transfer_ncb").click(function(){
                if($(this).attr("value")=="Yes"){
                    $(".box_ncb").hide();
                    $(".hide_kit_ncb").show();
                }
    			else if($(this).attr("value")=="No"){
                    $(".box_ncb").show();
                    $(".hide_kit_ncb").hide();
                }
            });

        });
    </script>
@endsection