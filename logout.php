<?php
$path = "http://".$_SERVER['HTTP_HOST']."/garage";
$main_path = $_SERVER['DOCUMENT_ROOT']."/garage"; 
session_start();

	session_destroy();
	unset($_SESSION['user']);
	unset($_SESSION['user_name']);
	header($main_path."Location:index.php");
?>
