@extends('maindefault')
@section('title')
    Mycampus | Marketplace
@stop
@section('content')

@include('partials.navigation')
<br class=" visible-lg" />
{{--

@include('partials.presentation')
--version 1.0
This is the general forum block removed for simplicity
   to be added in version 1.1

--}}
 

 @include('partials.alerts')


@include('partials.adverttab')

 <footer>
  @include('partials.footer')
  </footer>
 
@stop