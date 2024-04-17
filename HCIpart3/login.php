<?php

    // session start
    session_start();
	// Database connection
	$conn = new mysqli('127.0.0.1','root','','sdi1900106', 3306);
	

	$uname = $_POST['uname'];
	$psw = $_POST['psw'];
	
	if($conn->connect_error){
		die("Connection Failed : ". $conn->connect_error);
	}

	if (empty($uname)) {
	 	header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($psw)){
        header("Location: index.php?error=Password is required");
	    exit();
	 }else{
		$sql = "SELECT * FROM users WHERE email='$uname' AND password='$psw'";

		$result = mysqli_query($conn, $sql);

   		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    	$count = mysqli_num_rows($result);  
    	if($count == 1){
            $_SESSION["username"] = $uname;
            $_SESSION["psw"] = $psw;
            $_SESSION["name"] = $row['name'];
            $_SESSION["recordnumber"] = $row['id'];
            $_SESSION["usertype"] = $row['usertype'];
            ?><script>alert("Καλωσήρθες <?php echo $_SESSION["name"] ?>!")</script>;<?php
		    header('Refresh:0; url = index.php');
    	}
    	else{  
			echo '<script>alert("Τα στοιχεία πρόσβασης δεν είναι έγκυρα. Προσπάθησε ξανά!")</script>'; 
			header('Refresh:0; url = login.html');
		}
	}
    $conn->close();
?>