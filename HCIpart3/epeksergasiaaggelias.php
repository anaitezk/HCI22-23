<?php
session_start();
$x = $_GET['id'];
$conn = new mysqli('localhost', 'root', '', 'sdi1900106');
$result = mysqli_query($conn, "SELECT * FROM aggelies WHERE aggelies.id = $x");
$data = mysqli_fetch_assoc($result);
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
							  <a href="foitites.php">Πληροφορίες</a>
							</div>
						</ul>
						<ul class="dropdown">
							<a class="dropbtn" style="color: rgb(51, 91, 202);"  href="foreis.php">Φορείς Υποδοχής</a>
							<div class="dropdown-content">
								<a href="dimiourgia_aggelias.php">Δημιουργία Αγγελίας</a>
								<a style="color: rgb(51, 91, 202);" href="parakolouthisiforea.php">Παρακολούθηση Αγγελιών</a>
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
			  <li class="breadcrumb-item"><a href="foreis.php">Φορείς Υποδοχής</a></li>
              <li class="breadcrumb-item"><a href="parakolouthisiforea.php">Παρακολούθηση Αγγελιών</a></li>
              <li class="breadcrumb-item active" aria-current="page">Αγγελία <?php echo $data['Θέση'] ?></li>
			</ol>
		  </nav>

	</header>
    <hr>
    <section class="fill-form">
        <form action="./epeksergasia.php?id=<?php echo $data['id'] ?>" method="post">
        
        <h1>Δημιουργία Αγγελίας</h1>

        <label for="θεση">Θέση:</label><br>
        <input type="text" value="<?php echo $data["Θέση"] ?>" id="θεση" name="θεση" placeholder="π.χ. Developer"><br>

        <label for="Τμήματα">Τμήματα:</label><br>
        <input type="text" value="<?php echo $data["Τμήμα"] ?>" name="Τμήματα" id="Τμήματα" placeholder="π.χ. Τμήμα Πληροφορικής και Τηλεπικοινωνιών"><br>
        
        <label for="Περιοχή">Περιοχή:</label><br>
        <input type="text" value="<?php echo $data["Περιοχή"] ?>" name="Περιοχή" id="Περιοχή" placeholder="π.χ. Μαρούσι"><br>

        <label for="Αμοιβή">Αμοιβή:</label><br>
        <input style="width: 9%;" type="text" value="<?php echo $data["Μισθός"] ?>" name="Αμοιβή" id="Αμοιβή" placeholder="Από">
        
        <?php if($data["Ωράριο"] == 'Πλήρης Απασχόληση') { ?>
        <label for="Είδος Απασχόλησης">Είδος Απασχόλησης:</label><br>
        <input type="radio" checked="checked" name="Απασχόληση" id="Είδος Απασχόλησης" value="Πλήρης Απασχόληση">
        <label>Πλήρης Απασχόληση</label><br>
        <input type="radio" name="Απασχόληση" id="Είδος Απασχόλησης" value="Μερική Απασχόληση">
        <label>Μερική Απασχόληση</label><br>
        <?php } else { ?>
        <label for="Είδος Απασχόλησης">Είδος Απασχόλησης:</label><br>
        <input type="radio" name="Απασχόληση" id="Είδος Απασχόλησης" value="Πλήρης Απασχόληση">
        <label>Πλήρης Απασχόληση</label><br>
        <input type="radio" checked="checked" name="Απασχόληση" id="Είδος Απασχόλησης" value="Μερική Απασχόληση">
        <label>Μερική Απασχόληση</label><br>
        <?php }  ?>
        
        <?php if($data["Διάρκεια"] == 3) { ?>
        <label for="Διάρκεια">Διάρκεια:</label><br>
        <input type="radio" checked="checked" name="Διάρκεια" id="Διάρκεια" value="3 Μήνες">
        <label>3 Μήνες</label><br>
        <input type="radio"  name="Διάρκεια" id="Διάρκεια" value="6 Μήνες">
        <label>6 Μήνες</label><br>
        <?php } else { ?>
        <label for="Διάρκεια">Διάρκεια:</label><br>
        <input type="radio" name="Διάρκεια" id="Διάρκεια" value="3 Μήνες">
        <label>3 Μήνες</label><br>
        <input type="radio" checked="checked" name="Διάρκεια" id="Διάρκεια" value="6 Μήνες">
        <label>6 Μήνες</label><br>
        <?php } ?>

        <label for="Αριθμός Θέσεων">Αριθμός Θέσεων:</label><br>
        <input type="number" value="<?php echo $data["Θέσεις"] ?>" min="1" name="ΑριθμόςΘέσεων" id="ΑριθμόςΘέσεων" placeholder="π.χ. 3"><br>

        <label for="Περιγραφή">Περιγραφή Θέσης</label><br>
        <textarea id="Περιγραφή" name="Περιγραφή" rows="7" cols="100" placeholder="Γράψτε Κέιμενο"> <?php echo $data["Περιγραφή"] ?> </textarea><br>

        
        <input style="width: fit-content; background-color: darkseagreen;" type="submit" name="Υποβολή" value="Προσωρινή Αποθήκευση">
        <input type="submit" name="Υποβολή" value="Υποβολή">
        
        </form>
    </section>

</div>
</body>