<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<html>
	<head>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/styles2.css">
         <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!--  <link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
  <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
  <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/da-slider.css" />
  <!-- Owl Carousel Assets -->
  <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
		<style>
			body{
				background-image: url("background/b.jpg");
			}
		</style>
	<body>
		
		<header>
			<div class="website-header">
				<h1>AdvantureAura</h1>
				<div class="social-icons">

 				</div>
			</div>
			<nav class="navbar navbar-expand-md ">
  <!-- Brand -->
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="home.php">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="package.php">Online Package</a>
      </li>
     
		<li class="nav-item">
        <a class="nav-link" href="Feedback.php">Feedback</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="contact_form.php">Contact</a>
      </li> 
		<li class="nav-item">
        <a class="nav-link" href="register_form.php">Register Now</a>
      </li>
    </ul>
  </div> 
			</nav>
		</header>
    <body>
      
        <div class="head template clear">
            <h2>Feature</h2>
        </div>
        <div class="main template clear">
            <div class="service template clear">
                <h2>Online Package</h2>
                <img src="img/a.jpeg"width="500px" height="300px" >
                <p>E-commerce packaging refers to packaging that is meant to be used for shipping goods, which differentiates from retail packaging, which is used for items that end up on store shelves.</p>
                <div class="readmore">
                    <a href="package.php"> Get more details >> </a>
                </div>
            
            </div>
            <div class="service template clear">
                <h2>Hotel Booking</h2>
                <img src="img/h.jpg" width="500px" height="300px">
                <p>E-commerce packaging refers to packaging that is meant to be used for shipping goods, which differentiates from retail packaging, which is used for items that end up on store shelves.</p>
                <div class="readmore">
                    <a href="#"> Get more details >> </a>
                </div>
            
            </div>
            <div class="service template clear">
                <h2>Online Payment</h2>
                <img src="img/p.jpg" width="500px" height="300px" >
                <p>E-commerce packaging refers to packaging that is meant to be used for shipping goods, which differentiates from retail packaging, which is used for items that end up on store shelves.</p>
                <div class="readmore">
                    <a href="payment.php"> Get more details >> </a>
                </div>
            
            </div>
            <div class="service template clear">
                <h2>Contact</h2>
                <img src="img/c.jpeg" width="500px" height="300px">
                <p>E-commerce packaging refers to packaging that is meant to be used for shipping goods, which differentiates from retail packaging, which is used for items that end up on store shelves.</p>
                <div class="readmore">
                    <a href="contact_form.php"> Get more details >> </a>
                </div>
            
            </div>

        </div>
        <div class="footer template clear">
            <p>Copyright 2023@-Adventure Aura..</p>
        </div>
    </body>
</html>