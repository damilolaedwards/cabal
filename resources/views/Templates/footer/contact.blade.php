@extends('maindefault')
@section('content')
@include('partials.navigation')

<div class="row">
@include('partials.alerts')
<div class="panel panel-default">
  <div class="panel-body">
  <blockquote>
  <p class="text-muted"> If you would like to contact us, please do so by filling out the form below. we would try to respond to your message as soon as possible.</p>
  </blockquote>
   <form class="form-vertical" role="form" method="post" action="{{route('contact')}}" enctype="multipart/form-data">
     <div class="form-group">
    <label for="senderemail">Your email address</label>
    <input type="email" name="email" class="form-control" id="senderemail">
  </div>
   <div class="form-group">
    <label for="subject">Subject:</label>
    <input type="text" name="subject" class="form-control" id="subject" >
  </div>
  <div class="form-group">
   <label for="message">Your message</label>
  <textarea class="form-control" name="message" rows="3" id="message"></textarea>
  </div>

  <button class="btn btn-primary pull-right" type="submit">Send message</button>
    <input type="hidden" name="_token" value="{{Session::token()}}">
   </form>
  </div>
</div>
</div>
<footer>
@include('partials.footer')
</footer>
@stop 