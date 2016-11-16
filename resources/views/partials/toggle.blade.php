<div class=row>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified font" role="tablist">
    <li role="presentation" class="active"><a href="#forum" aria-controls="forum" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#marketplace" aria-controls="marketplace" role="tab" data-toggle="tab">Marketplace</a></li>
    <li role="presentation"><a href="#events" aria-controls="events" role="tab" data-toggle="tab">Events</a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="forum">
      <div class="panel panel-default ">
  <!-- Default panel contents -->
  <div class="list-group-item">
             <a href="{{route('campustopic.create')}}"><div class="btn btn-default">Start new discussion</div></a> 
            </div>
  <div class="panel-heading"><strong>All Topics</strong></div>
<!-- List group -->
  <ul class="list-group">
   @if (!$topics->count())
   
              <div class="panel panel-default">
  <div class="panel-body">
              <p class="help-block">No Topics yet.</p>
              </div>
              </div>
              @else
              @foreach ($topics as $topic)
    <li class="list-group-item clearfix"><a href="{{ route('campustopic.view',['slug' => $topic->getTopicSlug(), 'id' => $topic->getTopicId()]) }}"><strong class="darkblue">{{$topic->title}}</strong></a><span class="pull-right"><small>By<strong ><a href="#">{{$topic->user->getUsername()}}</a>&nbsp; &nbsp;</strong>{{$topic->created_at->diffForHumans()}}</small></span></li>
     @endforeach
          {!! $topics->render() !!}
          @endif
  </ul>
</div>
    </div>
    <div role="tabpanel" class="tab-pane" id="marketplace">
      <div class="list-group">
            <div class="list-group-item">
             <a href="{{route('marketplace.post')}}"><div class="btn btn-default">Post new Ad</div></a> 
            </div>
            <div class="panel panel-default">
            <div class="panel-heading"><strong>All Ads</strong></div></div>
            </div>
    </div>
    
      <div class="list-group">
            <div class="list-group-item">
             <a href="{{route('marketplace.post')}}"><div class="btn btn-default">Post new Ad</div></a> 
            </div>
            <div class="panel panel-default">
            <div class="panel-heading"><strong>All Ads</strong></div></div>
            </div>
            <div class="list-group marketplace">
              @if (!$adverts->count())
             <div class="panel panel-default">
  <div class="panel-body">
              <p class="help-block">No advert yet.</p>
              </div>
              </div>
              @else
              @foreach ($adverts as $advert)
              <div class="list-group-item">
          <div class="media">
        <div class="media-left media-middle">
             
              <a href="#">

                <img class="media-object" src="{{asset($advert->getAdvertImage())}}"  width="64" height="64" alt="image">
              </a>
      
            </div>
            <div class="media-body">
              <h4 class="media-heading"> {{$advert->title}}<a class="btn btn-primary view_button" href="{{ route('marketplace.view',['title' => $advert->getAdvertTitle(), 'id' => $advert->getAdvertId()]) }}" role="button">View</a></h4>
               
            </div>


          </div>
          </div>
          @endforeach
          {!! $adverts->render() !!}
          @endif
          
         
          </div>
    
    <div role="tabpanel" class="tab-pane" id="events">
      <div class="list-group">
            <div class="list-group-item">
             <a href="{{route('event.post')}}"><div class="btn btn-default">Post new Event</div></a> 
            </div>
            <div class="panel panel-default">
            <div class="panel-heading"><strong>All Events</strong></div></div>
            </div>
            <div class="list-group marketplace">
         @if (!$events->count())
         <div class="panel panel-default">
  <div class="panel-body">
              <p class="help-block">No Event yet.</p>
              </div>
              </div>
              @else
              @foreach ($events as $event)
              <div class="list-group-item">
          <div class="media">
            <div class="media-left media-middle">
              <a href="#">
                <img class="media-object" src="{{asset($event->getEventImage())}}" width="64" height="64" alt="...">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">{{$event->name}}<a class="btn btn-primary view_button" href="{{ route('event.view',['slug' => $event->getEventSlug(), 'id' => $event->getEventId()]) }}" role="button">View</a></h4>
    
            </div>
          </div>
          </div>
           @endforeach
           {!! $events->render() !!}
          @endif
          
          </div>
    </div>
  </div>

</div>