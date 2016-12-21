@extends('maindefault')

@section('content')
@include('partials.navigation')
<div class="row">
 @if(Auth::user()->institution_id !== $advert->institution_id)
          @include('partials.eventinstitutionheader')
          @endif

        <h3 class="text-center text-muted">Campus Marketplace</h3>
     <div class="panel panel-default panel-forum">
        <div class="panel-body">
         <p class="lead">*Edit Ad</p>
          
              <form class="form-vertical" role="form" method="post" action="{{route('advert.edit', ['advertId' => $advert->id,  'slug' => $advert->slug])}}" enctype="multipart/form-data">
          <div class="form-group {{ $errors->has('title') ?  ' has-error' : '' }}">
            <label for="adtitle" class="control-label">Title</label>
            <input type="text" class="form-control" id="adtitle" name="title" value="{{Request::old('title') ?: $advert->title }}">
            @if($errors->has('title'))
              <span class="help-block">{{$errors->first('title')}}</span>
              @endif
          </div>
          <label for="addescription" class="control-label">Description</label>
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
          <div class="form-group {{ $errors->has('description') ?  ' has-error' : '' }}" >
            
          
            <textarea class="form-control" rows="5" id="myTextarea" name="description" >{{ Request::old('description') ?: $advert->description}}
            </textarea>
            @if($errors->has('description'))
              <span class="help-block">{{$errors->first('description')}}</span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('price') ?  ' has-error' : '' }}">
            <label for="adprice" class="control-label">Price</label>
            <input type="text" class="form-control" id="adprice" name="price" value="{{Request::old('price') ?: $advert->price }}">
            @if($errors->has('price'))
              <span class="help-block">{{$errors->first('price')}}</span>
              @endif
          </div>
          <div class="checkbox {{ $errors->has('negotiable') ?  ' has-error' : '' }}">
              <label class="control-label">
                <input type="checkbox" name="negotiable"   @<?php if ($advert->negotiable == 1): ?>
                  checked = "checked"
                <?php endif ?> 
                >Negotiable
              </label>
              @if($errors->has('negotiable'))
              <span class="help-block">{{$errors->first('negotiable')}}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('phone_number') ?  ' has-error' : '' }}">
            <label for="adphone">Phone number</label>
            <input type="tel" class="form-control" id="adphone" name="phone_number" value="{{Request::old('phone_number') ?: $advert->phone_number}}">
            @if($errors->has('phone_number'))
              <span class="help-block">{{$errors->first('phone_number')}}</span>
              @endif
          </div>
           
            
         
          
            <label class="control-label">Update image(s)</label>
           <div class="form-group {{ $errors->has('advertimage1') ?  ' has-error' : '' }}">
           @if($advert->advertimage1 !== NULL && Auth::user()->id === $advert->user_id)
           <span class="message_to">{{substr(stristr($advert->advertimage1, '-'), 1)}}</span><a href="{{route('advert.image1.delete',['advertId' => $advert->id, 'slug' => $advert->slug])}}"><div class="btn btn-xs btn-danger delete">delete</div></a>
           @else
            <input type="file" id="advertimage1" name="advertimage1" >
            @if($errors->has('advertimage1'))
              <span class="help-block">{{$errors->first('advertimage1')}}</span>
              @endif
              @endif
            </div>
           
            <input type="hidden" name="advertredirect" value="{{URL::previous()}}">
          <div class="form-group {{ $errors->has('advertimage2') ?  ' has-error' : '' }}">
          @if($advert->advertimage2 !== NULL && Auth::user()->id === $advert->user_id)
           <span class="message_to">{{substr(stristr($advert->advertimage2, '-'), 1)}}</span><a href="{{route('advert.image2.delete',['advertId' => $advert->id, 'slug' => $advert->slug])}}"><div class="btn btn-xs btn-danger delete">delete</div></a>
           @else
            <input type="file" id="advertimage2" name="advertimage2" >
            @if($errors->has('advertimage2'))
              <span class="help-block">{{$errors->first('advertimage2')}}</span>
              @endif
              @endif
            </div>
          <div class="form-group {{ $errors->has('advertimage3') ?  ' has-error' : '' }}">
          @if($advert->advertimage3 !== NULL && Auth::user()->id === $advert->user_id)
           <span class="message_to">{{substr(stristr($advert->advertimage3, '-'), 1)}}</span><a href="{{route('advert.image3.delete',['advertId' => $advert->id, 'slug' => $advert->slug])}}"><div class="btn btn-xs btn-danger delete">delete</div></a>
           @else
            <input type="file" id="advertimage3" name="advertimage3">
            @if($errors->has('advertimage3'))
              <span class="help-block">{{$errors->first('advertimage3')}}</span>
              @endif
              @endif
            <p class="help-block">Images must be in jpg, png or gif format.</p>
           </div>

           <div class="form-group {{ $errors->has('advertfile') ?  ' has-error' : '' }}">
           @if($advert->advertfile !== NULL && Auth::user()->id === $advert->user_id)
           <span class="message_to">{{substr(stristr($advert->advertfile, '-'), 1)}}</span><a href="{{route('advert.file.delete',['advertId' => $advert->id, 'slug' => $advert->slug])}}"><div class="btn btn-xs btn-danger delete">delete</div></a>
           @else
            <label for="advertfile">File input</label>
            
            <input type="file" id="advertfile" name="advertfile" >
             <p class="help-block">Files must be in pdf or docs format.</p>
            @if($errors->has('advertfile'))
              <span class="help-block">{{$errors->first('advertfile')}}</span>
              @endif
              @endif
           </div>
         
          <button type="submit" class="btn btn-primary pull-right">Update</button>
          <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
         </div>
          </div>
          </div>
@stop