      @extends('homedefault')
      @section('title')
    CampusCabal | Register
@stop
 @section('content')
   <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 jumbotron">
          <p class="lead">*Personal details</p>
         <form class="form-vertical" role="form" method="post" action="{{route('register')}}">
          <div class="form-group {{ $errors->has('firstname') ?  ' has-error' : '' }}" >
              <label for="firstname" class="control-label">Firstname</label>
              <input type="text" class="form-control" name="firstname" id="firstname" value="{{ Request::old('firstname') ?: ''}}" >
              @if($errors->has('firstname'))
              <span class="help-block">{{$errors->first('firstname')}}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('lastname') ?  ' has-error' : '' }}" >
              <label for="lastname" class="control-label">Lastname</label>
              <input type="text" class="form-control" name="lastname" id="lastname" value="{{ Request::old('lastname') ?: ''}}">
              @if($errors->has('lastname'))
              <span class="help-block">{{$errors->first('lastname')}}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('username') ?  ' has-error' : '' }}" >
              <label for="username" class="control-label">Preferred Username</label>
              <input type="text" class="form-control" name="username" id="username" value="{{ Request::old('username') ?: ''}}">
              @if($errors->has('username'))
              <span class="help-block">{{$errors->first('username')}}</span>
              @endif
            </div>
            <label for="sex">Sex</label>
            <div class="form-group {{ $errors->has('sex') ?  ' has-error' : '' }}" id="sex">
              <label class="radio-inline">
                <input type="radio" name="sex" id="male" value="male" class="radio" <?php if (Request::old('sex')=="male"){ echo 'checked="checked"';} ?> >Male
              </label>
              &nbsp; 
              &nbsp;
              <label class="radio-inline">
                <input type="radio" name="sex" id="female" value="female"  class="radio" <?php if (Request::old('sex')=="female"){ echo 'checked="checked"';} ?> >Female
              </label>
              @if($errors->has('sex'))
              <span class="help-block">{{$errors->first('sex')}}</span>
              @endif
            </div>
            
           
             <label for="birthday" class="control-label">Birthday</label>

            <div class="form-group form-inline {{ $errors->has('day') ?  ' has-error' : '' }} {{ $errors->has('month') ?  ' has-error' : '' }} {{ $errors->has('year') ?  ' has-error' : '' }}"  id="birthday">
              
              <select name="day" class="form-control form-controller" id="day">
                <option class="text-muted">dd</option>
                @for ($day=1; $day<=31; $day++)
                <option value="{{$day}}" @if (old('day') == $day) selected="selected" @endif>{{$day}}</option>
                @endfor
                  
              </select>
              -
              
              <select class="form-control form-controller " name="month">
                <option class="text-muted">mm</option>

                <option value="1" @if (Request::old('month') == '1') selected="selected" @endif>January</option>
                <option value="2" @if (Request::old('month') == '2') selected="selected" @endif>February</option>
                <option value="3" @if (Request::old('month') == '3') selected="selected" @endif>March</option>
                <option value="4" @if (Request::old('month') == '4') selected="selected" @endif>April</option>
                <option value="5" @if (Request::old('month') == '5') selected="selected" @endif>May</option>
                <option value="6" @if (Request::old('month') == '6') selected="selected" @endif>June</option>
                <option value="7" @if (Request::old('month') == '7') selected="selected" @endif>July</option>
                <option value="8" @if (Request::old('month') == '8') selected="selected" @endif>August</option>
                <option value="9" @if (Request::old('month') == '9') selected="selected" @endif>September</option>
                <option value="10" @if (Request::old('month') == '10') selected="selected" @endif>October</option>
                <option value="11" @if (Request::old('month') == '11') selected="selected" @endif>November</option>
                <option value="12" @if (Request::old('month') == '12') selected="selected" @endif>December</option>
              </select>
              -
              <select class="form-control form-controller" name="year">
              <option class="text-muted">yyyy</option>
              @for ($year=date('Y')-10; $year>=1970; $year--)
               <option value="{{$year}}" @if (old('year') == $year) selected="selected" @endif>{{$year}}</option>
               @endfor

               
               
                
               
                
              </select>
             @if($errors->has('day'))
            <span class="help-block">{{$errors->first('day')}}</span>
              @endif
              @if($errors->has('month'))
              <span class="help-block">{{$errors->first('month')}}</span>
              @endif
              @if($errors->has('year'))
              <span class="help-block">{{$errors->first('year')}}</span>
              @endif
            </div>
            
             <label for="institution">Your Institution</label>
            <div class="form-group {{ $errors->has('institution') ?  ' has-error' : '' }}" id="institution" >
              <select class="form-control" name="institution">
             <option>Institution</option>
               @foreach($institutions as $institution)
               
             <option value="{{ $institution->id }}" @if (old('institution') ==$institution->id) selected="selected" @endif>{{$institution->name}}</option>
              @endforeach 
              </select>
              @if($errors->has('institution'))
              <span class="help-block">{{$errors->first('institution')}}</span>
              @endif
            </div>
            <div class="row">
              
              <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3  col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3 first-login">
                <button type="submit" class="btn btn-block btn-primary button ">Get Started</button>
              </div>
            </div>
            <input type="hidden" name="_token" value="{{Session::token()}}">
          </form>
          
        </div>
   </div>
      @stop