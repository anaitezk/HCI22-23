<?php
$x = $_GET['id'];
$logos = $_POST['logos'];


	// Database connection
	$conn = new mysqli('127.0.0.1','root','','sdi1900106', 3306);
	if($conn->connect_error){
		die("Connection Failed : ". $conn->connect_error);
	} else {
        $sql = "UPDATE aitiseis SET status='Απορρίφθηκε', Αιτιολογία='$logos' WHERE aitiseis.id_aitisis = '$x'";
        if($conn->query($sql) === true){
            ?><script>alert("Καλωσήρθες <?php echo $_SESSION["name"] ?>!")</script>;<?php
		    header('Refresh:0; url = epeksergasiaaggelias.php');
        } else {
            echo '<script>alert("Κάτι πήγε στραβά δοκιμάστε ξανά")</script>'; 
			header('Refresh:0; url = epeksergasiaaggelias.php?id=$x');
        }
        $conn->close();
        header("Location: ./parakaitiseonforea.php");
	}
?>