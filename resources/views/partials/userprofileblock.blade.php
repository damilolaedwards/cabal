<div class="media-body">
 <form class="form-vertical" role="form" method="post" action="{{route('friend.delete',['username' => $user->username])}}">
	<input type="submit" value="Unfriend" class="btn btn-primary pull-right">
	 <input type="hidden" name="_token" value="{{Session::token()}}">
</form>
<h5 class="media-heading"><a href="{{ route('profile',['username' => $user->username]) }}">{{$user->getUsername()}}</a></h5>
@if ($user->institution_id)
<h4> <small>{{$user->institution->name}}</small></h4>

@endif
</div>