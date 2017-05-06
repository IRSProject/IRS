<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/dropdown.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>IRS</title>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">IRS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="{{url('/about')}}">About</a>
                    </li>
                    <li>
                        <a href="{{url('/contact')}}">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                    @if (Route::has('login'))
                      @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                      @else
                      <a href="{{url('/login')}}" class="dropdown-toggle" data-toggle="dropdown">Log In <span class="caret"></span></a>
                     <ul class="dropdown-menu dropdown-lr animated flipInX" role="menu">
                       <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                           {{ csrf_field() }}

                           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                               <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                               <div class="col-md-6">
                                   <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder ="someone@someone.com">

                                   @if ($errors->has('email'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('email') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                               <label for="password" class="col-md-4 control-label">Password</label>

                               <div class="col-md-6">
                                   <input id="password" type="password" class="form-control" name="password" required>

                                   @if ($errors->has('password'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('password') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group">
                               <div class="col-md-6 col-md-offset-4">
                                   <div class="checkbox">
                                       <label>
                                           <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                       </label>
                                   </div>
                               </div>
                           </div>

                           <div class="form-group">
                               <div class="col-md-8 col-md-offset-4">
                                   <button type="submit" class="btn btn-primary">
                                       Login
                                   </button>

                                   <a class="btn btn-link" href="{{ route('password.request') }}">
                                       Forgot Your Password?
                                   </a>
                               </div>
                           </div>
                       </form>
                     </ul>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">Register</a>
                      @endif
                    @endif
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('images/Inspection1.jpg');"></div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/Inspection2.jpg');"></div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">
      <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="4" scrolldelay="20" direction="left">
        <span>
          Vehicle inspection hours in all branches are from 7:30 AM till 4:15 PM from Monday to Saturday
        </span>
      </marquee>
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Inspection Reservation System
                </h1>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> What is IRS</h4>
                    </div>
                    <div class="panel-body">
                        <p>Focuses on statutory vehicle-inspection services, it organize the inspection appointments in each station around Lebanon.
                          It helps vehicle owners inspect their cars easily.</p>
                        <a href="{{url('/about')}}" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> Easy to Use</h4>
                    </div>
                    <div class="panel-body">
                        <p>-----</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Download Section -->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">IRS Application</h2>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="#">
                    <img class="img-responsive img-portfolio img-hover" src="images/android.jpg">
                </a>
            </div>
            <div class="col-md-8 ">
              <p> We've developed an <strong> android application </strong> for you to make your online reservation easier and more efficient, you can download it on any android device. </p>
              <p>To download the application simply <strong>Click the picture!</strong></p>
            </div>
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">- Our Mission -</h2>
            </div>
            <div class="col-md-6">
                <ul>
                    <li><strong>Save your time.</strong></li>
                    <li>Make your inspection procedure easy.</li>
                    <li>Get your inspection process done faster.</li>
                    <li>Make your life easier.</li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6">
                <img class="img-responsive img-portfolio img-hover" src="images/logo.png" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Reach US : Whether you are an old, current, or future client Dont leave us hanging.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="{{url('/contact')}}">Contact us</a>
                </div>
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy;<a href="{{url('/license')}}"> Your Website</a> 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
