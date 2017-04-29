@extends('maindefault')
@section('title')
    Mycampus | Disclaimer
@stop
@section('content')
@include('partials.navigation')
<br class=" visible-lg visible-md" />
<div class="row">
<div class="panel panel-default">
  <div class="panel-body playfair">
   <p class="lead">Disclaimer</p>
   <hr/>
   <p>At Mycampus, we respect institutional differences. Articles, pictures, videos, and posts of whatever form uploaded by users solely represents their opinions; members are responsible for whatever they do. Mycampus isn’t a substitute of any institution’s website, neither is it affiliated to any organization.
</p>
  </div>
</div>
</div>
<footer>
@include('partials.footer')
</footer>
@stop