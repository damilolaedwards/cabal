@extends('maindefault')
@section('title')
  Mycampus | Edit profile
@stop
@section('metatitle')
Mycampus - No.1 Student Online Community | Mycampus
@stop
@section('metaimage')
https://www.mycampus.ng/webcontentimage.jpg
@stop
@section('content')
@include('partials.profileactivenavigation')

<br class="visible-lg visible-md"/>
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
            <div class="text-center">
          <button class="btn btn-primary" type="submit">Update profile</button>
          </div>
          </div>
            
           
           
           <input type="hidden" name="_token" value="{{Session::token()}}">

          </form>
         
         
          <br/>
              <br/>
          </div>
          {{--
          friends functionality to be replaced with followers
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
--}}
            </div>
             

        </div>
      </div>

     <footer>
  @include('partials.footer')
  </footer>
      @stop
