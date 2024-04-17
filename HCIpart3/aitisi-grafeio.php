<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Σύστημα Κεντρικής Υποστήριξης της Πρακτικής Άσκησης Φοιτητών ΑΕΙ</title>
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
							<a style="color:rgb(51, 91, 202);" class="dropbtn" href="foitites.php">Φοιτητές/τριες </a>
							<div class="dropdown-content">
							  <a href="parakolouthisi.php">Παρακολούθηση Αιτήσεων</a>
							  <a href="entaksi.php">Ένταξη Δουλειάς στην Πρακτική</a>
							  <a href="foitites.php">Πληροφορίες</a>
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

		  <nav aria-label="breadcrumb">
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="index.php">Αρχική Σελίδα</a></li>
              <li class="breadcrumb-item"><a href="foitites.php">Φοιτητές/Φοιτήτριες</a></li>
              <li class="breadcrumb-item"><a href="entaksi.php">Ένταξη δουλειάς στην Πρακτική</a></li>
			  <li class="breadcrumb-item active" aria-current="page">Αίτηση προς γραφείο Π.Α</li>
			</ol>
		  </nav>

	</header>
	<!-- end header -->

<section class="fill-form">
  <form action="/action_page.php">
    <h1>Αίτηση ένταξης εργασίας ως Π.Α.</h1>
    <label for="fname">Ονοματεπώνυμο</label>
    <input type="text" id="flname" name="Onomateponymo"><br>

    <label for="lname">Αριθμός Μητρώου</label>
    <input type="text" id="number" name="am" placeholder="π.χ 1115********"><br>

    <label for="country">Πανεπιστημιακό Ίδρυμα</label>
    <select id="country" name="country">
      <option value="australia">Πανεπιστήμιο 1</option>
      <option value="australia">Πανεπιστήμιο 2</option>
      <option value="australia">Πανεπιστήμιο 3</option>
      <option value="australia">Πανεπιστήμιο 4</option>
      <option value="australia">Πανεπιστήμιο 5</option>
    </select><br>
    
      <!-- <form> -->
        <label for="myfile">Επισυνάψτε την Βεβαίωση εργασίας σε μορφή εγγράφου:</label>
        <input type="file" id="myfile" name="myfile"><br><br>
      <!-- </form><br> -->

    <input type="submit" value="Υποβολή Αίτησης">
  </form>
</section>
</body>