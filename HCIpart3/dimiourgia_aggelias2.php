<?php
	session_start();
	$θεση = $_POST['θεση'];
	$Τμήματα = $_POST['Τμήματα'];
	$Αμοιβή = $_POST['Αμοιβή'];
	$Απασχόληση = $_POST['Απασχόληση'];
	$Duration = $_POST['Διάρκεια'];
	$ΑριθμόςΘέσεων = $_POST['ΑριθμόςΘέσεων'];
    $Περιγραφή = $_POST['Περιγραφή'];
    $ΑριθμόςΘέσεων = $_POST['ΑριθμόςΘέσεων'];
    $Περιοχή = $_POST['Περιοχή'];
	$Κατάσταση = $_POST['Υποβολή'];
	$id = $_SESSION["recordnumber"];


if ($Duration == "3 Μήνες")
    $Διάρκεια = 3;
else
    $Διάρκεια = 6;


	// Database connection
	$conn = new mysqli('127.0.0.1','root','','sdi1900106', 3306);
	if($conn->connect_error){
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into aggelies(id_forea, Τμήμα, Θέση, Περιοχή, Διάρκεια, Ωράριο, Μισθός, Περιγραφή, Θέσεις, Κατάσταση) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("isssisisss", $id, $Τμήματα, $θεση, $Περιοχή, $Διάρκεια, $Απασχόληση, $Αμοιβή, $Περιγραφή, $ΑριθμόςΘέσεων, $Κατάσταση);
		$execval = $stmt->execute();
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
        header("Location: ./foreis.php");
	}
?>