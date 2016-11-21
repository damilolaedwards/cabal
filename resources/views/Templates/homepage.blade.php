@extends('maindefault')
@section('content')
<br class="visible-lg" />
@include('partials.navigation')
@include('partials.presentation')

<div style="padding-top: 10px;">
 @include('partials.alerts')
 </div>
@include('partials.toggletabs')
<footer>
  @include('partials.footer')
  </footer>
@stop