<?php
	// Database connection
	$conn = new mysqli('127.0.0.1','root','','sdi1900106', 3306);
	

	$email = $_POST['email'];
	$Όνομα = $_POST['name'];
	$ΑΜ = $_POST['recordnumber'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$foreas = $_POST['foreas'];

	if ($foreas != "foreas") {
		$foreas = 'foititis';
	}

	if($password != $password2){
		echo '<script>alert("Προσοχή! Το συνθηματικό επιβεβαίωσης είναι διαφορετικό από το συνθηματικό!")</script>';
		$conn->close();
		header('Refresh:0; url = signin.html');
	}
	
	if($conn->connect_error){
		die("Connection Failed : ". $conn->connect_error);
	}

	$select = "SELECT * FROM users WHERE id = '$ΑΜ' OR email = '$email'";

	$result = mysqli_query($conn, $select);
	

	if(mysqli_num_rows($result) > 0 ){
		echo '<script>alert("Είσαι ήδη εγγεγραμμένος χρήστης!")</script>'; 
		header('Refresh:0; url = signin.html');
	}else {
		echo "<h1><center>$foreas!</center></h1>";
		$stmt = $conn->prepare("insert into users(id, email,name, password,usertype) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("issss", $ΑΜ, $email, $Όνομα,  $password, $foreas);
		$execval = $stmt->execute();
		echo '<script>alert("Επιτυχία εγγραφής!")</script>';
		header('Refresh:0; url = index.php');
		$stmt->close();
		$conn->close();
       
	}
?>