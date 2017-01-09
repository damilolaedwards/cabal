@extends('maindefault')
@section('title')
    CampusCabal | {{$topic->title}}::Edit
@stop
@section('content')
@include('partials.navigation')

<div class="row">
<br class="visible-lg" />
<h3 class="text-center forum-header text-muted">Campus Forum</h3>

          <div class="panel panel-default">
            <div class="panel-body">
            <div class="page-header text-muted text-center" style="margin-top: 0px; padding-bottom: 0px;" >
            <p class="lead">Edit Topic</p>

          </div>
          <form class="form-vertical" role="form" method="post" action="{{route('campustopic.update',['topicId' => $topic->id, 'topicSlug' => $topic->slug])}}" enctype="multipart/form-data">
          <div class="form-group {{ $errors->has('topictitle') ?  ' has-error' : '' }}">
            <label for="topictitle" class="control-label">Title</label>
            <input type="text" class="form-control" id="topictitle" name="topictitle" value="{{Request::old('topictitle') ?: $topic->title}}">
             @if($errors->has('topictitle'))
              <span class="help-block">{{$errors->first('topictitle')}}</span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('topicbody') ?  ' has-error' : '' }}">
            <label for="topicbody" class="control-label">Body</label>
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
            <textarea class="form-control" rows="7" id="myTextarea" name="topicbody">{{Request::old('topicbody') ?: $topic->body}}</textarea>
          </div>
          
          
               <input type="hidden" name="campustopicredirect" value="{{URL::previous()}}">  
            <label for="topicimage1" class="control-label">Update image(s)</label>
        <div class="form-group {{ $errors->has('topicimage1') ?  ' has-error' : '' }}">
         @if($topic->forumimage1 !== NULL && Auth::user()->id === $topic->user_id)
           <span class="message_to">{{substr(stristr($topic->forumimage1, '-'), 1)}}</span><a href="{{route('campustopic.image1.delete',['topicId' => $topic->id, 'topicSlug' => $topic->slug])}}"><div class="btn btn-xs btn-danger delete">delete</div></a>
           @else
            <input type="file" id="topicimage1" name="topicimage1">
            
            @if($errors->has('topicimage1'))
              <span class="help-block">{{$errors->first('topicimage1')}}</span>
              @endif
              @endif
          </div>
      <div class="form-group {{ $errors->has('topicimage2') ?  ' has-error' : '' }}"> 
      @if($topic->forumimage2 !== NULL && Auth::user()->id === $topic->user_id)
           <span class="message_to">{{substr(stristr($topic->forumimage2, '-'), 1)}}</span><a href="{{route('campustopic.image2.delete',['topicId' => $topic->id, 'topicSlug' => $topic->slug])}}"><div class="btn btn-xs btn-danger delete">delete</div></a>
           @else
            <input type="file" id="topicimage2" name="topicimage2" >
       @if($errors->has('topicimage2'))
              <span class="help-block">{{$errors->first('topicimage2')}}</span>
              @endif
              @endif
          </div>
      <div class="form-group {{ $errors->has('topicimage3') ?  ' has-error' : '' }}">
      @if($topic->forumimage3 !== NULL && Auth::user()->id === $topic->user_id)
           <span class="message_to">{{substr(stristr($topic->forumimage3, '-'), 1)}}</span><a href="{{route('campustopic.image3.delete',['topicId' => $topic->id, 'topicSlug' => $topic->slug])}}"><div class="btn btn-xs btn-danger delete">delete</div></a>
           @else   
            <input type="file" id="topicimage3" name="topicimage3" >
             @if($errors->has('topicimage3'))
              <span class="help-block">{{$errors->first('topicimage3')}}</span>
              @endif
              @endif
            <p class="help-block">Images must be in jpg, png or gif format.</p>
           </div>

          
            <label for="topicfile">Update file input</label>
         <div class="form-group {{ $errors->has('topicfile') ?  ' has-error' : '' }}">
         @if($topic->forumfile !== NULL && Auth::user()->id === $topic->user_id)
           <span class="message_to">{{substr(stristr($topic->forumfile, '-'), 1)}}</span><a href="{{route('campustopic.file.delete',['topicId' => $topic->id, 'topicSlug' => $topic->slug])}}"><div class="btn btn-xs btn-danger delete">delete</div></a>
           @else
            <input type="file" id="topicfile" name="topicfile" >
            @if($errors->has('topicfile'))
              <span class="help-block">{{$errors->first('topicfile')}}</span>
              @endif
              @endif
            <p class="help-block">Files must be in pdf or docs format.</p>
           </div>
         
          <button type="submit" class="btn btn-primary pull-right">Modify</button>
           <input type="hidden" name="_token" value="{{Session::token()}}">
          </form>
            </div>
          </div>
          </div>
          @stop