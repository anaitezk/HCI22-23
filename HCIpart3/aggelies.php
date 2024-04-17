<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'sdi1900106');
$result	 = mysqli_query($conn, "SELECT * FROM aggelies WHERE aggelies.Κατάσταση = 'Υποβολή'");
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
			  <li class="breadcrumb-item active" aria-current="page">Αγγελίες Πρακτικής Άσκησης</li>
			</ol>
		  </nav>

	</header>
	<!-- end header -->
    <hr>
    <section class="list">
        <div class="filter">
			
			<label for="Τμήμα">Τμήμα</label>
			<input type="text" onkeyup="myFunction('Τμήμα', 1)" id="Τμήμα" placeholder="π.χ. Τμήμα Πληροφορικής και Τηλεπικοινωνιών">

			<label for="Θέση Π.Α.">Θέση Π.Α.</label>
			<input type="text" onkeyup="myFunction('Θέση Π.Α.', 0)" id="Θέση Π.Α." placeholder="π.χ. Developer">

			<label for="Περιοχή">Περιοχή</label>
			<input type="text" onkeyup="myFunction('Περιοχή', 2)" id="Περιοχή" name="Περιοχή" placeholder="π.χ. Μαρούσι">

			<label for="Διάρκεια">Διάρκεια</label>
			<div>
				<input type="checkbox" onclick="myFunction('3 Μήνες', 3)" id="3 Μήνες" name="Διάρκεια" value="3">
				<label for="3 Μήνες">3 Μήνες</label>
			</div>
		
			<div>
				<input type="checkbox" onclick="myFunction('6 Μήνες', 3)" id="6 Μήνες" name="Διάρκεια" value="6">
				<label for="6 Μήνες">6 Μήνες</label>
			</div>

			<label for="Είδος Απασχόλησης">Είδος Απασχόλησης</label>
			<div>
				<input type="checkbox" onclick="myFunction('Πλήρης', 4)" id="Πλήρης" name="Είδος Απασχόλησης" value="Πλήρης Απασχόληση">
				<label for="Πλήρης">Πλήρης</label>
			</div>
		
			<div>
				<input type="checkbox" onclick="myFunction('Μερική', 4)" id="Μερική" name="Είδος Απασχόλησης" value="Μερική Απασχόληση">
				<label for="Μερική">Μερική</label>
			</div>

			<label for="Αμοιβή">Αμοιβή:</label>
			<input style="width: 30%;" onkeyup="myComparisonMore('Από', 5)" type="text" id="Από" name="Αμοιβή" placeholder="Από">
			<input style="width: 30%;" onkeyup="myComparisonLess('Μέχρι', 5)" type="text" id="Μέχρι" name="Αμοιβή" placeholder="Μέχρι">

			<input type="button" value="Αναζήτηση">
		</div>
		<div class="items" id="agglist">
		<?php
			if (mysqli_num_rows($result) > 0) {
			$sn=1;
			while($data = mysqli_fetch_assoc($result)) {
				if ($data['Θέσεις'] > 0) {
					?>
			<li>
				<a href="./aggelia.php?id=<?php echo $data['id'] ?>"><h3><?php echo $data['Θέση']; ?></h3></a>
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
				<div>
					<?php if ($_SESSION["username"] != NULL && $_SESSION["usertype"] == 'foititis') { ?> 
					<input class="custom-button" type="button" value="Αίτηση" 
						<?php
						if ($_SESSION["username"] != NULL && $_SESSION["usertype"] == 'foititis') {
							?> 
							onclick="window.location.href='aitisi.php?id=<?php echo $data['id'] ?>'"
						<?php } else { ?>
							onclick="nologin()"
						<?php } ?>
					>
					<?php } ?>
					<a style="margin-left: 15px;" href="./aggelia.php?id=<?php echo $data['id'] ?>">Περισσότερες Πληροφορίες</a>
				</div>
			</li>
			<?php
			$sn++;
				}}} else { ?>
					
				<?php } ?>

		</div>
    </section>
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


<script>
function myComparisonMore(myname, b) {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById(myname);
    ul = document.getElementById("agglist");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
		p = a.getElementsByTagName("p")[b];
        txtValue = p.textContent || p.innerText;
        if (txtValue >= input.value) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

<script>
function myComparisonLess(myname, b) {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById(myname);
    ul = document.getElementById("agglist");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
		p = a.getElementsByTagName("p")[b];
        txtValue = p.textContent || p.innerText;
        if (txtValue <= input.value) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

<script>
function nologin(){
	alert("Απαιτείται Σύνδεση με λογαριασμό φοιτητή για αυτή την ενέργεια");
}
</script>