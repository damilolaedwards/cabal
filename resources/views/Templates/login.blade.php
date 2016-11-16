@extends('homedefault')
 @section('content')
 
     <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 jumbotron">
          <p class="lead">Login to CampusCabal</p>
          <form class="form-vertical" role="form" method="post" action="{{route('Auth.login')}}">
            <div class="form-group {{ $errors->has('email') ?  ' has-error' : '' }}" >
              <label for="loginEmail" class="control-label">Email / Username</label>
              <input type="text" class="form-control" id="loginEmail" name="email" value="{{ Request::old('email') ?: ''}}" placeholder="Email or Username"/>
              @if($errors->has('email'))
              <span class="help-block">{{$errors->first('email')}}</span>
            @endif
            </div>
            <div class="form-group {{ $errors->has('password') ?  ' has-error' : '' }}">
              <label for="loginPassword" class="control-label">Password</label>
              <input type="password" class="form-control" id="loginPassword" name="password" value="{{ Request::old('password') ?: ''}}" placeholder="Password" >
               @if($errors->has('password'))
              <span class="help-block">{{$errors->first('password')}}</span>
            @endif
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember" checked="checked">Remember me 
              </label>
            </div>
            
              <div class="row">
              <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2  col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                <button type="submit" class="btn btn-block btn-primary button first-login">Login</button>
                <a class="btn btn-success btn-block " href="{{route('Auth.firstsignup')}}" role="button">Create Account</a>
                
                <br>
                
                
              </div>
        </div>
            
            <input type="hidden" name="_token" value="{{Session::token()}}">
          </form>
          <a href="{{route('password.reset')}}">Forgotten Password?</a>
        </div>
     </div>
      @stop