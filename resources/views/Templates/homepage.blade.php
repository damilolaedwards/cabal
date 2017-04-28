@extends('maindefault')
@section('title')
   Mycampus | Home
@stop
@section('content')
<br class="visible-lg" />
@include('partials.navigation')
{{--

@include('partials.presentation')
--version 1.0
This is the general forum block removed for simplicity
   to be added in version 1.1

--}}
 


 @include('partials.alerts')
 
@include('partials.toggletabs')
<footer>
  @include('partials.footer')
  </footer>
@stop