@extends('maindefault')

@section('content')
@include('partials.navigation')
<div class="row">
<div class="panel panel-default">
  <div class="panel-body playfair">
  <div class="text-center">
  <img src="/hyacinth.jpg" alt="image" class="img-responsive img-thumbnail" height="240" width="360">
  </div>
  
<p>Hey there, welcome!  Of the thousand things keeping you extremely occupied, you found it worthy to sign up with us. We’re pumped.
Enjoy, meet new people, and explore the awesome features of CampusCabal. Your time here promises to be fun filled. We know you have lovely friends. Inform them about CampusCabal, so, they’ll become part of this wonderful community.
Questions? Suggestions? Hit the “Contact us” button for a rapid response, remember, it’s our duty to serve you better.
</p>
Invite your friends
<a class="btn btn-success justify" href="whatsapp://send?text={{'Hey, There’s this expanding community everyone’s talking about. In classrooms, cafeterias, car parks, and even football viewing centers. CampusCabal.com, right? Oh yea, heard that around. I just joined, you should. www.campuscabal.com
'. ' ' .Request::URL()}}" data-action="share/whatsapp/share">Share on Whatsapp</a>
<a class="btn btn-primary" href="https://www.facebook.com/sharer/sharer.php?u=google.com" target="_blank">
  Share on Facebook
</a>



	<!-- Your share button code -->
	


  </div>
</div>
</div>
<footer>
@include('partials.footer')
</footer>
@stop