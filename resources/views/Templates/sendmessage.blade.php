@extends('maindefault')
@section('title')
    Mycampus | Create message
@stop
@section('content')
@include('partials.messageactivenavigation')
<br class="visible-lg" />
          <div class="row">
           <div class="panel panel-default">
            <div class="panel-body">
             <p class="lead">*Message</p>
              <form class="form-vertical" role="form" method="post" action="{{route('message.create',['username' => $user->getUsername()])}}" enctype="multipart/form-data">
          <div class="form-group {{ $errors->has('message_to') ?  ' has-error' : '' }}">
            <label for="messageto">To:</label>

            <span class="message_to text-muted">{{$user->getUsername()}}</span> <button type="button" onclick="location.href='{{route('messages')}}'" title="Cancel" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
           <input type="hidden" name="message_to" value="{{$user->getUserId()}}">
            </div>
          <div class="form-group {{ $errors->has('message_body') ?  ' has-error' : '' }}">
            <label for="messagebody">Body</label>
            <textarea class="form-control" rows="7" id="messagebody" name="message_body">{{ Request::old('message_body') ?: ''}}</textarea>
             @if($errors->has('message_body'))
              <span class="help-block">{{$errors->first('message_body')}}</span>
              @endif
          </div>
         
          <button type="submit" class="btn btn-primary pull-right">Send</button>
          <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
            </div>
          </div>
          </div>
           <footer>
  @include('partials.footer')
  </footer>
          @stop