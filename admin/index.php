
<?php

$no1=-1;
$permit=0;
session_start();
include_once '../db/dboperations.php';
$student['name']="";
$student['photo']="";
$student['branch']="";
$student['batch']="";
if (empty($_SESSION['regno'])) {
    header("location:../index.php");
    exit();
} 

 $objUser = new User();
 $res=$objUser->user_data($_SESSION['regno'],"GUARD");
 $details=mysqli_fetch_assoc($res);
 if(isset($_POST['submit']))
 {
	 $dob = strtotime($_POST["dob"]);
       $dob = date('Y-m-d H:i:s', $dob); 
$objUser->add_student($_POST['s_regno'],$_POST['name'],$_POST['gender'],$_POST['branch'],$_POST['batch'],$_POST['email'],$_POST['mobno'],$_POST['pname'],$_POST['parent_email'],$_POST['parent_mobno']);
move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/students/{$_POST['s_regno']}.jpg");
$password=$objUser->random_str(32);
$det=$objUser->reg($_POST['s_regno'],$password,"STUDENT");
 echo "<script>Added new Student with id : '$det' </script>";
 }

?>	
	

<!DOCTYPE html>
<html class=" ">
    <head>
        
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>MITSEKURA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

    




        <!-- CORE CSS FRAMEWORK - START -->
        <link href="../assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
	 <link href="../assets/plugins/jquery-ui/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" media="screen"/>
	 <link href="../assets/plugins/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" media="screen"/>
<!--	 <link href="../assets/plugins/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen"/> -->
	 <link href="../assets/plugins/timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" media="screen"/>
	 <link href="../assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen"/>
