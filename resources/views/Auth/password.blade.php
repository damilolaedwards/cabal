Click here to reset your Password<br/>
<a href="{{$link = url('password/email', $token).'?email='.urlencode($user->getEmailForPasswordReset())}}">{{ $link }}</a>