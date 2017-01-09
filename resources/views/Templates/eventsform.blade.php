@extends('maindefault')
@section('title')
    CampusCabal | Create event
@stop
@section('content')
@include('partials.navigation')
<div class="row">
@include('partials.institutionheader')
        <h3 class="text-center">Events</h3>

  <div class="panel panel-default">
    <div class="panel-body">
      <p class="lead">*New Event</p>
      
      <form class="form-vertical" role="form" method="post" action="{{route('event.post')}}" enctype="multipart/form-data">
        <div class="form-group {{ $errors->has('name') ?  ' has-error' : '' }}">
          <label for="eventname" class="control-label">Event name</label>
          <input type="text" class="form-control" id="eventname" name="name" value="{{ Request::old('name') ?: ''}}">
          @if($errors->has('name'))
          <span class="help-block">{{$errors->first('name')}}</span>
          @endif
        </div>
         <label for="details" class="control-label">Details</label>
        
        <div class="panel panel-default">
            <div class="panel-body">
              <?php
              
              $smiliesList = array('smile', 'sad', 'arrow', 'cool', 'cry', 'grin', 'confused', 'bigeyes', 'evil', 'exclaim', 'geek', 'idea', 'lol', 'mad', 'green', 'neutral', 'question', 'happy', 'redface', 'rolleyes', 'surprised', 'devil', 'wink'); 
      for ($i = 0; $i < count($smiliesList); $i++) {
        if ($i % 5 == 0 && $i != 0) echo '</tr><tr>';
        echo '<td><img src="/images/smilies/icon_'.$smiliesList[$i].'.gif " id="addSmiley" alt=":'.$smiliesList[$i].':" /> </td>';
      }?>

            </div>
            
          </div>
        <div class="form-group {{ $errors->has('details') ?  ' has-error' : '' }}">
         
          <textarea class="form-control" rows="5" id="myTextarea" name="details">{{ Request::old('details') ?: ''}}</textarea>
          @if($errors->has('details'))
          <span class="help-block">{{$errors->first('details')}}</span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('location') ?  ' has-error' : '' }}">
          <label for="location" class="control-label">Location</label>
          <input type="text" class="form-control" id="location" name="location" value="{{ Request::old('location') ?: ''}}">
          @if($errors->has('location'))
          <span class="help-block">{{$errors->first('location')}}</span>
          @endif
        </div>
        <label for="date" class="control-label">Date</label>
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
            @for ($year=date('Y'); $year<=date('Y')+10; $year++)
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
        <div class="form-group {{ $errors->has('time') ?  ' has-error' : '' }}">
          <label for="time">Time</label>
          <input type="text" class="form-control" id="time" name="time" value=" {{Request::old('location') ?: ''}}">
           @if($errors->has('year'))
          <span class="help-block">{{$errors->first('time')}}</span>
          @endif
        </div>
        
        
          
          <label for="eventimage1" class="control-label">Add image</label>
          <div class="form-group {{ $errors->has('eventimage_1') ?  ' has-error' : '' }}">
          <input type="file" id="eventimage1"  name="eventimage_1" value="{{ Request::old('eventimage_1') ?: ''}}">
           @if($errors->has('eventimage_1'))
          <span class="help-block">{{$errors->first('eventimage_1')}}</span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('eventimage_2') ?  ' has-error' : '' }}">
          <input type="file" id="eventimage2"  name="eventimage_2" value="{{ Request::old('eventimage_2') ?: ''}}">
          @if($errors->has('eventimage_2'))
          <span class="help-block">{{$errors->first('eventimage_2')}}</span>
          @endif
          </div>
        <div class="form-group {{ $errors->has('eventimage_3') ?  ' has-error' : '' }}">
          <input type="file" id="eventimage3"  name="eventimage_3" value="{{ Request::old('eventimage_3') ?: ''}}">
          <p class="help-block">Images must be in jpg, png or gif format.</p>
          @if($errors->has('eventimage_3'))
          <span class="help-block">{{$errors->first('eventimage_3')}}</span>
          @endif
        </div>
        
          
          <label for="eventfile" class="control-label">File input</label>
           <div class="form-group {{ $errors->has('eventfile') ?  ' has-error' : '' }}">
          <input type="file" id="eventfile"  name="eventfile" value="{{ Request::old('eventfile') ?: ''}}">
          <p class="help-block">Files must be in pdf or docs format.</p>
          @if($errors->has('eventfile'))
          <span class="help-block">{{$errors->first('eventfile')}}</span>
          @endif
        </div>
        
        <button type="submit" class="btn btn-primary pull-right">Submit</button>
        
        <input type="hidden" name="_token" value="{{Session::token()}}">
      </form>
    </div>
  </div>
</div>
@stop