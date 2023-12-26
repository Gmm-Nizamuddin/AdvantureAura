<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{
	$pid=intval($_GET['pkgid']);
	$useremail=$_SESSION['login'];
	$fromdate=$_POST['fromdate'];
	$todate=$_POST['todate'];
	$comment=$_POST['comment'];
	$status=0;
	$sql="INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,Comment,status) VALUES(:pid,:useremail,:fromdate,:todate,:comment,:status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':pid',$pid,PDO::PARAM_STR);
	$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
	$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
	$query->bindParam(':todate',$todate,PDO::PARAM_STR);
	$query->bindParam(':comment',$comment,PDO::PARAM_STR);
	$query->bindParam(':status',$status,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
		$paymentAmount = 100; // Replace 100 with the actual payment amount
$_SESSION['bookingId'] = $lastInsertId;
$_SESSION['paymentAmount'] = $paymentAmount;
header('location: payment.php');

		/*echo '<script>alert("Booked Scuccessfully . Thank you")</script>';*/
	}
	else 
	{
		echo '<script>alert("Something Went Wrong. Please try again")</script>';
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
						<li class="prnt"><a href="change_password.php">Change Password</a></li>
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
			
		}?>
		
				
				<!--/.navbar-collapse-->
			</nav>
			<!--/.navbar-->
		</div>
		<!--/.container-->
	</header>
	<!--/.header-->
	<div id="#top"></div>
	<section id="home">
		<div class="banner-container" style="height: 0px;">
			<!-- <img src="images/banner-bg.jpg" alt="banner" /> -->
			<div class="container banner-content">
				<div id="da-slider" class="da-slider">
					<div class="da-slide">
						<h2>Tour Packages</h2>
						<p>Get your plans right away.. enjoy!!!</p>
						<div class="da-img"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--Package-->
	<section id="packages" class="secPad">
		<div class="container">
			<div class="heading text-center">
				<!-- Heading -->
				<h2>Package Details</h2>
				
			</div>
			<!--- selectroom ---->
			<div class="selectroom">
				<div class="container"> 
					<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
					else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
					<?php 
					$pid=intval($_GET['pkgid']);
					$sql = "SELECT * from tbltourpackages where PackageId=:pid";
					$query = $dbh->prepare($sql);
					$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=1;
					if($query->rowCount() > 0)
					{
						foreach($results as $result)
						{ 
							?>

							<div class="selectroom_top">
								<div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
									<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
								</div>
								<div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
									<h2><?php echo htmlentities($result->PackageName);?></h2>
									<p class="dow">#PKG-<?php echo htmlentities($result->PackageId);?></p>
									<p><b>Package Type :</b> <?php echo htmlentities($result->PackageType);?></p>
									<p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
									<p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p>

									<div class="clearfix"></div>
									<div class="grand">
										<p>Grand Total</p>
										
									</div>
								</div>
								<h3>Package Details</h3>
								<p style="padding-top: 1%"><?php echo htmlentities($result->PackageDetails);?> </p> 
								<div class="clearfix"></div>
							</div>
							<form name="book" method="post">
								<div class="selectroom_top">
									<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
										<div class="ban-bottom">
											<div class=" col-md-6 mr-2 ">
												<label class="inputLabel">From</label>
												<input class="form-control" id="datepicker" type="date" placeholder="dd-mm-yyyy"  name="fromdate" required="">
											</div>
											<div class=" col-md-6">
												<label class="inputLabel">To</label>
												<input class="form-control" id="datepicker1" type="date" placeholder="dd-mm-yyyy" name="todate" required="">
											</div>
										</div>
										<ul>

											<li class="spe">
												<label class="inputLabel">Comment</label>
												<textarea  class="form-control" rows="4" cols="4" type="text" name="comment" required=""></textarea>
											</li>
											<?php if($_SESSION['login'])
											{?>
												<li class="spe" align="center">
													<button type="submit" name="submit2" class="btn-primary btn">Book</button>
												</li>
												<?php 
											} else {?>
												<li class="sigi" align="center" style="margin-top: 1%">
													<a href="#" data-toggle="modal" data-target="#myModal4"  class="btn-primary btn" > Book</a>
												</li>
												<?php
											} ?>
											<div class="clearfix"></div>
										</ul>
									</div>
								</div>
							</form>
							<?php 
						}
					} ?>
				</div>
			</div>
			<!--- /selectroom ---->
		</div>
	</section>
	<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>
	<?php include('includes/footer.php');?>
	<!-- signup -->
	<?php include('includes/signup.php');?>     
	<!-- //signu -->
	<!-- signin -->
	<?php include('includes/signin.php');?>     
	<!-- //signin -->
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
