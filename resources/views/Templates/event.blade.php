@extends('maindefault')
@section('title')
    CampusCabal | Events
@stop
@section('content')
@include('partials.navigation')
<br class=" visible-lg" />
@include('partials.presentation')
<div style="padding-top: 10px;">
 @include('partials.alerts')
 </div>
@include('partials.eventtab')

 <footer>
  @include('partials.footer')
  </footer>

@stop