
					 <div class="panel panel-default">
					 
                    <div class="panel-body less-padding">
                   
					                 <p class="panelverdana"><a name="{{$post->id}}"></a>{!! str_replace($emotionfaces, $images, Linkify::process($post->linkifyYouTubeURLs(htmlentities($post->body))))!!}</p>
				 @if($post->postimage1 !==NULL)
                    <p style="line-height: 5px;">
                    <img src="{{asset($post->getFirstImage())}}" alt="image" class="img-responsive " >
                    </p>
                    
                    @endif
                    @if($post->postimage2 !== NULL)
                    <p style="line-height: 5px;">
                    <img src="{{asset($post->getSecondImage())}}" alt="image" class="img-responsive" >
                    </p>
                    
                     @endif
                    @if($post->postimage3 !== NULL)
                    <p style="line-height: 5px;">
                    <img src="{{asset($post->getThirdImage())}}" alt="image" class="img-responsive ">
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
                  $generalpostlike = 'generalpostlike'.$post->id;
                  $generalpostlikecount = \App\GeneralPostLike::where('post_id', $post->id)->count();
                  ?>
                  <div class="panel-footer"> @if($generalpostlikecount !==0)<span id="{{$generalpostlike}}">{{$generalpostlikecount}} </span> @endif<a onclick="generalpostlike({{$post->id}}, {{\App\Category::find($topic->category_id)->id}}, {{$post->id}})" data-id="{{$post->id}}" href="#">&nbsp;Like&nbsp; </a>
                  &nbsp;  @if($post->user_id !== Auth::user()->id)<a href="{{route('generalpost.report', [ 'postId' => $post->id, 'category' => \App\Category::find(\App\GeneralTopic::find($post->topic_id)->category_id)->name, 'topicId' => $post->topic_id, 'slug' => \App\GeneralTopic::find($post->topic_id)->slug, 'postId' => $post->id])}}">&nbsp;Report&nbsp;</a> @endif @if($post->user_id == Auth::user()->id || Auth::user()->role == 'administrator') 
                   &nbsp; 
                  <a href="{{route('generalpost.update', [ 'postId' => $post->id, 'category' => \App\Category::find(\App\GeneralTopic::find($post->topic_id)->category_id)->name, 'topicId' => $post->topic_id, 'slug' => \App\GeneralTopic::find($post->topic_id)->slug, 'postId' => $post->id])}}">&nbsp;Edit</a>@endif <a href="#reply" class="pull-right">reply</a>
                  </div>
                  
                  </div>
                   