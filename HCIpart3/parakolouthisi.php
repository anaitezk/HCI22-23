<?php
session_start();
?>_

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
							  <a style="color:rgb(51, 91, 202);" href="parakolouthisi.php">Παρακολούθηση Αιτήσεων</a>
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
              <li class="breadcrumb-item"><a href="foitites.php">Φοιτητές/Φοιτήτριες</a></li>
			  <li class="breadcrumb-item active" aria-current="page">Παρακολούθηση Αιτήσεων</li>
			</ol>
		  </nav>

	</header>
	<!-- end header -->

	<?php
	if($_SESSION["username"] != null && $_SESSION["usertype"] == 'foititis'){
		$conn = new mysqli('localhost', 'root', '', 'sdi1900106');
		$x = $_SESSION["recordnumber"];
		$result	 = mysqli_query($conn, "SELECT aggelies.*, aitiseis.status, aitiseis.katastash FROM aggelies, aitiseis WHERE aggelies.id = aitiseis.id_aggelias AND aitiseis.id_foititi = $x");
	?>


    <hr>
    <section class="list">
		<div class="filter">

			<label for="Κατάσταση Αίτησης">Κατάσταση Αίτησης:</label>
		
			<div>
				<input type="checkbox" onclick="myFunction('Κατάσταση Αίτησης', 4)" id="Κατάσταση Αίτησης" name="Προσωρινά">
				<label for="Προσωρινά">Προσωρινά Αποθηκευμένη</label>
			</div>
		
			<div>
				<input type="checkbox" onclick="myFunction('Κατάσταση Αίτησης', 4)" id="Κατάσταση Αίτησης" name="Οριστικοποιημένη">
				<label for="Οριστικοποιημένη">Οριστικοποιημένη</label>
			</div>

			<label for="tba">tba</label>

			<div>
				<input type="checkbox" onclick="myFunction('Εγγρίθηκε', 6)" id="Εγγρίθηκε" name="Εγγρίθηκε">
				<label for="Εγγρίθηκε">Εγγρίθηκε</label>
			</div>
			<div>
				<input type="checkbox" onclick="myFunction('Απορρίφθηκε', 6)" id="Απορρίφθηκε" name="Απορρίφθηκε">
				<label for="Απορρίφθηκε">Απορρίφθηκε</label>
			</div>
			<div>
				<input type="checkbox" onclick="myFunction('Εκκρεμεί', 6)" id="Εκκρεμεί" name="Εκκρεμεί">
				<label for="Εκκρεμεί">Εκκρεμεί</label>
			</div>

			<input type="button" value="Αναζήτηση">
		</div>
		<div class="items" id="agglist">
		<?php
			if (mysqli_num_rows($result) > 0) {
			$sn=1;
			while($data = mysqli_fetch_assoc($result)) {
		?>
			<li>
				<h3><?php echo $data['Θέση']; ?></h3>
				<div class="content-grid">
					<div>
						<p><b>Τμήμα:</b> <?php echo $data['Τμήμα']; ?></p>
						<p><b>Διάρκεια:</b> <?php echo $data['Διάρκεια']; ?> Μήνες</p>
						<p><b>Περιοχή:</b> <?php echo $data['Περιοχή']; ?></p>
					</div>
					<div>
						
						<p><b>Ωράριο:</b> <?php echo $data['Ωράριο']; ?></p>
						<p><b>Μισθός:</b> <?php echo $data['Μισθός']; ?></p>
					</div>
				</div>
					<?php if ($data['status'] == 'Εγκρίθηκε') { ?> 
						<h4 style="color: green;">Εγκρίθηκε</h4>
					<?php } else if ($data['status'] == 'Απορρίφθηκε') { ?>
						<h4 style="color: red;">Απορρίφθηκε</h4>
					<?php } else { ?>
						<h4 style="color: gray;">Εκκρεμεί</h4>
					<?php } ?>
					<?php
					if($data['katastash'] == "Προσωρινά Αποθηκευμένη"){
					?> 	
						<input class="custom-button" type="button" value="Επεξεργασία" onclick="window.location.href='epeksergasia.php'">
					<?php } ?>
			</li>
			<?php
				$sn++;}} else { ?>
					<h3 style="margin: 20px; border">Δεν έχετε κάνει ακόμα κάποια αίτηση. <a href="aggelies.php">Ψάξτε Αγγελίες</a></h3>
				<?php } ?>

		</div>
    </section>
	<?php } else  { ?>
		<h1>Χρειάζεται να συνδεθείτε με λογαριασμό φοιτητή για να προχωρήσετε σε αυτή τη σελίδα <br> <a href="login.html">Συνδεθείτε</a></h1>
	<?php } ?>
</div>
</body>

<script>
	function myFunction(myname, b) {
		var input, filter, ul, li, a, i, txtValue;
		input = document.getElementById(myname);
		filter = input.value.toUpperCase();
		ul = document.getElementById("agglist");
		li = ul.getElementsByTagName("li");
		for (i = 0; i < li.length; i++) {
			a = li[i].getElementsByTagName("a")[0];
			p = a.getElementsByTagName("p")[b];
			txtValue = p.textContent || p.innerText;
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				li[i].style.display = "";
			} else {
				li[i].style.display = "none";
			}
		}
	}
	</script>