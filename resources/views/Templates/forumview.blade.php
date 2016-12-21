@extends('maindefault')

@section('content')
@include('partials.navigation')

<div class="row">

@if(Auth::user()->institution_id !== $campustopic->institution_id)
@include('partials.campusinstitutionheader')
@endif
<br class="visible-lg" />
@include('partials.alerts')
<h3 class="text-center forum-header text-muted">Campus Forum</h3>
          
          
           
         
         
        @if($campusposts->currentPage() == 1 )
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p class="panel-title forum-title"><a href="#">{{ucfirst(strtolower($campustopic->title))}}</a>  <a href="{{ route('profile',['username' => \App\User::find($campustopic->user_id)->username])}}"><span class="usercolor">&nbsp;by &nbsp;{{\App\User::find($campustopic->user_id)->username}}</span></a></p>
                  </div>
                  
                  <div class="panel-body less-padding" data-topicid="{{$campustopic->id}}">
                    <p > {!! str_replace($emotionfaces, $images, Linkify::process($campustopic->body))!!}</p>
                    
                    @if($campustopic->forumimage1 !==NULL)
                    <p>
                    <img src="{{asset($campustopic->getFirstImage())}}" alt="image" class="img-responsive " >
                    </p>
                    
                    @endif
                    @if($campustopic->forumimage2 !==NULL)
                    <p>
                    <img src="{{asset($campustopic->getSecondImage())}}" alt="image" class="img-responsive">
                    </p>
                    
                     @endif
                    @if($campustopic->forumimage3 !==NULL)
                    <p>
                    <img src="{{asset($campustopic->getThirdImage())}}" alt="image" class="img-responsive" >
                    </p>
                    
                     @endif
                      @if($campustopic->forumfile !== NULL)
                      <p>
             <img src="{{asset($campustopic->getTopicFile())}}"><a href="{{substr(stristr($campustopic->forumfile, '-'), 1)}}" download="{{substr(stristr($campustopic->forumfile, '-'), 1)}}"> Download {{substr(stristr($campustopic->forumfile, '-'), 1)}}</a>
            </p>
              @endif
                    <span class="pull-right text-muted"><small>{{ $campustopic->created_at->diffForHumans() }}</small></span>
                  </div>
                  <?php
                  $campuslikes = 'campustopiclike'.$campustopic->id;
                 
                  ?>
                  <div class="panel-footer panel-bottom"  value="{{$campustopic->id}}">
                  @if($campustopiclikes  !== 0)<span id="{{$campuslikes}}">{{$campustopiclikes}}</span>@endif

                  <a onclick="campuslike({{$campustopic->id}})" data-id="{{$campustopic->id}}" class="like" href="#">&nbsp;Like</a>

                   &nbsp;  &nbsp;
                   
                    @if($campustopic->user_id !== Auth::user()->id)

                   <a href="{{route('campustopic.report', ['topicId' => $campustopic->id, 'topicSlug' => $campustopic->slug])}}">&nbsp;  Report</a>

                    @endif @if($campustopic->user_id == \Auth::user()->id || Auth::user()->role == 'administrator') 
                    <a href="{{route('campustopic.update', ['topicId' => $campustopic->id, 'topicSlug' => $campustopic->slug])}}">&nbsp;&nbsp;Edit</a>@endif 

                    <a href="#reply" class="pull-right">reply</a>

                    </div>
                  </div>
                @endif
                  <div class="panel">
                  @foreach($campusposts as $post)
                  @include('partials.campuspostblock')
                  
                  @endforeach
                  <div class="text-center">
                  {!! $campusposts->render() !!}
                  </div>
                  </div>
                   @if($campustopic->thread_closed == 0)
                  @if(\App\User::find($campustopic->user_id)->institution_id == \Auth::user()->institution_id)
                   <div class="panel panel-default">
                  <div class="panel-body">
                   <form class="form-vertical" role="form" method="post" action="{{route('campustopic.reply',['topicId' => $campustopic->id,  'topicSlug' => $campustopic->slug])}}" enctype="multipart/form-data">
                  
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
                  <textarea class="form-control textbox" name="postbody" rows="3" id="myTextarea"></textarea>
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

           <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
               <br/>
              </br>
              @if(Auth::user()->role == 'administrator')
              
              </br>
              <div>
               <form class="form-vertical" role="form" method="post" action="{{route('campustopic.closethread',['topicId' => $campustopic->id,  'topicSlug' => $campustopic->slug])}}">
  <input type="submit" value="closethread" class="btn btn-danger pull-right btn-xs">
  <input type="hidden" name="_token" value="{{ csrf_token()}}">
</form>
</div>
                  
                 @endif
                  </div>
                  </div>
                  @endif
                   @else
                   <div class="col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">
                   <img src="{{asset($campustopic->getCloseThread())}}" alt="image" class="img-responsive ">
                    @if(Auth::user()->role == 'administrator')
                    <br/>
                   
                   <form class="form-vertical" role="form" method="post" action="{{route('campustopic.openthread',['topicId' => $campustopic->id,  'topicSlug' => $campustopic->slug])}}">
  <input type="submit" value="openthread" class="btn btn-primary btn-xs pull-right">
  <input type="hidden" name="_token" value="{{ csrf_token()}}">
</form>
 <br/>
  <br/>
   <br/>
@endif
                   </div>

                 @endif
                
                  </div>

          <script type="text/javascript">
            var token = '{{Session::token()}}';
            var urlLike = '{{route('campustopic.like', ['topicId' => $campustopic->id, 'slug' => $campustopic->slug])}}';
             
             
          </script>
@stop