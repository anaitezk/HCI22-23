<?php
session_start();
$_SESSION["username"] = null;
unset($_SESSION["psw"]);
unset($_SESSION["name"]);
unset($_SESSION["recordnumber"]);
unset($_SESSION["usertype"]);
header('Refresh:0; url = index.php');
?>