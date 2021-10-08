<?php 
session_start();
$_SESSION['id_admin'];

unset($_SESSION['id_admin']);
session_unset();
session_destroy();
header("Location:login.php");

 ?>