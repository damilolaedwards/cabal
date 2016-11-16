<div class="media">
<a class="pull-left" href="{{ route('profile',['username' => $userfriend->username]) }}">
<img class= "media-object img-circle" alt="{{$userfriend->getUsername()}}" src="{{$userfriend->getProfileImage()}}" width="40" height="40">
</a>
<div class="media-body">
<h5 class="media-heading"><a href="{{ route('profile',['username' => $userfriend->username]) }}">
@if($userfriend->getUsername() == Auth::user()->username)
	You
@else  
{{$userfriend->getUsername()}}  @endif</a></h5>
@if ($userfriend->institution_id)
<h4> <small>{{$userfriend->institution->name}}</small></h4>

@endif
</div>
</div>