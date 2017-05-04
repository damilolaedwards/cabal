@extends('maindefault')
@section('title')
   Mycampus | Home
@stop
@section('metatitle')
Mycampus - No.1 Student Online Community | Mycampus
@stop
@section('metaimage')
https://www.mycampus.ng/webcontentimage.jpg
@stop
@section('content')
<br class="visible-lg visible-md" />
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