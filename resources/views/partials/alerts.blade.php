<div class="row">
<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
@if (Session::has('info'))
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('info')}}
</div>

@endif

@if (Session::has('warning'))
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('warning')}}
</div>

@endif
</div>
</div>