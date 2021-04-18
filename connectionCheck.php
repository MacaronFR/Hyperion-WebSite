<?php
session_start();
$connected = isset($_SESSION['email']) ? true : false;
$admin = isset($_SESSION['haunter']) ? true : false;
$vendor = isset($_SESSION['vendor']) ? true : false;
 var_dump($_SESSION);
//$_SESSION['mail'];
//$_SESSION['level'];
//$_SESSION['name'];
//$_SESSION['token'];

?>
