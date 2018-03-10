<?php

if (!isset($_SESSION))
    session_start();
include_once 'dbconnect.php';

class User {

    var $dbObj;

    public function __construct() {
        $this->dbObj = new db();
    }

    public function insert($user_name, $password, $name, $address, $contact_no, $about) {
        $password = hash('sha256', $password);
        $sql = " INSERT INTO user"
                . " (user_name,password,name,address,contact_no,about)"
                . " VALUES('$user_name','$password','$name','$address','$contact_no','$about')";
        return $this->dbObj->ExecuteQuery($sql, 2);
    }

   public function  reg($email_id,$password,$reg_as)
   {
    $sql = "INSERT INTO register( email_id,password,reg_as) VALUES
		('$email_id', '$password','$reg_as')";
    return $this->dbObj->ExecuteQuery($sql, 2);

   }
   
    public function  request($regno,$cat,$reason,$date1)
   { 
   echo "Inside request";
    $sql = "INSERT INTO request(regno,cat,reason,exp_time,curr_time) VALUES
		('$regno', '$cat','$reason','$date1',now())";
    return $this->dbObj->ExecuteQuery($sql, 2);

   }

  
  

    public function activity_log($regno)
	{
		
	$sql = "select reqid,regno,cat,reason,exp_time,name from request where status='WAITING_FACULTY_APPROVAL' and f_regno='$regno'";	
		
		return $this->dbObj->ExecuteQuery($sql, 1);
	
		
	}


   
   
   
  
   
   public function  trans_ok($trans_id,$vtrans_id,$status)
   {
	   $sql="update vendor_trans v set status='$status' where vtrans_id='$vtrans_id'  ";
    return $this->dbObj->ExecuteQuery($sql, 3);
   }
   
   
   
  

    public function update($user_name, $password, $name, $address, $contact_no, $about, $old_password, $user_id) {
        if (empty($password))
            $password = $old_password;
        else
            $password = hash('sha256', $password);
        $sql = " UPDATE"
                . " user "
                . " SET user_name = '$user_name',password = '$password',name = '$name',address = '$address',"
                . " contact_no = '$contact_no',about = '$about'"
                . " WHERE user_id = '$user_id'";
        return $this->dbObj->ExecuteQuery($sql, 3);
    }

    

    public function login($regno, $password) {
       
       $sql = " SELECT"
                . " id,regno,password,reg_as"
                . " FROM register WHERE"
                . " regno = '$regno' AND password = '$password'";
        $data = $this->dbObj->ExecuteQuery($sql, 1);
		return $data;
    
    }

   public function upload_files($file,$email)
   {
	  $sql="insert into uploads(email,filename) values('$email','$file') ";
    return $this->dbObj->ExecuteQuery($sql, 1); 
   }


}

?>
