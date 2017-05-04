@extends('maindefault')
@section('title')
Mycampus | Create advert
@stop
@section('metatitle')
Mycampus - No.1 Student Online Community | Mycampus
@stop
@section('metaimage')
https://www.mycampus.ng/webcontentimage.jpg
@stop
@section('content')
@include('partials.navigation')
<div class="row">

        <h3 class="text-center">Marketplace</h3>
     <div class="panel panel-default panel-forum">
        <div class="panel-body">
         <p class="lead">*New Ad</p>
          
              <form class="form-vertical" role="form" method="post" action="{{route('marketplace.post')}}" enctype="multipart/form-data">
          <div class="form-group {{ $errors->has('title') ?  ' has-error' : '' }}">
            <label for="adtitle" class="control-label">Title</label>
            <input type="text" class="form-control" id="adtitle" name="title" value="{{ Request::old('title') ?: ''}}">
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
            

            <textarea class="form-control" rows="5" id="myTextarea" name="description" >{{Request::old('description') ?: ''}}
            </textarea>
            @if($errors->has('description'))
              <span class="help-block">{{$errors->first('description')}}</span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('price') ?  ' has-error' : '' }}">
            <label for="adprice" class="control-label">Price</label>
            <input type="text" class="form-control" id="adprice" name="price" value="{{ Request::old('price') ?: ''}}">
            @if($errors->has('price'))
              <span class="help-block">{{$errors->first('price')}}</span>
              @endif
          </div>
          <div class="checkbox {{ $errors->has('negotiable') ?  ' has-error' : '' }}">
              <label class="control-label">
                <input type="checkbox" name="negotiable" value="negotiable" <?php if (Request::old('negotiable')=="negotiable"){ echo 'checked="checked"';} ?> 
                >Negotiable
              </label>
              @if($errors->has('negotiable'))

              <span class="help-block">{{$errors->first('negotiable')}}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('phone_number') ?  ' has-error' : '' }}">
            <label for="adphone">Phone number</label>
            <input type="tel" class="form-control" id="adphone" name="phone_number" value="{{ Request::old('phone_number') ?: ''}}">
            @if($errors->has('phone_number'))
              <span class="help-block">{{$errors->first('phone_number')}}</span>
              @endif
          </div>
           
            
         
          
            <label class="control-label">Add image</label>
            <div class="form-group {{ $errors->has('advertimage1') ?  ' has-error' : '' }}">
            <input type="file" id="advertimage1" name="advertimage1" value="{{ Request::old('advertimage1') ?: ''}}">
            @if($errors->has('advertimage1'))
              <span class="help-block">{{$errors->first('advertimage1')}}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('advertimage2') ?  ' has-error' : '' }}">
            <input type="file" id="advertimage2" name="advertimage2" value="{{ Request::old('advertimage2') ?: ''}}">
            @if($errors->has('advertimage2'))
              <span class="help-block">{{$errors->first('advertimage2')}}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('advertimage3') ?  ' has-error' : '' }}">
            <input type="file" id="advertimage3" name="advertimage3" value="{{ Request::old('advertimage3') ?: ''}}">
            @if($errors->has('advertimage3'))
              <span class="help-block">{{$errors->first('advertimage3')}}</span>
              @endif
            <p class="help-block">Images must be in jpg, png or gif format.</p>
           </div>

           <div class="form-group {{ $errors->has('advertfile') ?  ' has-error' : '' }}">
           
            <label for="eventfile">File input</label>
            
            <input type="file" id="advertfile" name="advertfile" value="{{ Request::old('advertfile') ?: ''}}">
             <p class="help-block">Files must be in pdf or docs format.</p>
            @if($errors->has('advertfile'))
              <span class="help-block">{{$errors->first('advertfile')}}</span>
              @endif
           </div>
         
          <button type="submit" class="btn btn-primary pull-right">Post</button>
          <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
         </div>
          </div>
          </div>
@stop