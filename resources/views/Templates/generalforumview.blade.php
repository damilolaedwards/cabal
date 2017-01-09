@extends('maindefault')
@section('title')
    CampusCabal | {{$topic->title}} - {{$category->name}}
@stop
@section('content')
@include('partials.navigation')

<div class="row">
@include('partials.forumheader')
@include('partials.alerts') 
              @if($generalposts->currentPage() == 1 )
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p class="panel-title forum-title"><a href="#">{{ucfirst(strtolower($topic->title))}}</a>  <a href="{{ route('profile',['username' => \App\User::find($topic->user_id)->username])}}"><span class="usercolor">&nbsp;by &nbsp;{{\App\User::find($topic->user_id)->username}}</span></a></p>
                  </div>
                  <div class="panel-body less-padding" >
                    <p>{!! str_replace($emotionfaces, $images, Linkify::process(htmlentities($topic->body)))!!}</p>
                     @if($topic->forumimage1 !==NULL)
                    <p>
                    <img src="{{asset($topic->getFirstImage())}}" alt="image" class="img-responsive"  id="image"  >
                    </p>
                   
                    @endif
                    @if($topic->forumimage2 !==NULL)
                    <p>
                    <img src="{{asset($topic->getSecondImage())}}" alt="image" class="img-responsive "  id="image"  >
                    </p>
                    
                     @endif
                    @if($topic->forumimage3 !==NULL)
                    <p>
                    <img src="{{asset($topic->getThirdImage())}}" alt="image" class="img-responsive " >
                    </p>
                    
                     @endif
                      @if($topic->forumfile !== NULL)
                      <p>
             <img src="{{asset($topic->getTopicFile())}}"><a href="{{substr(stristr($topic->forumfile, '-'), 1)}}" download="{{substr(stristr($topic->forumfile, '-'), 1)}}"> Download {{substr(stristr($topic->forumfile, '-'), 1)}}</a>
            </p>
              @endif

                    <span class="pull-right text-muted"><small>{{ $topic->created_at->diffForHumans() }}</small></span>
                  </div>

                  <?php
                  $generaltopiclike = 'generaltopiclike'.$topic->id;
                  $generaltopiclikecount = \App\GeneralTopicLike::where('topic_id', $topic->id)->count();
                  ?>
                  <div class="panel-footer">
                  @if($generaltopiclikecount !== 0)<span id="{{ $generaltopiclike}}">{{$generaltopiclikecount}}</span>@endif

                  <a onclick="generaltopiclike({{$topic->id}}, {{\App\Category::find($topic->category_id)->id}})" data-id="{{$topic->id}}"  href="#">&nbsp;Like</a>

                   &nbsp;  &nbsp;
                   
                    @if($topic->user_id == Auth::user()->id || Auth::user()->role == 'administrator')<a href="{{route('generaltopic.update', ['category' => \App\Category::find($topic->category_id)->name, 'topicId' => $topic->id, 'slug' => $topic->slug])}}">&nbsp;Edit</a>@endif 
                    <a href="#reply" class="pull-right">reply</a>
                   </div> 
                  </div>
                  @endif
                  <div class="panel">
                  @foreach($generalposts as $post)
                  @include('partials.forumpostsblock')
                  @endforeach
                  <a name="4qRr5OAp"></a>
                  </div>
                 @if($topic->thread_closed == 0)
                   <div class="panel panel-default">
                  <div class="panel-body">
                   <form class="form-vertical" role="form" method="post" action="{{route('generaltopic.reply',['id' => $topic->id, 'slug' =>$topic->slug, 'category' => $category->name])}}" enctype="multipart/form-data">
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
          <a name="reply"></a>
                    <div class="form-group {{ $errors->has('postbody') ?  ' has-error' : '' }}">
                    <a name="reply"></a>
                  <textarea class="form-control" name="postbody" rows="3" id="myTextarea">{{{ Request::old('postbody') }}}</textarea>
                   @if($errors->has('postbody'))
              <span class="help-block">{{$errors->first('postbody')}}</span>
              @endif
                </div>
                <p id="show" style="color: #337ab7">Add file</p>
                <div id="fileinput" style="display: none">
                 <label for="postimage1" class="control-label">Add image</label>
            <div class="form-group {{ $errors->has('postimage1') ?  ' has-error' : '' }}">
            <input type="file" id="postimage1" name="postimage1">
             @if($errors->has('postimage1'))
              <span class="help-block">{{$errors->first('postimage1')}}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('postimage2') ?  ' has-error' : '' }}">
            <input type="file" id="postimage2" name="postimage2">
             @if($errors->has('postimage2'))
              <span class="help-block">{{$errors->first('postimage2')}}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('postimage3') ?  ' has-error' : '' }}">
            <input type="file" id="postimage3" name="postimage3">
             @if($errors->has('postimage3'))
              <span class="help-block">{{$errors->first('postimage3')}}</span>
              @endif
            <p class="help-block">Images must be in jpg, png or gif format.</p>
           </div>

           <div class="form-group {{ $errors->has('postfile') ?  ' has-error' : '' }}">
           
            <label for="postfile" class="control-label">File input</label>
            
            <input type="file" id="postfile" name="postfile">
            <p class="help-block">Files must be in pdf or docs format.</p>
           
             @if($errors->has('postfile'))
              <span class="help-block">{{$errors->first('postfile')}}</span>
              @endif
           </div>
           </div>
          

                           <button type="submit" class="btn btn-primary pull-right">Reply</button>
      <input type="hidden" name="lastcatperpage" value="{{$generalposts->perPage()}}">
        <input type="hidden" name="lastcatpagecount" value="{{$generalposts->count()}}">
          <input type="hidden" name="lastcatpage" value="{{$generalposts->lastPage()}}">
           <input type="hidden" name="_token" value="{{Session::token()}}">

                </form>
 @if(Auth::user()->role == 'administrator')
              <br/>
              </br>
              </br>
              <div>
               <form class="form-vertical" role="form" method="post" action="{{route('generaltopic.closethread', ['category' => \App\Category::find($topic->category_id)->name, 'topicId' => $topic->id, 'slug' => $topic->slug])}}">
  <input type="submit" value="closethread" class="btn btn-danger pull-right btn-xs">
  <input type="hidden" name="_token" value="{{ csrf_token()}}">
</form>
</div>
                  
                 @endif
                  </div>
                  </div>
                 
                   @else
                   <div class="col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">
                   <img src="{{asset($topic->getCloseThread())}}" alt="image" class="img-responsive ">
                    @if(Auth::user()->role == 'administrator')
                    <br/>
                   
                   <form class="form-vertical" role="form" method="post" action="{{route('generaltopic.openthread', ['category' => \App\Category::find($topic->category_id)->name, 'topicId' => $topic->id, 'slug' => $topic->slug])}}">
  <input type="submit" value="openthread" class="btn btn-primary btn-xs pull-right">
  <input type="hidden" name="_token" value="{{ csrf_token()}}">
</form>
 <br/>
  <br/>
   <br/>
@endif
@endif

                <div class="text-center">
                  {!! $generalposts->render() !!}
                  </div>
                  </div>

     
@stop