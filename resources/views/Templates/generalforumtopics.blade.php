@extends('maindefault')
@section('title')
    Mycampus | {{$category->name}}
@stop
@section('metatitle')
Mycampus - No.1 Student Online Community | Mycampus
@stop
@section('metaimage')
https://www.mycampus.ng/webcontentimage.jpg
@stop
@section('content')
@include('partials.navigation')
@include('partials.forumheader')
@include('partials.alerts')
<div class="row">
<div class="panel panel-default panel-body-general">
  <!-- Default panel contents -->
  <li class="list-group-item"><a class="btn btn-default" href="{{route('generaltopic.create',['name' => $category->name])}}" role="button">Start new discussion</a></li>
  <div class="panel-heading font-less"><strong><a name="fbXy2yk"></a>All Topics</strong></div>
<!-- List group -->
  <ul class="list-group">
   @if (!$category->topics->count())
   
              <div class="panel panel-default">
  <div class="panel-body">
              <p class="help-block">No Topics yet.</p>
              </div>
              </div>
              @else
   @foreach($generaltopics as $topic)
    <li class="list-group-item clearfix"><a href="{{ route('generaltopic.view',['category' => $category->name, 'id' => $topic->id, 'slug' => $topic->slug]) }}" class="darkblue font-less" >{!! ucfirst(strtolower(htmlentities($topic->title)))!!}</a><span class="pull-right"><small>&nbsp;By&nbsp;<strong ><a href="#">{{$topic->user->getUsername()}}</a></strong>&nbsp; {{$topic->created_at->diffForHumans()}}</small></span></li>
    @endforeach
    @endif
  </ul>
  
</div>
<div class="text-center">
{!! $generaltopics->render() !!}
</div>
</div>
<footer>
  @include('partials.footer')
  </footer> 
@stop