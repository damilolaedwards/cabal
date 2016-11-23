
        <div class=row>

@include('partials.institutionheader')
 
<br/>
  <!-- Nav tabs -->
  <div class="shown.bs.tab">
  <ul class="nav nav-tabs nav-justified font" role="tablist" id="myTab">
    <li role="presentation" class="active garamond"><a href="{{route('homepage')}}">Forum</a></li>
    <li role="presentation" class="garamond"><a href="{{route('advert.index')}}">Marketplace</a></li>
    <li role="presentation" class="garamond"><a href="{{route('event.index')}}">Events</a></li>
    
  </ul>
</div>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="forum">
      <div class="panel panel-default ">
  <!-- Default panel contents -->
  <div class="list-group-item">
             <a href="{{route('campustopic.create')}}"><div class="btn btn-default">Start new discussion</div></a> 
            </div>
  <div class="panel-heading"><strong class="font-less">All Topics</strong></div>
<!-- List group -->
  <ul class="list-group">
  
    <li class="list-group-item clearfix "><a href="{{route('welcome')}}" class="darkblue font-less" >
Welcome to CampusCabal!
    </a></li>
              
             
              @foreach ($topics as $topic)
    <li class="list-group-item clearfix "><a href="{{ route('campustopic.view',['slug' => $topic->getTopicSlug(), 'id' => $topic->getTopicId()]) }}" class="darkblue font-less" >
{{ucfirst(strtolower($topic->title))}}
    </a><span class="pull-right"><small>&nbsp;By&nbsp;<strong class="text-muted"><a href="{{route('profile',['username' => \App\User::find($topic->user_id)->username])}}">{{$topic->user->getUsername()}}</a>&nbsp; &nbsp;</strong>{{$topic->created_at->diffForHumans()}}</small></span></li>
     @endforeach
          {!! $topics->render() !!}
         
  </ul>
</div>
    </div>
  </div>

</div>