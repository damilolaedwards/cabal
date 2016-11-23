 @extends('maindefault')

@section('content')
@include('partials.messageactivenavigation')
<br class="visible-lg" />
@include('partials.alerts')
<div class="row">
<div class="panel panel-default">
 <a class="btn btn-default sent_message pull-right clearfix" href="{{route('messages.sent')}}" role="button">Sent messages</a>
 
  <div class="panel-heading">

    <h3 class="panel-title">Messages</h3>
  </div>
  <div class="panel-body">
  	 @if (!$messages->count())
  	 <p class="text-muted">No messages yet</p>
  	  @else
          @foreach($messages as $message)
<div class="media text-align3">
<a class="pull-left" href="{{ route('profile',['username' => \App\User::find($message->sender_id)->username]) }}">
<img class= "media-object" alt="{{\App\User::find($message->sender_id)->username}}" src="{{asset(\App\User::find($message->sender_id)->getProfileImage())}}">
</a>
<div class="media-body">
<p>
{{$message->body}}
</p>
@if($message->image)
<p>
<img src="{{asset($event->getMessageImage())}}" alt="image"  class="img-responsive">
</p>
@endif
@if($message->file)
<p>
 <img src="{{asset($message->getMessageFile())}}"><a href="{{substr(stristr($message->file, '-'), 1)}}" download="{{substr(stristr($message->file, '-'), 1)}}"> Download {{substr(stristr($message->file, '-'), 1)}}</a>
</p>
@endif
<p class="text-muted"><small><a href="{{ route('profile',['username' => \App\User::find($message->sender_id)->username]) }}">{{\App\User::find($message->sender_id)->username}}</a> | {{ $message->created_at->diffForHumans() }}</small>
<span class="pull-right">
<a href="{{route('message.create',['username' => \App\User::find($message->sender_id)->username])}}">reply </a>|
<a href="{{route('message.delete',['messageId' => $message->id])}}"> delete</a>
</p>
</span>
<hr/>
          </div>
          </div>
           @endforeach
              @endif
              <div class="text-center">
              {{$messages->render()}}
              </div>
          </div>
          </div>
          </div>
         
@stop