<!--	 <link href="../assets/plugins/tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" media="screen"/> -->
	 <link href="../assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<!--	 <link href="../assets/plugins/typeahead/css/typeahead.css" rel="stylesheet" type="text/css" media="screen"/> -->
      <link href="../assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>      



		<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
         <link href="../assets/plugins/responsive-tables/css/rwd-table.min.css" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
  integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
  crossorigin=""/>
		<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" "><!-- START TOPBAR -->
        <div class='page-topbar '>
            <div class='logo-area'>

            </div>
            <div class='quick-area'>
                <div class='pull-left'>
                    <ul class="info-menu left-links list-inline list-unstyled">
                        <li class="sidebar-toggle-wrap">
                            <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                        <li class="message-toggle-wrapper">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <i class="fa fa-envelope"></i>
                                <span class="badge badge-primary">7</span>
                            </a>
                            <ul class="dropdown-menu messages animated fadeIn">

                                <li class="list">

                                    <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                        <li class="unread status-available">
                                            <a href="javascript:;">
                                                <div class="user-img">
                                                    <img src="imglink" alt="" class="img-circle img-inline">
                                                </div>
                                                <div>
                                                    <span class="name">
                                                        <strong>Faculty Name</strong>
                                                    
                                                    </span>
                                                    <span class="desc small">
                                                        message content
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                   

                                    </ul>

                                </li>

                               
                            </ul>

                        </li>
                        <li class="notify-toggle-wrapper">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <i class="fa fa-bell"></i>
                                <span class="badge badge-orange">3</span>
                            </a>
                            
                        </li>
                        <li class="hidden-sm hidden-xs searchform">
                            
                        </li>
                    </ul>
                </div>		
                <div class='pull-right'>
                    <ul class="info-menu right-links list-inline list-unstyled">
                        <li class="profile">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <img src="../images/guard/<?php echo $details['photo']; ?>" alt="" class="img-circle img-inline">
                                <span><?php echo $details['name']; ?><i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul class="dropdown-menu profile animated fadeIn">
                              
                                <li>
                                    <a href="#profile">
                                        <i class="fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>
                                
                                <li class="last">
                                    <a href="../logout.php">
                                        <i class="fa fa-lock"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                       
                    </ul>			
                </div>		
            </div>

        </div>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <div class="page-sidebar ">

                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

                    <!-- USER INFO - START -->
                    <div class="profile-info row">

                        <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                            <a href="">
                                <img src="../images/guard/<?php echo $details['photo']; ?>" alt="" class="img-responsive img-circle">
                            </a>
                        </div>

                        <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h2>
                                <a href=""><?php echo $details['name']; ?></a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h2>

                            <p class="profile-title"><?php echo $details['position']; ?></p>

                        </div>

                    </div>
                    <!-- USER INFO - END -->



                    <ul class='wraplist'>	


                        <li class=""> 
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Search for Gatepass</span>
                            </a>
                        </li>
						
                        <li class=""> 
                            <a href="notifications.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Notifications</span>
                            </a>
                        </li>
						
                        <li class=""> 
                            <a href="details.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Activity Log</span>
                            </a>
                        </li>
						
						 <li class=""> 
                            <a href="parking_status.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Parking Status</span>
                            </a>
                        </li>
             

                    </ul>

                </div>
                <!-- MAIN MENU - END -->



               



            </div>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            

                          

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">ADD STUDENT</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body"> 
							<div class="row">
                                 <div class="col-md-12 col-sm-12 col-xs-12">
								 <div class="row">
                                    <form action ="index.php" method="post" enctype="multipart/form-data">
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">

										<div class="form-group">
                                                <label class="form-label" for="field-1">Registration Number</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" value="" name="s_regno" class="form-control" id="field-1">
                                                </div>
                                            </div>
										
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Name</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" name="name" value="" class="form-control" id="field-1">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label" for="field-5">Date of Birth</label>
                                                <span class="desc">e.g. "04/03/2015"</span>
                                                <div class="controls">
                                                    <input type="text" name="dob" value="" class="form-control datepicker" data-format="mm/dd/yyyy" value="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-5">Gender</label>
                                                <span class="desc"></span>
                                                <select name="gender" class="form-control">
                                                    <option></option>
                                                    <option >Male</option>
                                                    <option >Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Profile Image</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="file" name="photo" class="form-control" id="field-5">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-5">Department</label>
                                                <span class="desc"></span>
                                                <select name="branch" class="form-control ">
                                                    <option></option>
                                                    <option  value="CSE">Computer Science & Engineering</option>
                                                    <option value="ECE">Electronics & Communication Engineering</option>
                                                    <option value="ME">Mechanical Engineering</option>
                                                    <option value="EEE">Electrical & Electronics Engineering</option>
                                                    <option value="CE">Civil Engineering</option>
                               
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Batch</label>
                                                <span class="desc">Eg : 2015</span>
                                                <div class="controls">
                                                    <input type="text" name="batch" value="" class="form-control" id="field-1">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Email</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="email" name="email" value="" class="form-control" id="field-3">
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="form-label" for="field-2">Mobile Number</label>
                                                <span class="desc">Eg: 987654321</span>
                                                <div class="controls">
                                                    <input type="text" name="mobno" value="" class="form-control" id="field-2" >
                                                </div>
                                            </div>
											
											
											<div class="form-group">
                                                <label class="form-label" for="field-1">Parent Name</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" name="pname" value="" class="form-control" id="field-1">
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="form-label" for="field-1">Parent Email</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="email" name="parent_email" value="" class="form-control" id="field-3">
                                                </div>
                                            </div>
											
											
											<div class="form-group">
                                                <label class="form-label" for="field-2">Parent Mobile Number</label>
                                                <span class="desc">Eg: 987654321</span>
                                                <div class="controls">
                                                    <input type="text" name="parent_mobno" value="" class="form-control" id="field-2" >
                                                </div>
                                            </div>
                     
                                            

                                        </div>

                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                            <div class="text-left">
                                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                             <!--   <button type="button" class="btn">Cancel</button> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
								 
								
									
									</div>	
									</div>
									
							
									
                            </div>
                        </section></div>



                </section>
            </section>
            <!-- END CONTENT -->
     
        <!-- END CONTAINER -->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


        <!-- CORE JS FRAMEWORK - START --> 
        <script src="../assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <script src="../assets/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="../assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="../assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
		        <script src="../assets/plugins/autosize/autosize.min.js" type="text/javascript"></script><script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
                <script src="../assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> 
				<script src="../assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script>
				<script src="../assets/plugins/daterangepicker/js/moment.min.js" type="text/javascript"></script> 
				<script src="../assets/plugins/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>
				<script src="../assets/plugins/timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script> 
				<script src="../assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
				<script src="../assets/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" type="text/javascript"></script>
			<!--	<script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.min.js" type="text/javascript"></script>
				<script src="assets/plugins/tagsinput/js/bootstrap-tagsinput.min.js" type="text/javascript"></script>
				<script src="../assets/plugins/select2/select2.min.js" type="text/javascript"></script>  -->
			<!--	<script src="assets/plugins/typeahead/typeahead.bundle.js" type="text/javascript"></script> -->
			<!--	<script src="assets/plugins/typeahead/handlebars.min.js" type="text/javascript"></script> -->
			<!--	<script src="assets/plugins/multi-select/js/jquery.multi-select.js" type="text/javascript"></script> -->
		<!--		<script src="assets/plugins/multi-select/js/jquery.quicksearch.js" type="text/javascript"></script> --><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
                <script src="../assets/plugins/responsive-tables/js/rwd-table.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

			
        <!-- CORE TEMPLATE JS - START --> 
        <script src="../assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

    </body>
</html>



