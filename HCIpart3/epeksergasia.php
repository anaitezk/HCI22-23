<?php
	$θεση = $_POST['θεση'];
	$Τμήματα = $_POST['Τμήματα'];
	$Αμοιβή = $_POST['Αμοιβή'];
	$Απασχόληση = $_POST['Απασχόληση'];
	$Duration = $_POST['Διάρκεια'];
	$ΑριθμόςΘέσεων = $_POST['ΑριθμόςΘέσεων'];
    $Περιγραφή = $_POST['Περιγραφή'];
    $Περιοχή = $_POST['Περιοχή'];
	$Κατάσταση = $_POST['Υποβολή'];
    $id = $_GET['id'];

if ($Duration == "3 Μήνες")
    $Διάρκεια = 3;
else
    $Διάρκεια = 6;




	// Database connection
	$conn = new mysqli('127.0.0.1','root','','sdi1900106', 3306);
	if($conn->connect_error){
		die("Connection Failed : ". $conn->connect_error);
	} else {
        $sql = "UPDATE aggelies SET Τμήμα = '$Τμήματα', Θέση='$θεση', Περιοχή='$Περιοχή', Διάρκεια='$Διάρκεια', Ωράριο='$Απασχόληση', Μισθός='$Αμοιβή', Περιγραφή='$Περιγραφή', Θέσεις='$ΑριθμόςΘέσεων', Κατάσταση='$Κατάσταση' WHERE aggelies.id = '$id'";
        if($conn->query($sql) === true){
            ?><script>alert("Καλωσήρθες <?php echo $_SESSION["name"] ?>!")</script>;<?php
		    header('Refresh:0; url = epeksergasiaaggelias.php');
        } else {
            echo '<script>alert("Κάτι πήγε στραβά δοκιμάστε ξανά")</script>'; 
			header('Refresh:0; url = epeksergasiaaggelias.php?id=$x');
        }
        $conn->close();
        header("Location: ./parakolouthisiforea.php");
	}
?>