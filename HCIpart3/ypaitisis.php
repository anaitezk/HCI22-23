<?php

    session_start();

    $id = $_GET['id'];

    $description = $_POST['Περιγραφή'];
    $katastash = $_POST['Υποβολή'];

    $conn = new mysqli('127.0.0.1','root','','sdi1900106', 3306);

    $result = mysqli_query($conn, "SELECT aggelies.id_forea FROM aggelies WHERE aggelies.id = '$id'");
    $data = mysqli_fetch_assoc($result);

    if($conn->connect_error){
        die("Connection Failed : ". $conn->connect_error);
    }

    $stmt = $conn->prepare("insert into aitiseis(id_forea, id_foititi, id_aggelias, Περιγραφή, katastash) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiss", $data['id_forea'], $_SESSION["recordnumber"], $id, $description, $katastash);
    $execval = $stmt->execute();
    unset($_SESSION["id_aggelias"]);
    unset($_SESSION["id_forea"]);
    echo '<script>alert("Η αίτηση σας υποβλήθηκε επιτυχώς!")</script>';
    header('Refresh:0; url = aggelies.php');
    $stmt->close();
    $conn->close();

?>