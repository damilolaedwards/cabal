@extends('maindefault')
@section('title')
Mycampus | Search results
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
<div class="row">
<div class="panel panel-default">
  <div class="panel-body">
  <h4>Search results for "{{ Request::input('query') }}"
  </h4>
  @if (!$users->count())
  <p>No result found</p>
  @else
  @foreach ($users as $user)
   @include('partials.searchblock')
   @endforeach
   <div class="text-center">
   {!! $users->appends(Request::only('query'))->render() !!}
   
   </div>
  </div>
</div>
</div>
@endif
@stop