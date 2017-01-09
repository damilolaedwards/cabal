 @extends('maindefault')
@section('title')
    CampusCabal | {{$event->name}} - Event
@stop
@section('content')
@include('partials.navigation')
<div class="row">

        @if(Auth::user()->institution_id !== $event->institution_id)
          @include('partials.eventinstitutionheader')
          @endif
        <h3 class="text-center text-muted">Campus Events</h3>
        @include('partials.alerts')
        <div class="panel panel-default">
            <div class="panel-body">
            
            
            <div class="row">
            <div class="col-xs-12  col-md-6">
            <span class="label label-primary">Event</span>
            
             <h4>{!! ucfirst(strtolower(htmlentities($event->name))) !!}</h4>
           <p>
                <img src="{{asset($event->getEventImage())}}" alt="image" width="320" height="240" class="img-responsive img-rounded" style="max-width: unset;">
                </p> 
              @if($event->eventfile !== NULL)
              <p>
             <img src="{{asset($event->getEventFile())}}"><a href="{{substr(stristr($event->eventfile, '-'), 1)}}" download="{{substr(stristr($event->eventfile, '-'), 1)}}"> Download {{substr(stristr($event->eventfile, '-'), 1)}}</a>
            </p>
              @endif
             @if(($event->eventimage_1 !== NULL && $event->eventimage_2 !== NULL) || ($event->eventimage_1 !== NULL && $event->eventimage_3 !== NULL) || ($event->eventimage_2 !== NULL && $event->eventimage_3 !== NULL))
            
           @endif
             <div id="moreimages">
             @if($event->eventimage_2 !==NULL && $event->eventimage_2 !== $event->getEventImage())
            <p>
             <img src="{{asset($event->getEventImage2())}}" alt="image" width="320" height="240" class="img-responsive img-rounded" style="max-width: unset;">
             </p>
             @endif
              @if($event->eventimage_3 !== NULL && $event->eventimage_3 !== $event->getEventImage())
             
            <p>
              <img src="{{asset($event->getEventImage3())}}" alt="image" width="320" height="240" class="img-responsive img-rounded" style="max-width: unset;">
              </p>
              @endif
              </div>
            </div>

            <div class="col-md-6">
             @if($event->details)
              <p class="lead">Details:</p>
              <p class="text-align">{!! str_replace($emotionfaces, $images, Linkify::process(htmlentities($event->details)))!!}</p>

              @else
              <p class="lead">Details:</p>
              <p class="text-align text-muted">Not Available</p>
              @endif
               @if($event->location)
              <p class="lead">Location:</p>
              <p class="text-align">{!! htmlentities($event->location) !!}</p>
               @else
              <p class="lead">Location:</p>
              <p class="text-align text-muted">Not Available</p>
              @endif
               <p class="lead">Date:</p>
              <p class="text-align">{{$event->day}} {{date("F", mktime(0,0,0, $event->month, 1))}} {{$event->year}}</p>
               @if($event->time)
              
              <p class="lead">Time:</p>
              <p class="text-align">{!! htmlentities($event->time) !!}</p>
              @else
              <p class="lead">Time:</p>
              <p class="text-align text-muted">Not Available</p>
              @endif
               <?php
                  $eventlike = 'eventlike'.$event->id;
                  $eventgoing = 'eventgoing'.$event->id;
                  ?>
                 

              <div class="text-center" value="{{$event->id}}">

              
              
              <a onclick="eventlike({{$event->id}})" class="btn btn-primary justify eventlike" data-id="{{$event->id}}" href="#" role="button"><span @if($eventlikecount  !== 0) class="badge" @endif id="{{$eventlike}}">@if($eventlikecount  !== 0) {{$eventlikecount}} @endif</span> Like&nbsp;<i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i></a>
              &nbsp;
              
              <a onclick="eventgoing({{$event->id}})" class="btn btn-primary justify eventgoing" data-id="{{$event->id}}" href="#" role="button"><span @if($eventgoingcount  !== 0) class="badge" @endif id="{{$eventgoing}}">@if($eventgoingcount  !== 0)  {{$eventgoingcount}} @endif </span> Going &nbsp;<i class="fa fa-calendar" aria-hidden="true"></i></a>
              &nbsp;

             <a class="btn btn-success justify hidden-md hidden-lg" href="whatsapp://send?text={{$event->name. ' ' .Request::url()}}" data-action="share/whatsapp/share">Share on Whatsapp</a>
               &nbsp;
               @if(Auth::user()->id == $event->user_id || Auth::user()->role == 'administrator')
              <a class="btn btn-info justify" href="{{route('event.edit',['eventId' => $event->id, 'slug' => $event->slug])}}" role="button"><i class="fa fa-pencil-square-o fa-lg"></i> Edit</a>
               &nbsp;
              <a class="btn btn-danger justify" href="{{route('event.delete',['eventId' => $event->id, 'slug' => $event->slug])}}" role="button"><i class="fa fa-trash-o fa-lg"></i> Delete</a>
              @endif
              </div>
             
             
                  <br/>
                  <span class="pull-right clearfix"><small>Posted by&nbsp;<strong><a href="{{ route('profile',['username' => \App\User::find($event->user_id)->username])}}">{{\App\User::find($event->user_id)->username}}</a></strong>&nbsp; {{ $event->created_at->diffForHumans() }}</small></span>
                  <br/>
                   <span class="pull-right clearfix message_to"><small><strong><a href="{{route('event.report',['eventId' => $event->id, 'slug' => $event->slug])}}">Report</a></strong></small></span>
         
            
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


