@extends('maindefault')
@section('content')
@include('partials.navigation')
@include('partials.presentation')
<div style="padding-top: 10px;">
 @include('partials.alerts')
 </div>
@include('partials.adverttab')
<footer>
  @include('partials.footer')
  </footer>
@stop