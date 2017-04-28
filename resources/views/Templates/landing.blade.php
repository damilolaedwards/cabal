
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mycampus</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->


    <!-- Header -->
   
    <header id="top" class="header">
    
        <div class="text-vertical-center ">
            
            <h1 class="landing" style="color: #d7d8aa;">Welcome to Mycampus</h1>
           
            <br>
            <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">
            <a href="{{route('Auth.login')}}" class="btn btn-dark btn-lg "><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
            <br/>
            <br/>
            <a href="{{route('Auth.firstsignup')}}" class="btn btn-dark btn-lg btn-block"><i class="fa fa-address-card-o" aria-hidden="true"></i> Register</a>
         
           
            
            </div>
        </div>
    </header>


    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Redefine your campus experience.</h2>
                    <p class="lead">It takes less than a minute to become a member of this expanding community.</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>What's inside</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-comments-o fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>General Forum</strong>
                                </h4>
                                <p>Interact with students of other institutions; participate in the top/trending discussions in areas like politics, sports romance etc.</p>
                                
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-commenting-o fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Campus Forum</strong>
                                </h4>
                                <p>Share your views, opinions and reactions concerning recent happenings within and outside your campus.
</p>
                                
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-shopping-cart fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Campus Marketplace</strong>
                                </h4>
                                <p>The ideal place for buyers to meet sellers on campus, promoting trade and entrepreneurship.</p>
                                
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-calendar fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Campus Events</strong>
                                </h4>
                                <p>Get everyone informed about upcoming campus events; The perfect event board for all and sundry. </p>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Callout -->
    

   

    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Mycampus {{date('Y')}}</p>
                </div>
            </div>
        </div>
        
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    
</body>

</html>
