
        <div class="row text-align">
{{--
Institution header removed to avoid repitition 
to be considered for addition (and restyled) in version 1.1
@include('partials.institutionheader')


--}}
 
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
  <div class="panel-heading"><strong class="font-less"><a name="vSVBfc9Xs"></a>All Topics</strong></div>
<!-- List group -->
  <ul class="list-group">
              @if (!$topics->count())
             <div class="panel panel-default">
  <div class="panel-body">
              <p class="help-block">No Topic yet.</p>
              </div>
              </div>
              @else
              @foreach ($topics as $topic)
    <li class="list-group-item clearfix " style="text-align: center;"> >> <a href="{{ route('campustopic.view',['slug' => $topic->getTopicSlug(), 'id' => $topic->getTopicId()]) }}" class="darkblue font-less" >
{!! ucwords(strtolower(htmlentities($topic->title))) !!}
    </a></li>
     @endforeach
     @endif
          {!! $topics->render() !!}
         
  </ul>
</div>
    </div>
  </div>

</div>