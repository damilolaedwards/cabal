@extends('maindefault')
@section('title')
    CampusCabal|Event report
@stop
@section('content')
@include('partials.navigation')
<div class="row">
@include('partials.eventinstitutionheader')
<br/>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="lead">Report Event</div>
    <p>Which of the rules was broken?</p>
     <form class="form-vertical" role="form" method="post" action="{{route('event.report')}}" >
    <div class="checkbox">
  <label>
    <input type="checkbox" value="fake_event" name="report[]" >
    The event is fake
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="wrong_information" name="report[]" >
   The event contains wrong information
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="spam" name="report[]" >
   The event was reposted more than once
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="dangerous_event" name="report[]" >
    Attending the event may be dangerous
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="date_already_past" name="report[]">
   The date of the event is already past
  </label>
</div>
<hr/>
Additional comments
<div>
<textarea class="form-control" rows="3" name="message"></textarea>
</div>
<br/>
<div class="pull-right">
<button class="btn btn-primary " type="submit">Report</button>
</div>
<input type="hidden" name="_token" value="{{Session::token()}}">
 <input type="hidden" value="{{URL::previous()}}" name="reporturl" >
</form>
  </div>
</div>
</div>
@stop