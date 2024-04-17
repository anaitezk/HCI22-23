<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'sdi1900106');
$id = $_GET['id'];
$result	 = mysqli_query($conn, "SELECT * FROM users WHERE users.id = '$id'");
$data = mysqli_fetch_assoc($result);
$id_aitisis = $_GET['id_aitisis'];
$result = mysqli_query($conn, "SELECT * FROM aitiseis WHERE aitiseis.id_aitisis = '$id_aitisis'");
$dataa = mysqli_fetch_assoc($result);
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
						<ul class="dropdown"><a style="color: rgb(51, 91, 202);" href="aggelies.php">Αγγελίες Πρακτικής Άσκησης</a></ul>
						<ul class="dropdown">
							<a class="dropbtn" href="foitites.php">Φοιτητές/τριες </a>
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
								<a href="foreis.php">Πληροφορίες</a>
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
			  <li class="breadcrumb-item"><a href="aggelies.php">Αγγελίες Πρακτικής Άσκησης</a></li>
			  <li class="breadcrumb-item active" aria-current="page">Αγγελία <?php echo $id ?></li>
			</ol>
		  </nav>

	</header>
	<!-- end header -->
    <hr>
    <section class="list">
        <div class="fill-form" style="display: grid; grid-template-columns: 50% 50%;">
            
            <div>
                <Label>Θέση</Label>
                <h5><?php echo $data['name'] ?> </h5>
                <Label>Τμήμα</Label>
                <h5>Πρέπει να λεει τμήμα εδώ αλλα δεν το εχουμε στο db <?php echo $data['id'] ?> </h5>
            </div>
            <div>
                <Label>Περιγραφή</Label>
                <h5><?php if ($dataa != null) {
                    echo $dataa['Περιγραφή'];
                } else {
                    echo 'Δεν υπάρχει περιγραφή';} ?> </h5>
            </div>
            <?php if($dataa['status'] == 'Εκκρεμεί') { ?>
                <input type="button" class="custom-button" style="background-color: red;" value="Απόρριψη" onclick="window.location.href='logosaporipsis.php?id=<?php echo $data['id_aitisis']?>'">
                <input type="button" class="custom-button" style="background-color: green;" value="Αποδοχή" onclick="window.location.href='egkrisi.php?id=<?php echo $data['id_aitisis']?>'">
            <?php } else if ($dataa['status'] == 'Εγκρίθηκε') { ?> 
                <span style="color: green;">Εγκρίθηκε</span>
            <?php } else if ($dataa['status'] == 'Απορρίφθηκε') { ?>
                <span style="color: red;">Απορρίφθηκε</span>
            <?php } ?>
        </div>
    </section>
</div>
</body>

