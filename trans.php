<?php
session_start();
if (empty($_SESSION['regno'])) {
    header("location:index.html");
    exit();
} 
include_once 'db/dboperations.php';
 $objUser = new User();

if($_GET['type']=='faculty.php')
   { 
  
	$res=$objUser->faculty_sign($_GET['req_id'],$_GET['regno'],$_GET['status']);

	
	    header("location:faculty.php");
	  

   }
   
   
   if($_GET['type']=='hod.php')
   { 
  
	$res=$objUser->hod_sign($_GET['req_id'],$_GET['regno'],$_GET['status']);

	
	    header("location:hod.php");
	  

   }
   
   if($_GET['type']=='office.php')
   { 
  
	$res=$objUser->office_sign($_GET['req_id'],$_GET['regno'],$_GET['status']);
    echo $res;
	
	  //  header("location:office.php");
	  

   }
   
   
	


?>