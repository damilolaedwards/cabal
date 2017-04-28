@extends('maindefault')
@section('title')
    Mycampus | Campus forum :: Create topic
@stop
@section('content')
@include('partials.navigation')
<div class="row">

<br class="visible-lg"/>
         <div class="panel panel-default">
        <div class="panel-body">
         <p class="lead">*New Discussion</p>
          
              <form class="form-vertical" role="form" method="post" action="{{route('campustopic.create')}}" enctype="multipart/form-data">
          <div class="form-group {{ $errors->has('forumtitle') ?  ' has-error' : '' }}">
            <label for="forumtitle" class="control-label">Title</label>
            <input type="text" class="form-control" id="forumtitle" name="forumtitle" value="{{ Request::old('forumtitle') ?: ''}}">
            @if($errors->has('forumtitle'))
              <span class="help-block">{{$errors->first('forumtitle')}}</span>
              @endif
          </div>
          <label for="forumbody" class="control-label">Body</label>
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
          <div class="form-group {{ $errors->has('forumbody') ?  ' has-error' : '' }}">
            
            <textarea class="form-control" rows="7" id="myTextarea" name="forumbody">{{ Request::old('forumbody') ?: ''}}</textarea>
             @if($errors->has('forumbody'))
              <span class="help-block">{{$errors->first('forumbody')}}</span>
              @endif
          </div>
          
          
            <label for="forumimage1" class="control-label">Add image</label>
            <div class="form-group {{ $errors->has('forumimage1') ?  ' has-error' : '' }}">
            <input type="file" id="forumimage1" name="forumimage1">
             @if($errors->has('forumimage1'))
              <span class="help-block">{{$errors->first('forumimage1')}}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('forumimage2') ?  ' has-error' : '' }}">
            <input type="file" id="forumimage2" name="forumimage2">
             @if($errors->has('forumimage2'))
              <span class="help-block">{{$errors->first('forumimage2')}}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('forumimage3') ?  ' has-error' : '' }}">
            <input type="file" id="forumtimage3" name="forumimage3">
             @if($errors->has('forumimage3'))
              <span class="help-block">{{$errors->first('forumimage3')}}</span>
              @endif
            <p class="help-block">Images must be in jpg, png or gif format.</p>
           </div>

           <div class="form-group {{ $errors->has('forumfile') ?  ' has-error' : '' }}">
           
            <label for="forumfile" class="control-label">File input</label>
            
            <input type="file" id="forumfile" name="forumfile">
            <p class="help-block">Files must be in pdf or docs format.</p>
           
             @if($errors->has('forumfile'))
              <span class="help-block">{{$errors->first('forumfile')}}</span>
              @endif
           </div>
          
          <button type="submit" class="btn btn-primary pull-right">Post</button>
           <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
         </div>
          </div>
          </div>
@stop