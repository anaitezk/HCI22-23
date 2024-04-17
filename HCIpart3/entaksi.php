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
							  <a style="color:rgb(51, 91, 202);" href="entaksi.php">Ένταξη Δουλειάς στην Πρακτική</a>
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

		  <nav aria-label="breadcrumb">
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="index.php">Αρχική Σελίδα</a></li>
              <li class="breadcrumb-item"><a href="foitites.php">Φοιτητές/Φοιτήτριες</a></li>
			  <li class="breadcrumb-item active" aria-current="page">Ένταξη δουλειάς στην Πρακτική</li>
			</ol>
		  </nav>

	</header>
	<!-- end header -->
	<?php
	if($_SESSION["username"] != null && $_SESSION["usertype"] == 'foititis'){
		$conn = new mysqli('localhost', 'root', '', 'sdi1900106');
	?>

    <hr>
    <section class="list">
		<div class="filter">

			<label for="tba">tba</label>

			<div>
				<input type="checkbox" id="tba" name="Εγγρίθηκε">
				<label for="Εγγρίθηκε">Εγγρίθηκε</label>
			</div>
			<div>
				<input type="checkbox" id="tba" name="Απορρίφθηκε">
				<label for="Απορρίφθηκε">Απορρίφθηκε</label>
			</div>
			<div>
				<input type="checkbox" id="tba" name="Εκκρεμεί">
				<label for="Εκκρεμεί">Εκκρεμεί</label>
			</div>

			<input type="button" value="Αναζήτηση">
		</div>
		<div class="items">
			<li>
				<a>Developer</a>
				<a>karaflos</a>
				<a>logistis</a>
			</li>
		</div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 bg-light text-right">
                    <a href="aitisi-grafeio.php">
                    <button type="button" class="btn btn-primary">Αίτηση προς το γραφείο Πρακτικής Άσκησης <br> για έγκριση εργασίας ως πρακτική</button>
                    </a>
                </div>
            </div>
        </div>

    </section>
	<?php } else  { ?>
		<h1>Χρειάζεται να συνδεθείτε με λογαριασμό φοιτητή για να προχωρήσετε σε αυτή τη σελίδα <br> <a href="login.html">Συνδεθείτε</a></h1>
	<?php } ?>
</div>
</body>