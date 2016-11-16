
					 <div class="panel panel-default">
					  
                    <div class="panel-body less-padding">
                   
					                 <p>{!! str_replace($emotionfaces, $images, Linkify::process($post->body))!!}</p>
					@if($post->postimage1 !== NULL)
                    <p>
                    <img src="{{asset($post->getFirstImage())}}" alt="image" class="img-responsive antimoderate" >
                    </p>
                    
                    @endif
                    @if($post->postimage2 !== NULL)
                    <p>
                    <img src="{{asset($post->getSecondImage())}}" alt="image" class="img-responsive antimoderate">
                    </p>
                    
                     @endif
                    @if($post->postimage3 !== NULL)
                    <p>
                    <img src="{{asset($post->getThirdImage())}}" alt="image" class="img-responsive antimoderate" >
                    </p>
                    
                     @endif
                      @if($post->postfile !== NULL)
                      <p>
             <img src="{{asset($post->getPostFile())}}"><a href="{{substr(stristr($post->postfile, '-'), 1)}}" download="{{substr(stristr($post->postfile, '-'), 1)}}"> Download {{substr(stristr($post->postfile, '-'), 1)}}</a>
            </p>
              @endif
                    <span class="pull-right text-muted"><small><strong><a href="{{ route('profile',['username' => \App\User::find($post->user_id)->username])}}">{{\App\User::find($post->user_id)->username}}</a></strong>&nbsp; &nbsp;{{ $post->created_at->diffForHumans() }}</small></span>

                    </div>
                    <?php
                    $campuspostlike = 'campuspostlike'.$post->id;
                    $campuspostdislike = 'campuspostdislike'.$post->id;
                    ?>

                  
                  <div class="panel-footer" value="{{$post->id}}" >
                  <span id="{{$campuspostlike}}">{{\App\Postlike::where('post_id', $post->id)->count()}}</span>

                  <a onclick="campuspostlike({{$post->id}})" href="#" data-like="{{route('campuspost.like', ['postId' => $post->id])}}" class="campuspostlike" >&nbsp;Like</a>
                   &nbsp; &nbsp;<span id="{{ $campuspostdislike}}">{{\App\Postdislike::where('post_id', $post->id)->count()}}</span> 
                   <a onclick="campuspostdislike({{$post->id}})" href="#" data-dislike="{{route('campuspost.dislike', ['postId' => $post->id])}}" class="campuspostdislike" data-id="{{$post->id}}">Dislike</a> &nbsp;  
                   <a href="{{route('campuspost.report', ['postId' => $post->id])}}">Report</a> @if($post->user_id == Auth::user()->id || Auth::user()->role == 'administrator') 
                   <a href="{{route('campuspost.update', ['postId' => $post->id, 'topicSlug' => \App\Campustopic::find($post->topic_id)->slug, 'topicId' => $post->topic_id])}}">&nbsp;&nbsp;Edit</a>@endif <a href="#reply" class="pull-right">reply</a>
                   </div>
                   
                  </div>
