<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{ 
  header('location:after_login_home_page.php');
}
else{
  if(isset($_POST['submit5']))
  {
    $password=md5($_POST['password']);
    $newpassword=md5($_POST['newpassword']);
    $email=$_SESSION['login'];
    $sql ="SELECT Password FROM tblusers WHERE EmailId=:email and Password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if($query -> rowCount() > 0)
    {
      $con="update tblusers set Password=:newpassword where EmailId=:email";
      $chngpwd1 = $dbh->prepare($con);
      $chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
      $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
      $chngpwd1->execute();
      $msg="Your Password succesfully changed";
    }
    else {
      $error="Your current password is wrong";  
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
      <a class="nav-link" href="contact/contact_form.php">Contact</a>
      </li> 
		<li class="nav-item">
        <a class="nav-link" href="register_form.php">Register Now</a>
      </li>
    </ul>
  </div> 
			</nav>
		</header>

  <body>
    <header class="header">
    <?php if($_SESSION['login'])
    {?>
      <div class="top-header">
        <div class="container">
          <ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
            <li class="hm"><a href="after_login_home_page.php"><i class="fa fa-home"></i></a></li>
            <li class="prnt"><a href="profile.php">My Profile</a></li>
            <li class="prnt"><a href="change_password.php"data-toggle="modal" data-target="#myModal4">Change Password</a></li>
            <li class="prnt"><a href="tour_history.php">My Tour History</a></li>
          </ul>
          <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
            <li class="tol">Welcome :</li>        
            <li class="sig"><?php echo htmlentities($_SESSION['login']);?></li> 
            <li class="sigi"><a href="logout.php" >/ Logout</a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>
      <?php 
    } else 
    {
      ?>
      <div class="top-header">
        <div class="container">
          <ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
            <li class="hm"><a href="admin/index.php">Admin Login</a></li>
          </ul>
          <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
       
            <li class="sig"><a href="#" data-toggle="modal" data-target="#myModal" >Sign Up</a></li> 
            <li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4" >&nbsp; Sign In</a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>
      <?php 
    }?>
    <div class="container">
      <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">

          <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <!--/.navbar-header-->
        
        <!--/.navbar-collapse-->
      </nav>
      <!--/.navbar-->
    </div>
    <!--/.container-->
  </header>
    <!--/.header-->
    <div id="#top"></div>
    
</section>

<!--Package-->
<section id="packages" class="secPad">
  <div class="container">
    <div class="heading text-center">
      <!-- Heading -->
      <h2>Change Password</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
    </div>
    <div class="privacy">
      <div class="container">
        <h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Change Password</h3>
        <form name="chngpwd" method="post" onSubmit="return valid();">
          <?php 
          if($error)
          {
            ?>
            <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
            <?php 
          } else if($msg)
          {?>
            <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
            <?php
          }?>
          <p style="width: 350px;">
            <b>Current Password</b>  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Current Password" required="">
          </p> 

          <p style="width: 350px;">
            <b>New  Password</b>
            <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password" required="">
          </p>

          <p style="width: 350px;">
            <b>Confirm Password</b>
            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confrim Password" required="">
          </p>

          <p style="width: 350px;">
            <button type="submit" name="submit5" class="btn-primary btn">Change</button>
          </p>
        </form>
      </div>
    </div>
  </div> 
</div>
</section>
<?php include('includes/footer.php') ?>
<!-- signup -->
<?php include('includes/signup.php');?>     
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>     
<!-- //signin -->
<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>
<script src="js/modernizr-latest.js"></script>
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.isotope.min.js" type="text/javascript"></script>
<script src="js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="js/jquery.nav.js" type="text/javascript"></script>
<script src="js/jquery.cslider.js" type="text/javascript"></script>
<script src="contact/contact_me.js"></script>
<script src="js/custom.js" type="text/javascript"></script>
<script src="js/owl-carousel/owl.carousel.js"></script>
</body>
</html>
<?php 
} ?>
