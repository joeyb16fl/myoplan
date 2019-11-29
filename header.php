<?php

include("functions/config.php");


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
		
        <meta name="keywords" content="Sports" />
        <meta name="description" content="Athletic League Management Tool" />
        <meta name="author" content="myoplan.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<title>MyoPlan Sports</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.png" />
        <!-- Font -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Arimo:300,400,700,400italic,700italic' />
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
        <!-- Font Awesome Icons -->
        <link href='css/font-awesome.min.css' rel='stylesheet' type='text/css' />
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/hover-dropdown-menu.css" rel="stylesheet" />
        <!-- Icomoon Icons -->
        <link href="css/icons.css" rel="stylesheet" />
        <!-- Revolution Slider -->
        <link href="css/revolution-slider.css" rel="stylesheet" />
        <link href="rs-plugin/css/settings.css" rel="stylesheet" />
        <!-- Animations -->
        <link href="css/animate.min.css" rel="stylesheet" />
        <!-- Owl Carousel Slider -->
        <link href="css/owl/owl.carousel.css" rel="stylesheet" />
        <link href="css/owl/owl.theme.css" rel="stylesheet" />
        <link href="css/owl/owl.transitions.css" rel="stylesheet" />
        <!-- PrettyPhoto Popup -->
        <link href="css/prettyPhoto.css" rel="stylesheet" />
        <!-- Custom Style -->
        <link href="css/style.css" rel="stylesheet" />
		<link href="css/responsive.css" rel="stylesheet">
        <!-- Color Scheme -->
        <link href="css/color.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fh-3.1.2/kt-2.2.0/r-2.1.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.css"/>
 
    </head>
    <body>
       <!-- Start of HubSpot Embed Code -->
         <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/2718514.js"></script>
       <!-- End of HubSpot Embed Code -->
    <div id="page">
		<!-- Page Loader -->
		<div id="pageloader">
			<div class="loader-item fa fa-spin text-color"></div>
		</div>
        <!-- Top Bar -->
        <div id="top-bar" class="top-bar-section top-bar-bg-color">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Top Contact -->
                        <div class="top-contact link-hover-black">
                        <a href='contact.php'>
                        <i class="fa fa-phone"></i> (844) 2000-MYO</a> 
                        <a href='contact.php'>
                        <i class="fa fa-envelope"></i>support@myoplansports.com</a></div>
                        <!-- Top Social Icon -->
                        <div class="top-social-icon icons-hover-black">
                        <a href="https://www.facebook.com/myoplansports">
                            <i class="fa fa-facebook"></i>
                        </a> 
                        <a href="https://www.twitter.com/myoplansports">
                            <i class="fa fa-twitter"></i>                     
                        </a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar -->
        <!-- Sticky Navbar -->
         <header id="sticker" class="sticky-navigation">
			<!-- Sticky Menu -->
            <div class="sticky-menu relative">
				<!-- navbar -->
				<div class="navbar navbar-default navbar-bg-light" role="navigation">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="navbar-header">
								<!-- Button For Responsive toggle -->
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span> 
								<span class="icon-bar"></span> 
								<span class="icon-bar"></span> 
								<span class="icon-bar"></span></button> 
								<!-- Logo -->
								 
								<a class="navbar-brand" href='http://www.myoplan.com/index.html'>
									<img class="site_logo" alt="Site Logo" width="190" height="86" src="img/logo.png" style="margin-top:4px"/>
								</a></div>
								<!-- Navbar Collapse -->
								<div class="navbar-collapse collapse">
									<!-- nav -->
									<ul class="nav navbar-nav">
										<!-- Home  Mega Menu -->
										<li class="mega-menu">
											<a href="index.php">Home</a>
											
										</li>
										<!-- Mega Menu Ends -->
										<!-- Pages Mega Menu -->
										<!--li class="mega-menu">
											<a href="about.php">About Us</a>
											</li-->
										<!-- Pages Menu Ends -->
										<!-- Portfolio Menu -->
										<li>
										<a href="contact.php">Contact</a> 
										<li>
										
										<!-- Blog Menu -->
										
										<!-- Blog Menu -->
										<!-- Contact Block -->
										<li>
											<a href="<?=(isset($_SESSION["name"]))? "logout.php":"login.php"?>"><?=(isset($_SESSION["name"]))? "Logout":"Login"?></a>
										</li>
										
										<!-- <li class="hidden-767"> -->
											<!-- <a href="#" class="header-search"> -->
												<!-- <span> -->
													<!-- <i class="fa fa-search"></i> -->
												<!-- </span> -->
											<!-- </a> -->
										<!-- </li> -->
									</ul>
									<!-- Right nav -->
									<!-- Header Contact Content -->
									<div class="bg-white hide-show-content no-display header-contact-content">
										<p class="vertically-absolute-middle">Call Us 
										<strong>+0 (123) 456 78 90</strong></p>
										<button class="close">
											<i class="fa fa-times"></i>
										</button>
									</div>
									<!-- Header Contact Content -->
									<!-- Header Search Content -->
									<div class="bg-white hide-show-content no-display header-search-content">
										<form role="search" class="navbar-form vertically-absolute-middle">
											<div class="form-group">
												<input type="text" placeholder="Enter your text &amp; Search Here" class="form-control" id="s" name="s" value="" />
											</div>
										</form>
										<button class="close">
											<i class="fa fa-times"></i>
										</button>
									</div>
									<!-- Header Search Content -->
									<!-- Header Share Content -->
									<div class="bg-white hide-show-content no-display header-share-content">
										<div class="vertically-absolute-middle social-icon gray-bg icons-circle i-3x">
										<a href="#">
											<i class="fa fa-facebook"></i>
										</a> 
										<a href="#">
											<i class="fa fa-twitter"></i>
										</a> 
										<a href="#">
											<i class="fa fa-pinterest"></i>
										</a> 
										<a href="#">
											<i class="fa fa-google"></i>
										</a> 
										<a href="#">
											<i class="fa fa-linkedin"></i>
										</a></div>
										<button class="close">
											<i class="fa fa-times"></i>
										</button>
									</div>
									<!-- Header Share Content -->
								</div>
								<!-- /.navbar-collapse -->
							</div>
							<!-- /.col-md-12 -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.container -->
				</div>
				<!-- navbar -->
			</div>
			 <!-- Sticky Menu -->
		</header>
