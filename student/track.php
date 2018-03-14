<?php
session_start();

if (empty($_SESSION['regno'])) {
    header("location:../index.php");
    exit();
} 
include_once '../db/dboperations.php';
 $objUser = new User();
 $rest=$objUser->user_data($_SESSION['regno'],"STUDENT");
$details=mysqli_fetch_assoc($rest);


   if(isset($_POST['submit']))
   {
	   $day1=$_POST['datetime'];
	   //$day1 = strtotime($_POST["datetime"]);
       //$day1 = date('Y-m-d H:i:s', $day1); 
	   $result=$objUser->request($_SESSION['regno'],$_POST['category'],$_POST['reason'],$day1);
	   echo "<script>alert('Request has been sent...Stay Tuned!!!')</script>";

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
     <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
     <link href="../css/track.css" rel="stylesheet" type="text/css" media="all" />
	 
	 <!--	 <link href="../assets/plugins/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen"/> -->
	 <link href="../assets/plugins/timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" media="screen"/>
	 <link href="../assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen"/>
<!--	 <link href="../assets/plugins/tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" media="screen"/> -->
	 <link href="../assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<!--	 <link href="../assets/plugins/typeahead/css/typeahead.css" rel="stylesheet" type="text/css" media="screen"/> -->
      <link href="../assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>      


		<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

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
                                <img src="../images/students/<?php echo $details['photo']; ?>" alt="" class="img-circle img-inline">
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

                        <div class="profile-image col-md-5 col-sm-5 col-xs-5">
                            <a href="">
                                <img src="../images/students/<?php echo $details['photo']; ?>" alt="" class="img-responsive img-circle">
                            </a>
                        </div>

                        <div class="profile-details col-md-7 col-sm-7 col-xs-7">

                            <h2>
                                <a href=""><?php echo $details['name']; ?></a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h2>

                            <p class="profile-title"><?php echo $details['branch'].' '.$details['batch']; ?></p>

                        </div>

                    </div>
                    <!-- USER INFO - END -->



                    <ul class='wraplist'>	


                        <li class=""> 
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i>
                                <span style="font-size:1.5em;" class="title">New Request</span>
                            </a>
                        </li>
						
                        <li class=""> 
                            <a href="track.php">
                                <i class="fa fa-dashboard"></i>
                                <span style="font-size:1.5em;" class="title">Track Your Request</span>
                            </a>
                        </li>
						
                        <li class=""> 
                            <a href="activity.php">
                                <i class="fa fa-dashboard"></i>
                                <span style="font-size:1.5em;" class="title">Activity Log</span>
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
                                <h2 class="title pull-left">REQUEST TRACKING</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">  
							
									
	
	<div class="content3">
        <div class="shipment">
			<div class="confirm">
                <div class="imgcircle">
                    <img src="images/confirm.png" alt="">
            	</div>
				<span class="line"></span>
				<p>FACULTY</p>
			</div>
			<div class="process">
           	 	<div class="imgcircle">
                	<img src="images/process.png" alt="">
            	</div>
				<span class="line"></span>
				<p>HOD</p>
			</div>
			<div class="quality">
				<div class="imgcircle">
                	<img src="images/quality.png" alt="">
            	</div>
				<span class="line"></span>
				<p>OFFICE</p>
			</div>
			<div class="dispatch">
				<div class="imgcircle">
                	<img src="images/dispatch.png" alt="">
            	</div>
				<span class="line"></span>
				<p>GATE</p>
			</div>
			<div class="delivery">
				<div class="imgcircle">
                	<img src="images/delivery.png" alt="">
				</div>
				<p></p>
			</div>
			<div class="clear"></div>
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


        <!-- CORE TEMPLATE JS - START --> 
        <script src="../assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 















        <!-- General section box modal start -->
        <div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Section Settings</h4>
                    </div>
                    <div class="modal-body">

                        Body goes here...

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="button">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    </body>
</html>



