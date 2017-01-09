@extends('maindefault')
@section('title')
    CampusCabal | Generaltopic :: report
@stop
@section('content')
@include('partials.navigation')

<div class="row">
@include('partials.forumheader')

<div class="panel panel-default">
  <div class="panel-body">
    <div class="lead">Report Topic</div>
    <p>Which of the rules was broken?</p>
     <form class="form-vertical" role="form" method="post" action="{{route('generaltopic.report')}}" >
    <div class="checkbox">
  <label>
    <input type="checkbox" value="pornographic_images/links" name="report[]">
    Contains pornographic images or links
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="Insultive/Inciting_words" name="report[]">
    Contains insultive words or words that incite hatred
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="scam/fraud" name="report[]">
    Scam or fraud
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="spam" name="report[]" >
    Spamming
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="reposting_same_content" name="report[]" >
   Posting the same content repeatedly or in wrong places
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