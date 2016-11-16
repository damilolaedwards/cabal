@extends('maindefault')
@section('content')
<h3>Ooops page not found! Go back <a href="{{route('homepage')}}">home</a></h3>

<img src="{{asset('404error.png')}}" class="img-responsive" alt="Error 404">

@stop