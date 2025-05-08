<?php
$path = "http://".$_SERVER['HTTP_HOST']."/garage";
$main_path = $_SERVER['DOCUMENT_ROOT']."/garage"; 
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
 require('conn.php');
if(!$_SESSION['username'])
{
    header('Location: '.$main_path.'/index.php');
}


?>
