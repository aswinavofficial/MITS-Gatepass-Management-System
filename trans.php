<?php
session_start();
if (empty($_SESSION['regno'])) {
    header("location:index.html");
    exit();
} 
include_once 'db/dboperations.php';
 $objUser = new User();
 
 


?>