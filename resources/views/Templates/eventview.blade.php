 @extends('maindefault')
@section('title')
    Mycampus | {{$event->name}} - Event
@stop
@section('metatitle')
{{$event->name}}
@stop
@section('metaimage')
{{asset($event->getEventImage())}}
@stop
@section('content')
@include('partials.navigation')
<div class="row">

        @if(Auth::check() && Auth::user()->institution_id !== $event->institution_id)
          @include('partials.eventinstitutionheader')
          @endif
        <h3 class="text-center text-muted">Campus Events</h3>
        @include('partials.alerts')
        <div class="panel panel-default">
            <div class="panel-body">
            
            
            <div class="row">
            <div class="col-xs-12  col-md-6">
            <span class="label label-primary">Event</span>
            
             <h4>{!! ucfirst(htmlentities($event->name)) !!}</h4>
           <p style="white-space: unset;">
                <img src="{{asset($event->getEventImage())}}" alt="image" class="img-responsive img-rounded" >
                </p> 
              
             @if(($event->eventimage_1 !== NULL && $event->eventimage_2 !== NULL) || ($event->eventimage_1 !== NULL && $event->eventimage_3 !== NULL) || ($event->eventimage_2 !== NULL && $event->eventimage_3 !== NULL))
            
           @endif
             <div id="moreimages">
             @if($event->eventimage_2 !==NULL && $event->eventimage_2 !== $event->getEventImage())
            <p style="white-space: unset;">
             <img src="{{asset($event->getEventImage2())}}" alt="image"  class="img-responsive img-rounded" >
             </p>
             @endif
              @if($event->eventimage_3 !== NULL && $event->eventimage_3 !== $event->getEventImage())
             
            <p style="white-space: unset;">
              <img src="{{asset($event->getEventImage3())}}" alt="image"  class="img-responsive img-rounded" >
              </p>
              @endif
              </div>
              @if($event->eventfile !== NULL)
              <p style="white-space: unset;">
             <img src="{{asset($event->getEventFile())}}"><a href="{{$event->eventfile}}" download="{{substr(stristr($event->eventfile, '-'), 1)}}"> Download {{substr(stristr($event->eventfile, '-'), 1)}}</a>
            </p>
              @endif
              
            </div>

            <div class="col-md-6">
             @if($event->details)
              <h4><p class="lead">Details:</p></h4>
              <p class="text-align panelverdana">{!! str_replace($emotionfaces, $images, Linkify::process(htmlentities($event->details)))!!}</p>

              @else
              <h4><p class="lead">Details:</p></h4>
              <p class="text-align text-muted">Not Available</p>
              @endif
               @if($event->location)
              <h4><p class="lead">Location:</p></h4>
              <p class="text-align">{!! htmlentities($event->location) !!}</p>
               @else
              <h4><p class="lead">Location:</p></h4>
              <p class="text-align text-muted">Not Available</p>
              @endif
               <h4><p class="lead">Date:</p></h4>
              <p class="text-align">{{$event->day}} {{date("F", mktime(0,0,0, $event->month, 1))}} {{$event->year}}</p>
               @if($event->time)
              
              <h4><p class="lead">Time:</p></h4>
              <p class="text-align">{!! htmlentities($event->time) !!}</p>
              @else
              <h4><p class="lead">Time:</p></h4>
              <p class="text-align text-muted">Not Available</p>
              @endif
               <?php
                  $eventlike = 'eventlike'.$event->id;
                  $eventgoing = 'eventgoing'.$event->id;
                  ?>
                 

              <div class="text-center" value="{{$event->id}}">

              
              @if(Auth::check())
              <a onclick="eventlike({{$event->id}})" class="btn btn-primary justify eventlike" data-id="{{$event->id}}" href="#" role="button"><span @if($eventlikecount  !== 0) class="badge" @endif id="{{$eventlike}}">@if($eventlikecount  !== 0) {{$eventlikecount}} @endif</span> Like&nbsp;<i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i></a>
              &nbsp;
              
              <a onclick="eventgoing({{$event->id}})" class="btn btn-primary justify eventgoing" data-id="{{$event->id}}" href="#" role="button"><span @if($eventgoingcount  !== 0) class="badge" @endif id="{{$eventgoing}}">@if($eventgoingcount  !== 0)  {{$eventgoingcount}} @endif </span> Going &nbsp;<i class="fa fa-calendar" aria-hidden="true"></i></a>
              &nbsp;
              @endif
             <a class="btn btn-success justify hidden-md hidden-lg" href="whatsapp://send?text={{$event->name. ' ' .Request::url()}}" data-action="share/whatsapp/share">Share on Whatsapp</a>
               &nbsp;
               @if(Auth::check() && (Auth::user()->id == $event->user_id || Auth::user()->role == 'administrator'))
              <a class="btn btn-info justify" href="{{route('event.edit',['eventId' => $event->id, 'slug' => $event->slug])}}" role="button"><i class="fa fa-pencil-square-o fa-lg"></i> Edit</a>
               &nbsp;
              <a class="btn btn-danger justify" href="{{route('event.delete',['eventId' => $event->id, 'slug' => $event->slug])}}" role="button"><i class="fa fa-trash-o fa-lg"></i> Delete</a>
              @endif
              </div>
             
             
                  <br/>
                  <span class="pull-right clearfix"><small>Posted by&nbsp;<strong><a href="{{ route('profile',['username' => \App\User::find($event->user_id)->username])}}">{{\App\User::find($event->user_id)->username}}</a></strong>&nbsp; {{ $event->created_at->diffForHumans() }}</small></span>
                  <br/>
                  {{--
                  \\the report span removed because it does not render well on mobile view and it is quite not needed yet
                   <span class="pull-right clearfix message_to"><small><strong><a href="{{route('event.report',['eventId' => $event->id, 'slug' => $event->slug])}}">Report</a></strong></small></span>
                   --}}
                  
                  
         
            
            </div>
         
              
          
         
            </div>
          </div>
         </div>
         </div>
         <script type="text/javascript">
            var token = '{{Session::token()}}';
            var urlLike = '{{route('event.like', ['eventId' => $event->id, 'slug' => $event->slug])}}';
            var urlLikeGoing = '{{route('event.going', ['eventId' => $event->id, 'slug' => $event->slug])}}';
          </script>
           <footer>
  @include('partials.footer')
  </footer>
          @stop


