<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Above Multi-purpose Free Bootstrap Responsive Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
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
							  <a href="entaksi.php">Ενσωμάτσωση Δουλειάς στην Πρακτική</a>
							  <a href="index.php">Πληροφορίες</a>
							</div>
						</ul>
						<ul class="dropdown">
							<a style="color:rgb(51, 91, 202);" class="dropbtn" href="foreis.php">Φορείς Υποδοχής</a>
							<div class="dropdown-content">
								<a href="dimiourgia_aggelias.php".php">Δημιουργία Αγγελίας</a>
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

		  <nav aria-label="breadcrumb">
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="index.php">Αρχική Σελίδα</a></li>
			  <li class="breadcrumb-item active" aria-current="page">Φορείς Υποδοχής</li>
			</ol>
		  </nav>

	</header>
	<!-- end header -->
	<section class="news-box top-margin">
        <div class="container">
            <div class="row">
       
                <div class="col-lg-4 col-md-4 col-sm-12">
					<a href="dimiourgia_aggelias.php">
                    <div class="newsBox">
                        <div class="thumbnail">
                            <!-- <figure><img src="assets/images/news2.jpg" alt=""></figure> -->
                            <div class="caption maxheight2">
                            <div class="box_inner">
                                        <div class="box">
                                            <p class="title"><strong>Δημιουργία Αγγελίας</strong></p>
                                            <p>Εδώ δύναται στους Φορείς Υποδοχής η δυνατότητα για διμιουργία νέας Αγγελίας για Πρακτική Άσκηση.</p>
                                        </div>
                                        <div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
					</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
					<a href="parakolouthisiforea.php">
                    <div class="newsBox">
                        <div class="thumbnail">
                            <!-- <figure><img src="assets/images/news3.jpg" alt=""></figure> -->
                            <div class="caption maxheight2">
                            <div class="box_inner">
                                        <div class="box">
                                            <p class="title"><strong>Παρακολούθηση Αγγελιών.</strong></p>
                                            <p>Μέσα απο εδω οι Φορείς Υποδοχής παρακολουθούν την πορεία των Αγγελιών τους και
												δύναται η δυνατότητα να τις επεξεργαστούν εφόσον δεν έχουν οριστικοποιηθεί.
											</p>
                                        </div>
                                        <div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
					</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
					<a href="parakaitiseonforea.php">
                    <div class="newsBox">
                        <div class="thumbnail">
                            <!-- <figure><img src="assets/images/news4.jpg" alt=""></figure> -->
                            <div class="caption maxheight2">
                           <div class="box_inner">
                                        <div class="box">
                                            <p class="title"><strong>Αιτήσεις Φοιτητών για θέσεις Πρακτικής Άσκησης</strong></p>
                                            <p>Λίστα με τις αιτήσεις που έχουν γίνει απο φοιτητές για θέση Πρακτικής Άσκησης</p>
                                        </div>
                                        <div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
					</a>
                </div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<a href="index.php">
                    <div class="newsBox">
                        <div class="thumbnail">
                            <!-- <figure><img src="assets/images/news4.jpg" alt=""></figure> -->
                            <div class="caption maxheight2">
                           <div class="box_inner">
                                        <div class="box">
                                            <p class="title"><strong>Πληροφορίες</strong></p>
                                            <p> </p>
                                        </div>
                                        <div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
					</a>
                </div>
            </div>
        </div>
    </section>
    
</div>
</body>