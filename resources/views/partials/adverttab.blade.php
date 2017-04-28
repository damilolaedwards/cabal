
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
    <li role="presentation" class="garamond"><a href="{{route('homepage')}}">Forum</a></li>
    <li role="presentation" class="active garamond"><a href="{{route('advert.index')}}">Marketplace</a></li>
    <li role="presentation" class="garamond"><a href="{{route('event.index')}}">Events</a></li>
    
  </ul>
</div>
  <!-- Tab panes -->
  <div class="tab-content">
    
    <div role="tabpanel" class="tab-pane active" id="marketplace">
      <div class="list-group">
            <div class="list-group-item">
             <a href="{{route('marketplace.post')}}"><div class="btn btn-default">Post new Ad</div></a> 
            </div>
            <div class="panel panel-default">
            <div class="panel-heading"><strong class="font-less"><a name="vqRxsv9Xs"></a>All Ads</strong></div></div>

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
              <h4 class="media-heading"> {!! ucfirst(strtolower(htmlentities($advert->title))) !!}<a class="btn btn-primary view_button" href="{{ route('marketplace.view',['slug' => $advert->slug, 'advertId' => $advert->id]) }}" role="button">View</a></h4>
               
            </div>


          </div>
          </div>
          @endforeach
          <div class="text-center"> 
          {!! $adverts->render() !!}
          </div>
          @endif
          
         
          </div>
    </div>
    
      
           
    
    
  </div>

</div>