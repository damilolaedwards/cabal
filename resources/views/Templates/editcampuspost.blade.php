@extends('maindefault')
@section('title')
    Mycampus | Campus post :: Edit
@stop
@section('content')
@include('partials.navigation')
  <div class="row">
  <br class="visible-lg visible-md" />
  <h3 class="text-center forum-header text-muted">Campus Forum</h3>
       

          <div class="panel panel-default">
            <div class="panel-body">
            <div class="page-header text-align">
            <h3><small>Modify Post</small></h3>

          </div>
         <form class="form-vertical" id="myForm" role="form" method="post" action="{{route('campuspost.update',['postId' => $post->id, 'topicSlug' => \App\Campustopic::find($post->topic_id)->slug, 'topicId' => $post->topic_id])}}" enctype="multipart/form-data">
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
        <div class="form-group {{ $errors->has('postbody') ?  ' has-error' : '' }}">
            
                       <textarea class="form-control" rows="7" id="myTextarea" name="postbody">{{Request::old('postbody') ?: $post->body }}</textarea>
             @if($errors->has('postbody'))
              <span class="help-block">{{$errors->first('postbody')}}</span>
              @endif
          </div>
           <p id="show" style="color: #337ab7">Add file</p>
                <div id="fileinput" style="display: none">
          <label for="postimage1" class="control-label">Update image(s)</label>
        <div class="form-group {{ $errors->has('postimage1') ?  ' has-error' : '' }}">
         @if($post->postimage1 !== null && Auth::user()->id === $post->user_id)
           <span class="message_to">{{substr(stristr($post->postimage1, '-'), 1)}}</span><a href="{{route('campuspost.image1.delete',['postId' => $post->id, 'topicSlug' => \App\Campustopic::find($post->topic_id)->slug, 'topicId' => $post->topic_id])}}"><div class="btn btn-xs btn-danger delete">delete</div></a>
           @else
            <input type="file" id="postimage1" name="postimage1">
            
            @if($errors->has('postimage1'))
              <span class="help-block">{{$errors->first('postimage1')}}</span>
              @endif
              @endif
          </div>
      <div class="form-group {{ $errors->has('postimage2') ?  ' has-error' : '' }}"> 
         @if($post->postimage2 !== null && Auth::user()->id === $post->user_id)
           <span class="message_to">{{substr(stristr($post->postimage2, '-'), 1)}}</span><a href="{{route('campuspost.image2.delete',['postId' => $post->id, 'topicSlug' => \App\Campustopic::find($post->topic_id)->slug, 'topicId' => $post->topic_id])}}"><div class="btn btn-xs btn-danger delete">delete</div></a>
           @else
            <input type="file" id="postimage2" name="postimage2" >
       @if($errors->has('postimage2'))
              <span class="help-block">{{$errors->first('postimage2')}}</span>
              @endif
              @endif
          </div>
      <div class="form-group {{ $errors->has('postimage3') ?  ' has-error' : '' }}"> 
       @if($post->postimage3 !== null && Auth::user()->id === $post->user_id)
           <span class="message_to">{{substr(stristr($post->postimage3, '-'), 1)}}</span><a href="{{route('campuspost.image3.delete',['postId' => $post->id, 'topicSlug' => \App\Campustopic::find($post->topic_id)->slug, 'topicId' => $post->topic_id])}}"><div class="btn btn-xs btn-danger delete">delete</div></a>
           @else  
            <input type="file" id="postimage3" name="postimage3" >
             @if($errors->has('postimage3'))
              <span class="help-block">{{$errors->first('postimage3')}}</span>
              @endif
              @endif
            <p class="help-block">Images must be in jpg, png or gif format.</p>
           </div>

          <input type="hidden" name="campuspostredirect" value="{{URL::previous()}}">
            <label for="postfile">Update file input</label>
         <div class="form-group {{ $errors->has('postfile') ?  ' has-error' : '' }}">
          @if($post->postfile !== NULL && Auth::user()->id === $post->user_id)
           <span class="message_to">{{substr(stristr($post->postfile, '-'), 1)}}</span><a href="{{route('campuspost.file.delete',['postId' => $post->id, 'topicSlug' => \App\Campustopic::find($post->topic_id)->slug, 'topicId' => $post->topic_id])}}"><div class="btn btn-xs btn-danger delete">delete</div></a>
           @else
            <input type="file" id="postfile" name="postfile" >
            @if($errors->has('postfile'))
              <span class="help-block">{{$errors->first('postfile')}}</span>
              @endif
              @endif
            <p class="help-block">Files must be in pdf or docs format.</p>
           </div>
          </div>

          
          
          <button type="submit" class="btn btn-primary pull-right">Modify</button>
        <input type="hidden" name="_token" value="{{Session::token()}}">    
        </form>
            </div>
          </div>

          </div>
@stop