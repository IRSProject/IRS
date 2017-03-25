<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href='css/global.css' type="text/css"/>
    <link rel="stylesheet" href='css/css_jq/base/jquery.ui.all.css'  type="text/css"/>
    <link rel="stylesheet" href='css/styles.css' type="text/css" />
    <link rel="stylesheet" href='css/full_mod.min.css' type="text/css" media="all" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <style>
   .carousel-inner > .item > img,
   .carousel-inner > .item > a > img
   {
       width: 70%;
       margin: auto;
   }
   .imageContainer {
      width:auto;
      height:auto;
      color: white;
      background-image: url('images/contactus.jpg');
    }
   </style>
    <title>IRS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">IRS</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#leadership">Leadership</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
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

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
          <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" scrolldelay="20" direction="left" width="645" height="20">
            <span>
              Vehicle inspection hours in all branches are from 7:30 AM till 4:15 PM from Monday to Saturday
            </span>
          </marquee>
            <div class="row">
                <div class="col-lg-30">
                  <div class="container">
                    <br>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <img src="images/Inspection1.jpg" alt="Chania" width="460" height="345">
                        </div>

                        <div class="item">
                          <img src="images/Inspection2.jpg" alt="Chania" width="460" height="345">
                        </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
              </div>
              <br />
              <!-- Exit Image -->
              <div class="container">
                <div class="well">
                  Focuses on statutory vehicle-inspection services, it organize the inspection appointments in each station around Lebanon.
                  It helps vehicle owners inspect their cars easily.
                </div>
              </div>
            </div>
        </div>
    </section>
    <br />

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div>
                  <section class="card card-lg" id="about-about">
                    <h1 class="text-xxxl m-b-sm m-t-sm text-xxs-center">- Our Mission -</h1>
                      <p class="text-sm m-b-lg text-xxs-center">Save time for vehicle owners.</p>
                      <br />
                        <h2 class="text-xxxl m-b-sm m-t-sm text-xxs-center">About</h2>
                            <p class="text-sm m-b-lg text-xxs-center">
                              At IRS we solved the problem that most of the people complain about which is the time they waste waiting for
                              their turn so their vehicle could be inspected.
                              <br />
                              Here you can reserve an appointment at a specific time so you can get your vehicle inspected without waiting.
                            </p>
                            <br />
                            <center><img src="images/logo.png" alt="logo"/></center>
                  </section>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Section -->
    <section id="leadership" class="leadership-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Leadership Section</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Services Section</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="content-body">
            <div class="imageContainer">
              <h1>Get In Touch With Us</h1>
              <p>We are here to help with anything</p>
            </div>
            <!-- Do not change the code! -->
                <a id="foxyform_embed_link_861850" href="http://www.foxyform.com/"></a>
                <script type="text/javascript">
                (function(d, t){
                   var g = d.createElement(t),
                       s = d.getElementsByTagName(t)[0];
                   g.src = "http://www.foxyform.com/js.php?id=861850&sec_hash=fe088d5ee44&width=350px";
                   s.parentNode.insertBefore(g, s);
                }(document, "script"));
                </script>
            <!-- Do not change the code! -->
        </div>

    </section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

</body>

</html>
