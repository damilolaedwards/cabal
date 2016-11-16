@extends('homedefault')
 @section('content')
<div class="row" >
       
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 ">
          <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Reset Password</h3>
  </div>
  <div class="panel-body">
  @if (session('status'))
<div class="alert alert-info">
  {{ session('status') }}
</div>
  @endif
          <form class="form-vertical" role="form" method="post" action="{{route('password.reset')}}">
            <div class="form-group {{ $errors->has('email') ?  ' has-error' : '' }}" >
              <label for="loginEmail" class="control-label">Enter Email address</label>
              <input type="email" class="form-control" id="loginEmail" name="email" value="{{ Request::old('email') ?: ''}}" >
              @if($errors->has('email'))
              <span class="help-block">{{$errors->first('email')}}</span>
            @endif
            </div>
            
            <div class="row">
              
              <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2  col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                <button type="submit" class="btn btn-block btn-primary button first-login">Send password reset email</button>
               
                
                <br>
                
                
              </div>
            </div>
            
            <input type="hidden" name="_token" value="{{Session::token()}}">
          </form>
         
        </div>
      </div>
      </div>
      </div>
      @stop