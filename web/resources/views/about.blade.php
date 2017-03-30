<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>About-Us</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{url('/about')}}">About</a>
                    </li>
                    <li>
                        <a href="{{url('/contact')}}">Contact</a>
                    </li>
                    <li>
                    @if (Route::has('login'))
                      @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                      @else
                        <a href="{{ url('/login') }}">Login</a>
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

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">About
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">About</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive img-portfolio img-hover" src="images/logo.png" alt="" width="430" height="200">
            </div>
            <div class="col-md-6">
                <h2>About IRS</h2>
                <p>At IRS we solved the problem that most of the people complain about which is the time they waste waiting for their turn so their vehicle could be inspected.</p>
                <p>Here you can reserve an appointment at a specific time so you can get your vehicle inspected without waiting.</p>
                <br/>
                <p>Instead of waiting for a long time to get your car inspected, we will provide you a specific date & time to get your vehicle inspected.</p>
                <p>Therefore you don't need to take a day off from work and not getting the chance to finish your vehicle inspection.</p>
            </div>
        </div>
        <!-- /.row -->

        <!-- Team Members -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Our Team</h2>
            </div>
            <div class="col-md-6 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="Leaders/Issam1.jpg" alt="Issam Shahine">
                    <div class="caption">
                        <h3>Issam Shahine<br>
                            <small>Team Member</small>
                        </h3>
                        <p>Issam is responsible of the website, application developping and marketing strategist. He makes sure the team and budget are on track.</p>
                        <ul class="list-inline">
                            <li><a href="https://www.facebook.com/issam.shahine.7" target="_blank"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="Leaders/Mousbah1.jpg" alt="Mousbah Arabi">
                    <div class="caption">
                        <h3>Mousbah Arabi<br>
                            <small>Team Member</small>
                        </h3>
                        <p>Mousbah is responsible of the website, application developping and editing. He ensures that everything on the website and application is working, and is error-free.</p>
                        <ul class="list-inline">
                            <li><a href="https://www.facebook.com/mousbah.arabi.3" target="_blank"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="Leaders/Nasreddine1.jpg" alt="Nasreddine El Darazi">
                    <div class="caption">
                        <h3>Nasreddine El Darazi<br>
                            <small>Team Member</small>
                        </h3>
                        <p>Nasreddine is responsible of the website, application developping and content specialist of the IRS. He creates the content of each page of the website and application.</p>
                        <ul class="list-inline">
                            <li><a href="https://www.facebook.com/nasreddine.el.darazi" target="_blank"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="Leaders/Ali1.jpg" alt="Ali Banat">
                    <div class="caption">
                        <h3>Ali Banat<br>
                            <small>Team Member</small>
                        </h3>
                        <p>Ali is responsible of the website, application developping and design. He focuses developing templates and the graphic design for the website and application.</p>
                        <ul class="list-inline">
                            <li><a href="https://www.facebook.com/ali.banat.54" target="_blank"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy;<a href="{{url('/license')}}"> Your Website</a> 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
