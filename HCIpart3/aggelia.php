<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'sdi1900106');
$id = $_GET['id'];
$result	 = mysqli_query($conn, "SELECT * FROM aggelies WHERE aggelies.Κατάσταση = 'Υποβολή' AND aggelies.id = '$id'");
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
            <?php $data = mysqli_fetch_assoc($result) ?>
            
            <div>
                <Label>Θέση</Label>
                <h5><?php echo $data['Θέση'] ?> </h5>
                <Label>Τμήμα</Label>
                <h5><?php echo $data['Τμήμα'] ?> </h5>
                <Label>Περιοχή</Label>
                <h5><?php echo $data['Περιοχή'] ?> </h5>
                <Label>Διάρκεια</Label>
                <h5><?php echo $data['Διάρκεια'] ?> </h5>
            </div>
            <div>
                
                <Label>Ωράριο</Label>
                <h5><?php echo $data['Ωράριο'] ?> </h5>
                <Label>Μισθός</Label>
                <h5><?php echo $data['Μισθός'] ?> </h5>
                <Label>Περιγραφή</Label>
                <h5><?php echo $data['Περιγραφή'] ?> </h5>
                <Label>Θέση</Label>
                <h5><?php echo $data['Τμήμα'] ?> </h5>
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
        </div>

		<div class="items" id="agglist">
		<?php
			if (mysqli_num_rows($result) > 0) {
			$sn=1;
			while($data = mysqli_fetch_assoc($result)) {
				if ($data['Θέσεις'] > 0) {
					?>
			<li>
				<a href="./aggelia.php?id=<?php echo $data['id'] ?>"> 
					<p><?php echo $data['Θέση']; ?></p><br>
					<p><?php echo $data['Τμήμα']; ?></p><br>
					<p><?php echo $data['Περιοχή']; ?></p><br>
					<p><?php echo $data['Διάρκεια']; ?> Μήνες</p><br>
					<p><?php echo $data['Ωράριο']; ?></p><br>
					<p><?php echo $data['Μισθός']; ?></p><br>
					<input type="button" value="Αίτηση" 
						<?php
						if ($_SESSION["username"] != NULL && $_SESSION["usertype"] == 'foititis') {
							?> 
							onclick="window.location.href='aitisi.php?id=<?php echo $data['id']?>'"
						<?php } else { ?>
							onclick="nologin()"
						<?php } ?>
					>
				</a>
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