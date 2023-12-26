<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<html>
	<head>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/styles1.css">
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
    <section id="contact">
        <h1 class="h-primary center">Feedback</h1>
        <div id="contact-box">
            <form action="insert.php" method="post">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number: </label>
                    <input type="phone" name="phonenumber" id="phone" placeholder="Enter your phone">
                </div>
                <div class="form-group">
                    <label for="message">Message: </label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                   <input type="submit" value="SUBMIT">
                </div>
                <div class="form-group">
                    <input type="reset" value="RESET">
                 </div>

            </form>
        </div>
    </section>
</body>
</html>