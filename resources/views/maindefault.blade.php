<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="canonical" href="https://www.mycampus.ng/">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Rasa:500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
     <link href="{{ URL::asset('css/css/font-awesome.min.css') }}" rel="stylesheet">
   <title>@yield('title')</title>
   <meta itemprop="name" content="Mycampus - No.1 Student Online Community | Mycampus">
    <meta itemprop="description" content="Our purpose at mycampus.ng is to provide an avenue for limitless social and business interactions among students in every campus.">
    <meta itemprop="image" content="https://www.mycampus.ng/metaimage.jpg">
    <meta name="twitter:title" content="Mycampus - No.1 Student Online Community | Mycampus">
    <meta name="twitter:description" content="Our purpose at mycampus.ng is to provide an avenue for limitless social and business interactions among students in every campus.">
    <meta name="twitter:site" content="@mycampus">
    <meta name="twitter:creator" content="@mycampus">
    <meta name="twitter:image" content="https://www.mycampus.ng/metaimage.jpg">
    <meta property="og:url"           content="https://www.mycampus.ng" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Mycampus - No.1 Student Online Community | Mycampus" />
  <meta property="og:description"   content="Our purpose at mycampus.ng is to provide an avenue for limitless social and business interactions among students in every campus." />
  <meta property="og:image"         content="https://www.mycampus.ng/metaimage.jpg" />
   <meta property="og:site_name" content="Mycampus" />
    <meta class="swiftype" name="language" data-type="string" content="en" />
    <meta class="swiftype" name="title" data-type="string" content="Mycampus - No.1 Student Online Community" />
    <meta class="swiftype" name="description" data-type="string" content="Our purpose at mycampus.ng is to provide an avenue for limitless social and business interactions among students in every campus." />
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
    <div style="overflow:hidden">
    <nav class="navbar navbar-default header" role="navigation">
      <div class="container">
        <div class="navbar-header ">
          <a href="{{route('homepage')}}" class="navbar-brand" id="h2"> Mycampus<span style="margin-left: 10px;"></span>
            
          </a>
          @if(!Auth::check())
          <div class=" pull-right hidden-lg hidden-md foo" style="margin-right: 25px;">
            <a class="btn btn-primary navbar-btn btn-xs" href="{{route('Auth.login')}}" ><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>

            <a class="btn btn-info navbar-btn btn-xs" href="{{route('Auth.firstsignup')}}"  ><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
           
          </div>
           @endif
        </div>
     
      
      
       
          
       <div class="visible-lg visible-md">
       @if(Auth::check())
        <p class="padding_left navbar-right move_down"><a class="text_undecor" href="{{ route('profile',['username' => Auth::user()->username]) }}"><img class="img-circle " src="{{asset(Auth::user()->getUserProfileImage())}}" width="30" height="30" alt="{{Auth::user()->getUsername()}}" ><span class="text-muted"> {{Auth::user()->username}}</span></a></p>
        <span class="text-muted padding navbar-right move_down"> <a class="text_undecor" href="{{route('notification')}}"><i class="fa fa-bell-o fa-2x" aria-hidden="true"></i> @if($requestcount  !== 0)<span class="badge badge-warning-notif">
              {{$requestcount}}
           </span>@endif Notification</a></span>
         
         <span class="text-muted padding navbar-right move_down" style="padding-left: 60px;"> <a class="text_undecor" href="{{ route('messages') }}" ><i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>@if($unreadmessages !== 0)<span class="badge badge-warning">
               {{$unreadmessages}}
            
            
            </span> @endif Messages</a></span>
         @endif
         

 

       <form action="{{route('search')}}" role="form" class="navbar-form navbar-right">

          <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Find people...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit">Search</button>
            </span>
            </div>
            @if(!Auth::check())
             <a class="btn btn-info" href="{{route('Auth.firstsignup')}}"  style="margin-left: 150px;"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
           
            <a class="btn btn-primary" href="{{route('Auth.login')}}" style="margin-left: 15px;"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
            @endif
            </form>
           
        </div>
      </div>
    </nav>
    <div class="container">
    <div class=" body col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12
    ">
    
   

       
    @yield('content')
   
    
  
    </div>

</div>
     
       <script src="{{ URL::asset('js/jquery.js') }}"></script>
    <script src="{{ URL::asset('js/function.js') }}"></script>
     <script src="{{ URL::asset('js/likes.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-98358832-1', 'auto');
  ga('send', 'pageview');

</script>
   <script type="text/javascript">
            var csrfToken = $('[name="csrf_token"]').attr('content');

            //setInterval(refreshToken, 3600000); // 1 hour 

            function refreshToken(){
                $.get('refresh-csrf').done(function(data){
                    csrfToken = data; // the new token
                    console.log(data);
                });
            }

            setInterval(refreshToken, 3600000); // 1 hour 

        </script>


    </div>
    </body>
  </html>