
        <div class=row>
@include('partials.institutionheader')
<br/>
  <!-- Nav tabs -->
  <div class="shown.bs.tab">
  <ul class="nav nav-tabs nav-justified font" role="tablist" id="myTab">
    <li role="presentation" class="garamond" ><a href="{{route('homepage')}}">Forum</a></li>
    <li role="presentation" class="garamond"><a href="{{route('advert.index')}}">Marketplace</a></li>
    <li role="presentation" class="active garamond"><a href="{{route('event.index')}}">Events</a></li>
    
  </ul>
</div>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="events">
      <div class="list-group">
            <div class="list-group-item">
             <a href="{{route('event.post')}}"><div class="btn btn-default">Post new Event</div></a> 
            </div>
            <div class="panel panel-default">
            <div class="panel-heading"><strong class="font-less">All Events</strong></div></div>
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
                <img class="media-object" src="{{asset($event->getEventImage())}}" width="64" height="64" alt="..." >
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">{{ucfirst(strtolower($event->name))}}<a class="btn btn-primary view_button" href="{{ route('event.view',['slug' => $event->getEventSlug(), 'id' => $event->getEventId()]) }}" role="button">View</a></h4>
    
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