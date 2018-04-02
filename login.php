<?php
session_start();
	include_once 'db/dboperations.php';
    $objUser = new User();
   $data=$objUser->login($_POST['regno'], $_POST['pass']);

    if (mysqli_num_rows($data) > 0) {
            $fetch_data = mysqli_fetch_assoc($data);
           $_SESSION['type'] = $fetch_data['reg_as'];
            $_SESSION['regno'] = $fetch_data['regno'];
			$_SESSION['id'] = $fetch_data['id'];
			if($_SESSION['type']=='STUDENT')
            header("location:student/index.php");
		     if($_SESSION['type']=='GUARD')
            header("location:guard/index.php");
		    if($_SESSION['type']=='FACULTY')
            header("location:faculty/index.php");  
		    if($_SESSION['type']=='HOD')
            header("location:hod/index.php"); 
		    if($_SESSION['type']=='ADMIN')
            header("location:admin/index.php"); 
		    if($_SESSION['type']=='OFFICE')
            header("location:office/index.php"); 
		
		
			
			 
        }
			   
		
		else {
            echo "<script>window.location='index.html';alert('Invalid User Name or Password !!')</script>";
        } 

?>
