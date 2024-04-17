<?php
$x = $_GET['id'];


	// Database connection
	$conn = new mysqli('127.0.0.1','root','','sdi1900106', 3306);
	if($conn->connect_error){
		die("Connection Failed : ". $conn->connect_error);
	} else {
        $sql = "UPDATE aitiseis SET status='Εγκρίθηκε' WHERE aitiseis.id_aitisis = '$x'";
        $conn->query($sql);



        $sql = "SELECT aitiseis.id_aggelias FROM aitiseis WHERE aitiseis.id_aitisis = '$x'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $id = $data['id_aggelias'];

        $sql = "SELECT aggelies.Θέσεις FROM aggelies WHERE aggelies.id = '$id'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $Θέσεις = $data['Θέσεις'] - 1;

        $sql = "UPDATE aggelies SET Θέσεις='$Θέσεις' WHERE aggelies.id = '$id'";
        $conn->query($sql);

        $conn->close();
        header("Location: ./parakaitiseonforea.php");
	}
?>