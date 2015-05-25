@extends('layouts.frontend.frontend')

@section('content')
<div class="modal-dialog margin-navbar agent-login-modal">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Agent Login</h4>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-xs-12 col-sm-6">
                  <div class="well">
                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                              <strong>Whoops!</strong> There were some problems with your input.<br><br>
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif

                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">
                              <label for="username" class="control-label">E-Mail Address</label>
                              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required="" title="Please enter you email" placeholder="example@gmail.com">
                              <span class="help-block"></span>
                          </div>
                          <div class="form-group">
                              <label for="password" class="control-label">Password</label>
                              <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                              <span class="help-block"></span>
                          </div>
                          <div class="checkbox">
                              <label>
                                  <input type="checkbox" name="remember"> Remember Me
                              </label>
                              <p class="help-block">(if this is a private computer)</p>
                          </div>
                          <button type="submit" class="btn btn-success btn-block">Login</button>
                          <a class="btn btn-default btn-block" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                      </form>
                  </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                  <p class="lead">Register Now</p>
                  <ul class="list-unstyled" style="line-height: 2">
                      <li><span class="fa fa-check text-success"></span> See all your orders</li>
                      <li><span class="fa fa-check text-success"></span> Fast re-order</li>
                      <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                      <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                      <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                      <li><a href="/read-more/"><u>Read more</u></a></li>
                  </ul>
                  <p><a href="{{ url('/auth/dealer-register') }}" class="btn btn-info btn-block">Yes please, register now!</a></p>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection