@if(Auth::user()->hasFriendRequestRecieved($user))
<div class="media-body">
<a class="pull-left" href="{{ route('profile',['username' => $user->username]) }}">
<img class= "media-object img-circle" alt="{{$user->getUsername()}}" src="{{$user->getProfileImage()}}" width="40" height="40" style="margin-right: 5px">
<a class="btn btn-danger btn-sm pull-right" style="margin-left: 10px;" href="{{route('friend.ignore', ['username' => $user->username]) }}" role="button">Ignore </a>

<a class="btn btn-primary btn-sm pull-right" href="{{route('friend.accept', ['username' => $user->username]) }}" role="button"> Accept </a>

<h5 class="media-heading"><a href="{{ route('profile',['username' => $user->username]) }}">{{$user->getUsername() }}</a><h5> Sent you a friend request </h5></h5>
<hr/>
</div>
@endif
