@extends('maindefault')

@section('content')
@include('partials.profileactivenavigation')

<br class="visible-lg"/>
 <div class="row">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="center-block">
            <img src="{{asset(Auth::user()->getUserProfileImage())}}" class="img-responsive img-circle center-block" alt="">
            
             <br/>
             <form class="form-vertical" role="form" method="post" action="{{ route('editprofile') }}" enctype="multipart/form-data">
             <div class="form-group {{ $errors->has('profile_image') ?  ' has-error' : '' }}">
            
           
              <input type="file" id="profile_image" class="center-block" name="profile_image">
           
              
               @if($errors->has('profile_image'))
              <span class="help-block">{{$errors->first('profile_image')}}</span>
              @endif
            </div>
           <br/>
            
            <div class="col-md-8 col-md-offset-2 col-xs-12">
            <label for="personaltext">Personal Text</label>
            <div class="panel panel-default">
            <div class="panel-body">
              <?php
              $smiliesList = array('smile', 'sad', 'arrow', 'cool', 'cry', 'grin', 'confused', 'bigeyes', 'evil', 'exclaim', 'geek', 'idea', 'lol', 'mad', 'green', 'neutral', 'question', 'happy', 'redface', 'rolleyes', 'surprised', 'devil', 'wink'); 
      for ($i = 0; $i < count($smiliesList); $i++) {
        if ($i % 5 == 0 && $i != 0) echo '</tr><tr>';
        echo '<td><img src="/images/smilies/icon_'.$smiliesList[$i].'.gif " id="addSmiley" alt=":'.$smiliesList[$i].':" /> </td>';
      }?>

            </div>
            
          </div>
            <div class="form-group {{ $errors->has('personal_text') ?  ' has-error' : '' }}">
            
            <textarea class="form-control" rows="3" id="myTextarea" name="personal_text" >{{Auth::user()->personal_text ?: Request::old('personal_text') }}</textarea>
             @if($errors->has('personal_text'))
              <span class="help-block">{{$errors->first('personal_text')}}</span>
              @endif
            </div>
           
           
           <input type="hidden" name="_token" value="{{Session::token()}}">
          </form>
         
          <div class="text-center">
          <button class="btn btn-primary" type="submit">Update profile</button>
          </div>
          <br/>
              <br/>
          </div>
       <div class="col-md-8 col-md-offset-2 col-xs-12">
       <div class="list-group panel-forum">
        <li class="list-group-item active">

          <strong>Friends</strong>
        </li>
            @if (!\Auth::user()->friends()->count())
           
        <li class="list-group-item"><p class="text-muted"> No Friends yet</p></li>
        @else
       @foreach($friends as $user)
        <li class="list-group-item clearfix">@include('partials.userprofileblock')</li>
       @endforeach
        <div class="text-center">
   {!! $friends->setPath('')->render() !!}


   </div>
       @endif
      
          </div>
          </div>

            </div>
             

        </div>
      </div>

     <footer> 
 <div>
              <div class="panel panel-default ">
  <div class="panel-body ">
   @if (Auth::check())
              <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="thumbnail" src="{{asset(Auth::user()->getUserProfileImage())}}" width="40" height="40" alt="{{Auth::user()->getUsername()}}" style="max-width: unset;" >
              </a>
            </div>
           
            <div class="media-body">
              <h5 class="media-heading"><strong>{{Auth::user()->getUsername()}}</strong></h5>
             
             <h4><small><a href="{{route('logout')}}">Logout</a></small></h4>
              
            </div>
           @endif
           </div>
          <div class="text-center pull-up ">
            

          <small>&nbsp; &copy CampusCabal {{date('Y')}}. All Rights Reserved </small>
       
         <ul class="footer_set">
         <li><small><a href="{{route('disclaimer')}}">Disclaimer</a></small></li>
         <li>&nbsp;</li>
         <li><small><a href="{{route('rules')}}">Rules & Regulations</a></small></li>
         <li>&nbsp;</li>
         <li><small><a href="{{route('contact')}}">Contact</a></small></li>
        
           </ul>
    
          </div>
         
        
          </div>
            </div>
            </div>
            
  </footer>
      @stop
