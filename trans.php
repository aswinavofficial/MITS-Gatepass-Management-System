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

	if(strcmp($_GET['status'],"GATEPASS_ISSUED")==0)
	{
		$res=$objUser->user_data($_SESSION['regno'],"STUDENT");
        $details=mysqli_fetch_assoc($res);
		$remarks="";
		$ToEmail=$details['email'];
		$res=$objUser->new_gatepass($_GET['req_id'],$_GET['regno'],$remarks);
		$subject="GATEPASS ISSUED";
		$response=sendmail_issued_gatepass($subject,$pname,$ToEmail,$message);
	}
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

	if(strcmp($_GET['status'],"GATEPASS_ISSUED")==0)
	{
		$remarks="";
		$res=$objUser->new_gatepass($_GET['req_id'],$_GET['regno'],$remarks);
	}
	
	    header("location:hod/index.php");
	  

   }
   
   if($_GET['type']=='office.php')
   { 
  
	$res=$objUser->office_sign($_GET['req_id'],$_GET['regno'],$_GET['status']);
    
	if(strcmp($_GET['status'],"GATEPASS_ISSUED")==0)
	{
		$remarks="";
		$res=$objUser->new_gatepass($_GET['req_id'],$_GET['regno'],$remarks);
	}
	  header("location:office/index.php");
	  

   }
   if($_GET['type']=='guard.php')
   { 
  
	$res=$objUser->guard_sign($_GET['req_id'],$_GET['regno'],$_GET['status']);
    
	
	  header("location:guard/index.php");
	  

   }
   
	


?>