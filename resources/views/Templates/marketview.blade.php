 @extends('maindefault')

@section('content')
@include('partials.navigation')

         
<div class="row">

@if(Auth::user()->institution_id !== $advert->institution_id)
          @include('partials.advertinstitutionheader')
          @endif
        <h3 class="text-center text-muted">Campus Marketplace</h3>
      @include('partials.alerts')
        <div class="panel panel-default">
            <div class="panel-body">
            
             <div class="row">
            
            <div class="col-xs-12  col-md-6">
            <span class="label label-danger">Ad</span>
             <h4>{{ucfirst(strtolower($advert->title))}}</h4>
             <p>
                <img src="{{asset($advert->getAdvertImage())}}" alt="image" class="img-responsive img-rounded" width="320" height="240"">
                </p>
                @if($advert->advertfile && $advert->advertfile !== NULL)
                <p>
             <img src="{{asset($advert->getAdvertFile())}}"><a href="{{substr(stristr($advert->advertfile, '-'), 1)}}" download="{{substr(stristr($advert->advertfile, '-'), 1)}}"> Download {{substr(stristr($advert->advertfile, '-'), 1)}}</a>
             </p>
              @endif
              
             <div id="moreimages">
             @if($advert->advertimage2 !== NULL && $advert->advertimage2 !== $advert->getAdvertImage())
             <p>
             <img src="{{asset($advert->getAdvertImage2())}}" alt="image"  class="img-responsive img-rounded" style="max-width: unset;">
             </p>
             @endif
              @if($advert->advertimage3 !== NULL && $advert->advertimage3 !== $advert->getAdvertImage())
             <p>
              <img src="{{asset($advert->getAdvertImage3())}}" alt="image"  class="img-responsive img-rounded" style="max-width: unset;">
              </p>
              @endif
              </div>
            </div>
            <div class="col-md-6">
             @if($advert->description)
              <p class="lead">Description:</p>
              
               <p class="text-align">{!! str_replace($emotionfaces, $images, Linkify::process($advert->description))!!}</p>
              @else
              <p class="lead">Description:</p>
              <p class="text-align">Not Available</p>
              @endif
               @if($advert->price)
              <p class="lead">Price:</p>
              <p class="text-align">{{$advert->price}}</p>
              @else
              <p class="lead">Price:</p>
              <p class="text-align">Not Available</p>
              @endif
              
              @if($advert->negotiable == 1)
                <p><span class="label label-success">Negotiable</span></p>
               
                @endif 
                @if($advert->phone_number)
               <p class="lead">Contact:</p>
              <p class="text-align">{{$advert->phone_number}}</p>
              @else
              <p class="lead">Contact:</p>
              <p class="text-align text-muted">Not Available</p>
              @endif

              <?php
                  $advertlike = 'advertlike'.$advert->id;
                 
                  ?>

               

            <div class="text-center" value="{{$advert->id}}">
            &nbsp;
             
            <a onclick="advertlike({{$advert->id}})" class="btn btn-primary justify advertlike" data-id="{{$advert->id}}" href="#" role="button">&nbsp;<span class="badge" id="{{$advertlike}}">@if($advertlikecount  !== 0){{$advertlikecount}}@endif </span> Like&nbsp;<i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i></a>
           
              &nbsp;
              <a class="btn btn-success justify visible-xs visible-sm" href="whatsapp://send?text={{$advert->title. ' ' .Request::url()}}" data-action="share/whatsapp/share">Share on Whatsapp</a>
             
              &nbsp;
              @if(Auth::user()->id === $advert->user_id || Auth::user()->role == 'administrator')
              <a class="btn btn-info justify" href="{{route('advert.edit',['advertId' => $advert->id, 'slug' => $advert->slug])}}" role="button"><i class="fa fa-pencil-square-o fa-lg"></i> Edit</a>
               &nbsp;
              <a class="btn btn-danger justify" href="{{route('advert.delete',['advertId' => $advert->id, 'slug' => $advert->slug])}}" role="button"><i class="fa fa-trash-o fa-lg"></i> Delete</a>
              @endif
              </div>
                <br/>
                <span class="pull-right"><small>Posted by<strong><a href="{{ route('profile',['username' => \App\User::find($advert->user_id)->username])}}"> {{\App\User::find($advert->user_id)->username}}</a></strong>&nbsp; &nbsp{{ $advert->created_at->diffForHumans() }}</small></span>  
            <br/>
             <span class="pull-right clearfix message_to"><small><strong><a href="{{route('advert.report',['advertId' => $advert->id, 'slug' => $advert->slug])}}">Report</a></strong></small></span>
            </div>
               </div>
         
         
         
            </div>
          </div>
         </div>
          <script type="text/javascript">
            var token = '{{Session::token()}}';
            var urlLike = '{{route('advert.like', ['advertId' => $advert->id, 'slug' => $advert->slug])}}';
            
          </script>
           <footer>
  @include('partials.footer')
  </footer>
          @stop
