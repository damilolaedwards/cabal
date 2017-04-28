@extends('homedefault')
@section('title')
    Mycampus | Sign up
@stop
 @section('content')
<div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 jumbotron">
          <p class="lead"> Sign up now</p>
          <p><h5>Fill the form below to get instant access</h5></p>
          <form class="form-vertical" role="form" method="post" action="{{route('Auth.firstsignup')}}">
            <div class="form-group {{ $errors->has('email') ?  ' has-error' : '' }}" >
              <label for="email" class="control-label">Email address</label>
              <input type="email" name="email" class="form-control" id="InputEmail" value="{{ Request::old('email') ?: ''}}" >
               @if($errors->has('email'))
              <span class="help-block">{{$errors->first('email')}}</span>
            @endif
            </div>

            <div class="form-group {{ $errors->has('password') ?  ' has-error' : '' }}">
              <label for="password" class="control-label">Password</label>
              <input type="password" name="password" class="form-control" id="InputPassword" >
               @if($errors->has('password'))
              <span class="help-block">{{$errors->first('password')}}</span>
            @endif
            </div>
            <div class="form-group {{ $errors->has('confirm_password') ?  ' has-error' : '' }}">
              <label for="confirmpassword" class="control-label">Confirm Password</label>
              <input type="password" name="confirm_password" class="form-control" id="confirmpassword">
               @if($errors->has('confirm_password'))
              <span class="help-block">{{$errors->first('confirm_password')}}</span>
            @endif
            </div>
            
            <div class="row">
              
              <div class="col-lg- col-lg-offset-2 col-md-8 col-md-offset-2  col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                <button type="submit" class="btn btn-block btn-primary button first-login">Next</button>
                
                
              </div>
            </div>
           <input type="hidden" name="_token" value="{{Session::token()}}">
          </form>
           <a href="{{route('Auth.login')}}">Already have an account?</a>
        </div>
</div>
         @stop