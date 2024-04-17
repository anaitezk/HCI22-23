<?php
session_start();
?>

<!DOCTYPE html>
<htmlv lang="en">
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
							<button onclick="window.location.href='profil.php';" ><?php echo $_SESSION["name"]?></button>
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
							<a style="color:rgb(51, 91, 202);" class="dropbtn" href="foreis.php">Φορείς Υποδοχής</a>
							<div class="dropdown-content">
								<a href="dimiourgia_aggelias.php">Δημιουργία Αγγελίας</a>
								<a href="parakolouthisiforea.php">Παρακολούθηση Αγγελιών</a>
								<a style="color:rgb(51, 91, 202);" href="parakaitiseonforea.php">Αιτήσεις Φοιτητών για θέσεις Π.Α.</a>
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
              <li class="breadcrumb-item"><a href="foreis.php">Φορείς Υποδοχής</a></li>
			  <li class="breadcrumb-item active" aria-current="page">Αιτήσεις Φοιτητών για θέσεις Πρακτικής Άσκησης</li>
			</ol>
		  </nav>

	</header>
	<!-- end header -->

	<?php
	if($_SESSION["username"] != null && $_SESSION["usertype"] == 'foreas'){
		$conn = new mysqli('localhost', 'root', '', 'sdi1900106');
		$x = $_SESSION["recordnumber"];
		$result = mysqli_query($conn, "SELECT users.*, aggelies.Θέση, aitiseis.id_aitisis, aitiseis.status, aitiseis.katastash
										FROM users, aitiseis, aggelies
										WHERE 
											users.id = aitiseis.id_foititi AND
											aitiseis.id_aggelias = aggelies.id AND
											aitiseis.id_forea = $x;");
	?>

    <hr>
    <section class="list">
		<div class="filter">

			<label for="Θέση Π.Α.">Θέση Π.Α.</label>
            <input type="text" name="Θέση Π.Α." id="Θέση Π.Α." placeholder="π.χ. Developer">

            <label for="Ημερομηνία">Ημερομηνία:</label><br>
            <label>Από</label>
            <input type="date" id="Ημερομηνία" name="Ημερομηνία"><br>
            <label>Μέχρι</label>
            <input type="date" id="Ημερομηνία" name="Ημερομηνία">

			<input type="button" value="Αναζήτηση">
		</div>
		<div class="items">
		<?php
			if (mysqli_num_rows($result) > 0) {
			$sn=1;
			while($data = mysqli_fetch_assoc($result)) {
				if($data['katastash'] == 'Υποβολή') {
		?>
			<li>
				<a href="./aitisiforeas.php?id=<?php echo $data['id'] ?>&id_aitisis=<?php echo $data['id_aitisis'] ?>"><h3><?php echo $data['Θέση']; ?></h3></a>
				<div class="content-grid">
					<div>
						<p><b>Τμήμα:</b> <?php echo $data['name']; ?></p>
						<p><b>Διάρκεια:</b> <?php echo $data['id']; ?></p>
						<p><b>Περιοχή:</b> <?php echo $data['email']; ?></p>
					</div>
				</div>
				<?php if($data['status'] == 'Εκκρεμεί') { ?>
					<input type="button" class="custom-button" style="background-color: red;" value="Απόρριψη" onclick="window.location.href='logosaporipsis.php?id=<?php echo $data['id_aitisis']?>'">
					<input type="button" class="custom-button" style="background-color: green;" value="Αποδοχή" onclick="window.location.href='egkrisi.php?id=<?php echo $data['id_aitisis']?>'">
				<?php } else if ($data['status'] == 'Εγκρίθηκε') { ?> 
					<span style="color: green;">Εγκρίθηκε</span>
				<?php } else if ($data['status'] == 'Απορρίφθηκε') { ?>
					<span style="color: red;">Απορρίφθηκε</span>
				<?php } ?>
			</li>
			<?php
				$sn++;
				} } } else { ?>
					<h3 style="margin: 20px; border">Δεν έχει γινει ακόμα αίτηση για κάποια από τις αγγελίες σας.</h3>
				<?php } ?>
		</div>
    </section>
	<?php } else { 
		?> <h1>Χρειάζεται να συνδεθείτε με λογαριασμό φορέα για να προχωρήσετε σε αυτή τη σελίδα <br> <a href="login.html"> Συνδεθείτε</a></h1>
	<?php } ?>
</div>
</body>