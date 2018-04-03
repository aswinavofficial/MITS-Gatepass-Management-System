<?php
session_start();
if (empty($_SESSION['regno'])) {
    header("location:index.html");
    exit();
} 
include_once 'db/dboperations.php';
include_once 'sendmail.php';
 $objUser = new User();

if($_GET['type']=='faculty.php')
   { 
  
	$res=$objUser->faculty_sign($_GET['req_id'],$_GET['regno'],$_GET['status']);

	if(strcmp($_GET['status'],"GATEPASS_ISSUED")==0)
	{
		$res=$objUser->user_data($_GET['s_regno'],"STUDENT");
		$s_regno=$_GET['s_regno'];
        $details=mysqli_fetch_assoc($res);
		$remarks="";
		$name=$details['name'];
		$ToEmail=$details['email'];
		$pname="";
		
		$res=$objUser->new_gatepass($_GET['req_id'],$_GET['regno'],$remarks);
		$subject="GATEPASS ISSUED";
		$message="<html> <body> <h1>GATEPASS ISSUED</h1><br/>
		
		<img src='https://iamaswin.me/mitsekurav2/qr.php?regno={$s_regno}'  alt='failed'>
		<br/><br/>
		
		</body></html>";
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
		$res=$objUser->user_data($_GET['s_regno'],"STUDENT");
		$s_regno=$_GET['s_regno'];
        $details=mysqli_fetch_assoc($res);
		$remarks="";
		$name=$details['name'];
		$ToEmail=$details['email'];
		$pname="";
		
		$res=$objUser->new_gatepass($_GET['req_id'],$_GET['regno'],$remarks);
		$subject="GATEPASS ISSUED";
		$message="<html> <body> <h1>GATEPASS ISSUED</h1><br/>
		
		<img src='https://iamaswin.me/mitsekurav2/qr.php?regno={$s_regno}'  alt='failed'>
		<br/><br/>
		
		</body></html>";
		$response=sendmail_issued_gatepass($subject,$pname,$ToEmail,$message);
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
   { $res=$objUser->guard_sign($_GET['req_id'],$_GET['regno'],$_GET['status']);
 /*  $rest=$objUser->user_data($_SESSION['regno'],"STUDENT");
   $details=mysqli_fetch_assoc($rest);
	
     $subject=$name." applied for Gate Pass";
	   $ToEmail=$details['parent_email'];
	   $message="Details of Request CATEGORY: ".$_POST['category']." REASON: ".$_POST['reason']." Time to leave : ".$day1;	 $response=sendmail_parent1($subject,$pname,$ToEmail,$message);
	*/  header("location:guard/index.php"); 
	  

   }
   
	


?>