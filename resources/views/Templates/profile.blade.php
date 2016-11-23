 @extends('maindefault')

@section('content')
@include('partials.profileactivenavigation')
<br class="visible-lg" />
@include('partials.alerts')
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 profile">
          <div class="panel panel-default">
  <div class="panel-body">
          <img src="{{asset($user->getUserProfileImage())}}" class="img-responsive img-circle center-block" alt="">
           <h4 class="text-center"><em>{{$user->getUsername()}}</em></h4>
           <h5 class="text-center"><strong class="text-capitalize">{{Auth::user()->sex}}</strong></h5>
            @if(Auth::user()->id === $user->id)
            <div class="text-center">
        Status: @if(Auth::user()->is_banned == 0)<span class="label label-success"> Online</span>
        @else
        <span class="label label-danger">Banned</span>
        <div class="row">
        <div class="alert alert-danger col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2" style="margin-top: 10px; margin-bottom: 0px;">
  
 You are currently on a 24hr ban
</div>
</div>

        @endif
        </div>
        @endif
        <h4 class="text-center"><em>{{\App\Institution::find($user->institution_id)->name}}</em></h4>

        <div class="col-md-8 col-md-offset-2 col-xs-12">
        
           <br/>
        @if (Auth::user()->hasFriendRequestsPending($user))
        <p class="text-muted">Waiting for {{$user->getUsername() }} to accept your request.</p>
        @elseif(Auth::user()->hasFriendRequestRecieved($user))
        <p>
        <a class="btn btn-primary" href="{{route('friend.accept', ['username' => $user->username]) }}">Accept friend request</a>
        </p>
        @elseif (Auth::user()->isFriendsWith($user))
        <p class="text-center text-muted">You and {{$user->getUsername() }} are friends.</p>
        @elseif (Auth::user()->id !== $user->id)
        <p>
        <div class="text-center">
         <a class="btn btn-primary" href="{{route('friend.add', ['username' => $user->username]) }}" role="button">Add as friend</a>
         </div>
         </p>
        @endif
       
         @if ($user->personaltext($user))
       
       
        <h5><strong> Personal Text </strong></h5>
        <div class="panel panel-default">
         
          <div class="panel-body">
          {!! str_replace($emotionfaces, $images, Linkify::process($user->personal_text))!!}
          
          </div>
          </div>
           <br/>

          @endif
           @if (Auth::user()->id !== $user->id)
    
           <a class="btn btn-primary pull-right" href="{{route('message.create', ['username' => $user->username])}}" role="button">Send message</a>

             <br/>
           <br/>
            @endif
            @if(Auth::user()->id == $user->id)
          <div class="text-center clearfix">
          <a class="btn btn-primary" href="{{ route('editprofile',['username' => Auth::user()->username]) }}" role="button">Edit profile</a>
          
          </div>
           @endif
            <br/>
          <div class="list-group panel-forum">
        <li class="list-group-item active">

          <strong>Friends</strong>
        </li>
        
         
          @if (!$user->friends()->count())
         <li class="list-group-item"><p class="text-muted"> No Friends yet</p></li>
          @else
          @foreach($user->friends() as $userfriend)
               <li class="list-group-item clearfix">@include('partials.userblock')</li>
              @endforeach
              @endif
          
           </div>
        
        
        @if(Auth::user()->role == 'administrator' && $user->is_banned == 0 && $user->id != Auth::user()->id)
        <a class="btn btn-danger pull-right btn-xs" href="{{route('user.ban',['username' => $user->username])}}" role="button">Ban</a>
      @endif
       @if(Auth::user()->role == 'administrator' && $user->is_banned == 1)
         <a class="btn btn-primary pull-right btn-xs" href="{{route('user.unban',['username' => $user->username])}}" role="button">Unban</a>
         @endif
    
          </div>

        </div>
        </div>

        </div>
      </div>
       <footer>
  @include('partials.footer')
  </footer>
        @stop