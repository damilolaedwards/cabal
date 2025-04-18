 @extends('maindefault')
@section('title')
Mycampus | Messages
@stop
@section('metatitle')
Mycampus - No.1 Student Online Community | Mycampus
@stop
@section('metaimage')
https://www.mycampus.ng/webcontentimage.jpg
@stop
@section('content')
@include('partials.messageactivenavigation')
<br class="visible-lg visible-md" />
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
          @if($message->reciever_deleted == 0 )
<div class="media text-align3">
<a class="pull-left visible-lg visible-md" href="{{ route('profile',['username' => \App\User::find($message->sender_id)->username]) }}">
<img class= "media-object" width="40px" height="40px" alt="{{\App\User::find($message->sender_id)->username}}" src="{{asset(\App\User::find($message->sender_id)->getProfileImage())}}">
</a>
<div class="media-body">
<p class="panelverdana">
 {!! html_entity_decode($message->body) !!}
</p>
<p class="text-muted"><small><a href="{{ route('profile',['username' => \App\User::find($message->sender_id)->username]) }}">{{\App\User::find($message->sender_id)->username}}</a> | {{ $message->created_at->diffForHumans() }}</small>
<span class="pull-right">
<a href="{{route('message.create',['username' => \App\User::find($message->sender_id)->username])}}">reply </a> | <a href="{{route('message.delete',['messageId' => $message->id])}}"> delete</a>

</span>
</p>
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