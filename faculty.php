<?php
session_start();
include_once 'db/dboperations.php';
 $objUser = new User();
 echo $_SESSION['regno'];
 echo "<br/>".$_SESSION['id'];
 echo "<br/>".$_SESSION['type'];

	
	
	
	?>