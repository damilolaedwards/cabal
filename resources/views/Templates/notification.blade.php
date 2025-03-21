@extends('maindefault')
@section('title')
Mycampus | Notifications
@stop
@section('metatitle')
Mycampus - No.1 Student Online Community | Mycampus
@stop
@section('metaimage')
https://www.mycampus.ng/webcontentimage.jpg
@stop
@section('content')
@include('partials.notificationactivenavigation')
<br class="visible-lg visible-md" />
<div class="row">
<div class="panel panel-default">
          <div class="panel-heading">
          <h3 class="panel-title">Notifications</h3>
          </div>
  <div class="panel-body">
          @if  (!$requests->count())
           <h4><small>No Notifications yet</small></h4>
            @else
           
            @foreach ($requests as $user)
            @include('partials.usernotificationblock')
        @endforeach
       @endif
       <div class="text-center">
{{$requests->render()}}
</div>
          </div>
       </div>
        </div>
       
@stop




