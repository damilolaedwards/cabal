<div class="media">
<a class="pull-left" href="{{ route('profile',['username' => $user->username]) }}">
<img class= "media-object img-circle" alt="{{$user->getUsername()}}" src="{{$user->getProfileImage()}}" width="40" height="40">
</a>
<div class="media-body">
<h5 class="media-heading"><a href="{{ route('profile',['username' => $user->username]) }}">
@if(Auth::check() && $user->getUsername() == Auth::user()->username)
	You
@else  
{{$user->getUsername()}}  @endif</a></h5>
@if ($user->institution_id)
<h4> <small>{{$user->institution->name}}</small></h4>

@endif
</div>
</div>