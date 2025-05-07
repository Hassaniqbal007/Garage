<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
 require('conn.php');
if(!$_SESSION['username'])
{
    header('Location: index.php');
}


?>