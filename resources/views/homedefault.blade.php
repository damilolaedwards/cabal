<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="author" content="">
       <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
  
   <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('styles.css') }}">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <nav class="navbar navbar-default header" role="navigation">
      <div class="container">
        <div class="navbar-header ">
          <a href="{{route('homepage')}}"class="navbar-brand" id="h2">
            CampusCabal<span></span>
          </a>
          
        </div>
        
      </div>
    </nav>
    <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   @include('partials.alerts')


    @yield('content')
  </div>  
</div>

      @include('partials.loginfooter')
    
       <script src="{{ URL::asset('js/jquery.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
     <script type="text/javascript">
            var csrfToken = $('[name="csrf_token"]').attr('content');

            setInterval(refreshToken, 3600000); // 1 hour 

            function refreshToken(){
                $.get('refresh-csrf').done(function(data){
                    csrfToken = data; // the new token
                });
            }

            setInterval(refreshToken, 3600000); // 1 hour 

        </script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    </body>
  </html>