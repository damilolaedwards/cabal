 @extends('maindefault')
@section('title')
    Mycampus | Sent messages
@stop
@section('content')
@include('partials.messageactivenavigation')
<br class="visible-lg visible-md"/>
@include('partials.alerts')

<div class="row">
<div class="panel panel-default">
 
  <div class="panel-heading">
  
    <h3 class="panel-title">Sent messages</h3>
  </div>
  <div class="panel-body">
  	 @if (!$messages->count())
  	 <p class="text-muted">No messages yet</p>
  	  @else
          @foreach($messages as $message)
           @if($message->sender_deleted == 0 )
<div class="media text-align3">
<a class="pull-left visible-lg visible-md" href="{{ route('profile',['username' => \App\User::find($message->reciever_id)->username])}}">
<img class= "media-object img-circle" alt="{{\App\User::find($message->sender_id)->username}}"  width="40" height="40" src="{{asset(\App\User::find($message->reciever_id)->getProfileImage())}}">
</a>
<div class="media-body">

{!! htmlentities($message->body) !!}
<br/>

<p class="text-muted"><small>To: <a href="{{route('profile',['username' => \App\User::find($message->reciever_id)->username])}}"><span >{{\App\User::find($message->reciever_id)->username}}</span></a><a class="pull-right" href="{{route('message.sent.delete',['messageId' => $message->id])}}">&nbsp; delete </a> </small> <small class="pull-right"><span>{{ $message->created_at->diffForHumans() }} | </span></small></p>

<hr/>
          </div>
          </div>
          @endif
           @endforeach
              @endif

              <div class="text-center">
              {{$messages->render()}}
              </div>
          </div>
          </div>
          </div>
         
@stop