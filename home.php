<?php
include('includes/config.php');

session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password']; // Do not use md5 here
    
    $select = "SELECT * FROM tblusers WHERE EmailId=:email";
    
    $stmt = $dbh->prepare($select);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    
    if($stmt->rowCount() > 0){
        $row = $stmt->fetch();
        
        // Verify the password
        if(password_verify($password, $row['Password'])){
            $_SESSION['login'] = $row['EmailId'];
            $_SESSION['login2'] = $row['FullName'];
            header('location: after_login_home_page.php');
        } else {
            $error[] = 'Incorrect email or password!';
        }
    }
    else{
        $error[] = 'Incorrect email or password!';
    }
}
?>


<html>
	<head>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="home-page-css.css">
         <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!--  <link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
  <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
  <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/da-slider.css" />
  <!-- Owl Carousel Assets -->
  <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
  <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-4a9dc23e-e4d9-4c14-abc6-3f5227ac7407"></div>
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
        <a class="nav-link" href="admin/index.php">Admin</a>

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
        <a class="nav-link" href="feature.php">Feature</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="feedback.php">Feedback</a>
      </li>
      <li class="nav-item">
	  <a class="nav-link" href="contact_form.php">Contact</a>
      </li> 
		<li class="nav-item">
        <a class="nav-link" href="register_form.php">Register</a>
      </li>
    </ul>
  </div> 
			</nav>
			<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 980px;
  position: relative;
  margin-right: auto;
  margin-left: 90;

  
}

.slideshow-container img {
  position: relative;
  top: 20px; /* Adjust the value to move the image downward */
  border: 4px solid black; /* Add a border to the image */
  box-sizing: border-box; /* Include the border within the image size */
}


/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
  position: relative;
  left: -150px; /* Adjust the value as per your requirement */
}


.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 10s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>
<body>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="images/inanibeach.jpg" style="width:100%">
  <div class="text"><h5>Inani Beach, part of Cox's Bazar Beach,
										 is an 18-kilometre-long sea beach in Ukhia Upazila of Cox's Bazar District, Bangladesh.
										  It has a lot of coral stones, which are very sharp.</h5>
									<p>11th may 2023</p></div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="images/Bandarban.jpg" style="width:100%">
  <div class="text"><h5>Best of Bandarban Essential Bandarban Do Places to see,
										 ways to wander, and signature experiences. </h5>
									<p>19th Jan 2022</p></div>
</div>

<div class="mySlides fade">
  <div class="numbertext"><h5>The Sundarbans is the world's largest mangrove forest,
										 spread between Bangladesh and India.</h5>
									<p>22th Dec 2021</p></div>
  <img src="images/bengal_tiger.jpg" style="width:100%">
  <div class="text"></div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 10000); // Change image every 2 seconds
}
</script>
                <div class="form">
                <form action="" method="post">
                <h2>Login now</h2>
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>
                <input type="email" name="email" required placeholder="enter your email">
                <input type="password" name="password" required placeholder="enter your password">
                <input type="submit" name="submit" value="login now" class="btnn">
                <p style="text-align: center;">
                <a href="forgot_password.php">Forgot password</a>
                </p>
                <p class="link">Don't have an account<br>
                <a href="register_form.php">Sign up </a> here</a></p>
                
            </form>

                    
			
		</main>
