@extends('maindefault')
@section('title')
    CampusCabal|Advert report
@stop
@section('content')
@include('partials.navigation')
<div class="row">
@include('partials.advertinstitutionheader')
<br/>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="lead">Report Advert</div>
    <p>Which of the rules was broken?</p>
    <form class="form-vertical" role="form" method="post" action="{{route('advert.report')}}" >
    <div class="checkbox">
  <label>
    <input type="checkbox" value="fraud" name="report[]">
    The advert is a scam or fraud
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="wrong_information" name="report[]" >
   The advert contains wrong information/specifications
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="spam" name="report[]" >
   The advert was reposted more than once
  </label>
</div>
 <input type="hidden" value="{{URL::previous()}}" name="reporturl" >
<div class="checkbox">
  <label>
    <input type="checkbox" value="dangerous" name="report[]" >
   Patronizing  may be dangerous
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="antimoral" name="report[]" >
   The advert product promotes contravening against moral standards
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
</form>
  </div>
</div>
</div>
@stop