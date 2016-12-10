<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <title>CampusCabal</title>
    <!-- Bootstrap Core CSS -->
  
   <link href="{{ URL::asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <style type="text/css">
body {


    background-color: #000; 
    background-image: url("campus.jpg"); 
    background-repeat: no-repeat; 
    background-position: center;
    background-attachment: fixed;       
    webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover; 
   
  

    html { height:100%,width:100%}


}


    </style>
   
   
        
    
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
          <a href="{{route('Auth.login')}}"class="navbar-brand">
            CampusCabal
          </a>
          
        </div>
        
      </div>
    </nav>
    <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  
  </div>  
</div>

     
    
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