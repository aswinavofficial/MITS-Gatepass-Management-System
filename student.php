<?php
session_start();
include_once 'db/dboperations.php';
 $objUser = new User();


   if(isset($_POST['category']))
   {
	   echo "inside post <br/>";
	   $day1 = strtotime($_POST["datetime"]);
       $day1 = date('Y-m-d H:i:s', $day1); 
	   $result=$objUser->request($_SESSION['regno'],$_POST['category'],$_POST['reason'],$day1);
       echo $result;
	   
	  
	  

   }
	
	
	
	?>
	
	
	<!DOCTYPE html>
<html lang="en">
<head>
	<title>Request</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/0.9.3/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.27/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.0.3/nouislider.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/request.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-datepicker.css">

<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="student.php" method="post">
				<span class="contact100-form-title">
					NEW REQUEST
				</span>


				

				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Reason Category</span>
					<div>
						<select class="js-select2" name="category" >
							<option>Please chooses</option>
							<option>Health Problems</option>
							<option>Attending Events</option>
							<option>Private Functions</option>
			                <option>Other</option>

						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				
			<!--	<div class="wrap-input100  bg1 rs1-wrap-input100 date1" >
					<span class="label-input100">Date</span>
					<input class="input100"   type="date" name="date1" placeholder="Enter Date ">
				</div> -->
             
				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Expected Time <br/></span>
					<input class="input100" type="text"  id="datetime24" data-format="DD-MM-YYYY HH:mm" data-template="DD / MM / YYYY     HH : mm"  name="datetime" value="10-03-2018 10:30">
				</div>
				


				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Reason</span>
					<textarea class="input100" name="reason" placeholder="Your message here..."></textarea>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn"name="reqsub" type="submit">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.27/daterangepicker.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.0.3/nouislider.min.js"></script>
	<script src="js/bootstrap-datepicker"></script>
    <script src="js/combodate.js"></script>
	<script src="js/request.js"></script>
	<script>
$(function(){
    $('#datetime24').combodate();  
});
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
