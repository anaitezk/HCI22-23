<?php
session_start();
if (!isset($_SESSION["username"]))
	$_SESSION["username"] = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

<meta charset="utf-8">
<title>Σύστημα Κεντρικής Υποστήριξης της Πρακτικής Άσκησης Φοιτητών ΑΕΙ</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />

<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" />

</head>
<body>

<div id="wrapper">
	<!-- start header -->
	<header>
		<link rel="shortcut icon" href="img/atlas_tab.png">
        <div style="background-color: #ffffff;" class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-default" href="index.php"><img src="img/atlas_logo.png" alt="logo"/></a>
                </div>
				<?php
				if($_SESSION["username"] == NULL){
				?>
				<div class="profile">
					<button onclick="window.location.href='login.html';" >Log in</button>
					<button onclick="window.location.href='signin.html';">Sign in</button>
				</div> 
				<?php } else {
					?>  <div class="profile"> 
							<button onclick="window.location.href='profil.php';" ><?php echo $_SESSION["name"] ?></button>
							<a href="logout.php">Αποσύνδεση</a>
						</div>

					<?php
				} ?>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
						<ul class="dropdown"><a href="aggelies.php">Αγγελίες Πρακτικής Άσκησης</a></ul>
						<ul class="dropdown">
							<a class="dropbtn" href="foitites.php">Φοιτητές/τριες </a>
							<div class="dropdown-content">
							  <a href="parakolouthisi.php">Παρακολούθηση Αιτήσεων</a>
							  <a href="entaksi.php">Ένταξη Δουλειάς στην Πρακτική</a>
							  <a href="index.php">Πληροφορίες</a>
							</div>
						</ul>
						<ul class="dropdown">
							<a class="dropbtn" href="foreis.php">Φορείς Υποδοχής</a>
							<div class="dropdown-content">
								<a href="dimiourgia_aggelias.php">Δημιουργία Αγγελίας</a>
								<a href="parakolouthisiforea.php">Παρακολούθηση Αγγελιών</a>
								<a href="parakaitiseonforea.php">Αιτήσεις Φοιτητών για θέσεις Π.Α.</a>
								<a href="index.php">Πληροφορίες</a>
							</div>
						</ul>
						<ul class="dropdown"><a href="grafeia.php">Γραφεία Πρακτικής Άσκησης</a></ul>
                    </ul>
                </div>
            </div>
        </div>

	</header>
	<!-- end header -->
	<section id="featured">
	 
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="img/slides/1.jpg" alt="" />
                <div class="flex-caption">
                    <div class="item_introtext"> 
						<strong>Αναζήτηση Αγγελιών</strong>
						<p>
							<div class="s002">
								<form  method="GET">
								  <div class="inner-form">
									<div class="input-field first-wrap">
									  <input id="search" type="text" placeholder="Τμήμα" />
									  
									</div>
									<div class="input-field second-wrap">
									  <input id="search" type="text" placeholder="Θέση Π.Α." />
									</div>
									<div class="input-field third-wrap">
									  <div class="icon-wrap">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
											<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
										</svg>
									  </div>
									  <input id="search" type="text" placeholder="Περιοχή" />
									</div>
									<div class="input-field fouth-wrap">
									  <div class="icon-wrap">
										<svg scr="svg/duartion.svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										  <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
										</svg>
									  </div>
									  <select data-trigger="" name="choices-single-defaul">
										<option placeholder="">3 μήνες</option>
										<option>6 μήνες</option>
									  </select>
									</div>
									<div class="input-field fifth-wrap">
									  <button style="background-color: rgb(88, 143, 226);"class="btn-search" type="button"  onclick="window.location.href='aggelies.php';">Αναζήτηση</button>
									</div>
								  </div>
								</form>
							</div>
						</p>
					</div>
                </div>
              </li>
            </ul>
        </div>



	<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="widget">
					<h5 style="color: black;" class="widgetheading">About us</h5>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 style="color: black;" class="widgetheading">FAQs</h5>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 style="color: black;" class="widgetheading">Πληροφορίες</h5>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script> 
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script src="js/owl-carousel/owl.carousel.js"></script>
</body>
</php>