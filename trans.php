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

	
	    header("location:faculty/index.php");
	  

   }
   
  if($_GET['type']=='forward_hod')
   { 
   echo $_GET['req_id'];
	$res=$objUser->forward_hod($_GET['req_id'],$_GET['regno'],$_GET['message']);
   echo $res;
	
	   header("location:faculty/index.php");
	  

   }
   
   if($_GET['type']=='hod.php')
   { 
  
	$res=$objUser->hod_sign($_GET['req_id'],$_GET['regno'],$_GET['status']);

	
	    header("location:hod/hod.php");
	  

   }
   
   if($_GET['type']=='office.php')
   { 
  
	$res=$objUser->office_sign($_GET['req_id'],$_GET['regno'],$_GET['status']);
    
	
	  header("location:office/office.php");
	  

   }
   if($_GET['type']=='guard.php')
   { 
  
	$res=$objUser->guard_sign($_GET['req_id'],$_GET['regno'],$_GET['status']);
    
	
	  header("location:guard/guard.php");
	  

   }
   
	


?>