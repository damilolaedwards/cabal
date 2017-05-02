
					 <div class="panel panel-default">
					  
                    <div class="panel-body less-padding">
                    
                   

					                 <p class="panelverdana"><a name="{{$post->id}}"></a>{!! str_replace($emotionfaces, $images, Linkify::process($post->linkifyYouTubeURLs(htmlentities($post->body))))!!}</p>
					@if($post->postimage1 !== NULL)
                    <p style="line-height: 5px;">

                    <img src="{{asset($post->getFirstImage())}}" alt="image" class="img-responsive antimoderate" >
                    </p>
                    
                    @endif
                    @if($post->postimage2 !== NULL)
                    <p style="line-height: 5px;">
                    <img src="{{asset($post->getSecondImage())}}" alt="image" class="img-responsive antimoderate">
                    </p>
                    
                     @endif
                    @if($post->postimage3 !== NULL)
                    <p style="line-height: 5px;">
                    <img src="{{asset($post->getThirdImage())}}" alt="image" class="img-responsive antimoderate" >
                    </p>
                    
                     @endif
                      @if($post->postfile !== NULL)
                      <p style="line-height: 5px;">
             <img src="{{asset($post->getPostFile())}}"><a href="{{$post->postfile}}" download="{{substr(stristr($post->postfile, '-'), 1)}}"> Download {{substr(stristr($post->postfile, '-'), 1)}}</a>
            </p>
              @endif
                    <span class="pull-right text-muted"><small><strong><a href="{{ route('profile',['username' => \App\User::find($post->user_id)->username])}}">{{\App\User::find($post->user_id)->username}}</a></strong>&nbsp; &nbsp;{{ $post->created_at->diffForHumans() }}</small></span>

                    </div>
                    <?php
                    $campuspostlike = 'campuspostlike'.$post->id;
                    $campuspostlikecount = \App\Postlike::where('post_id', $post->id)->count();
                    ?>

                  @if(Auth::check())
                  <div class="panel-footer" value="{{$post->id}}" >
                  <span id="{{$campuspostlike}}">@if($campuspostlikecount  !== 0){{ $campuspostlikecount}} @endif</span>

                  <a onclick="campuspostlike({{$post->id}})" href="#" data-like="{{route('campuspost.like', ['postId' => $post->id])}}" class="campuspostlike" >&nbsp;Like</a>
                   &nbsp;
                    &nbsp;
                    @if( $post->user_id !== Auth::user()->id)  
                   <a href="{{route('campuspost.report', ['postId' => $post->id])}}">Report</a>
                   @endif
                    @if($post->user_id == Auth::user()->id || Auth::user()->role == 'administrator') 
                   <a href="{{route('campuspost.update', ['postId' => $post->id, 'topicSlug' => \App\Campustopic::find($post->topic_id)->slug, 'topicId' => $post->topic_id])}}">&nbsp;&nbsp;Edit</a>@endif <a href="#reply" class="pull-right">reply</a>
                   </div>
                   @endif
                  </div>
