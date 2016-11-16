@extends('maindefault')

@section('content')
@include('partials.navigation')
<div class="row">
<div class="panel panel-default">
  <div class="panel-body">
  <h4>Search results for "{{ Request::input('query') }}"
  </h4>
  @if (!$users->count())
  <p>No result found</p>
  @else
  @foreach ($users as $user)
   @include('partials.searchblock')
   @endforeach
   <div class="text-center">
   {!! $users->render() !!}
   </div>
  </div>
</div>
</div>
@endif
@stop