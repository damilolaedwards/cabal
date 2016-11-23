<div class="row hidden-lg">
        <div class="jumbotron presentation">
          <ul class="nav nav-pills " id="supernav">
            <li role="presentation"   ><a href="{{route('homepage')}}">Home</a></li>
            <li role="presentation" ><a href="{{ route('profile',['username' => Auth::user()->username]) }}">Profile</a></li>
            <li role="presentation" class="active"><a href="{{ route('messages') }}" >Messages @if($unreadmessages !== 0)<span class="badge">
               {{$unreadmessages}}
            
            
            </span>@endif</a></li>
            <li role="presentation" ><a href="{{route('notification')}}">Notification @if($requestcount  !== 0)<span class="badge ">
               {{$requestcount}}
           </span> @endif</a></li>
          </ul>
          
          <div class="input-group float col-md-6 col-md-offset-6 col-sm-10 col-sm-offset-2 col-xs-10 col-xs-offset-2 ">
          <form action="{{route('search')}}" role="form">
          <div class="input-group view_button">
            <input type="text" name="query" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="submit">Search</button>
            </span>
            </div>
            </form>
            </div><!-- /input-group -->
            
          </div>
          
          
          
        </div>