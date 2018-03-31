<?php
$no1=0;
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
   
    $sql = "INSERT INTO request(regno,cat,reason,exp_time,curr_time) VALUES
		('$regno', '$cat','$reason','$date1',now())";
		$req_id=$this->dbObj->ExecuteQuery($sql, 2);
	$sql1="insert into req_trans(req_id,trans_type,	trans_time,trans_status) 
	values('$req_id','STUDENT',now(),'REQUEST SEND')";
	$trans_id=$this->dbObj->ExecuteQuery($sql1, 2);
    return $req_id;

   }
   
   public function dis_req($reg_no)
   {
   $sql="select * from request where regno='$reg_no' order by curr_time desc LIMIT 1";
   
  	return $this->dbObj->ExecuteQuery($sql, 1);
   }

    public function activity_log($regno)
	{
	$sql = "select r.reqid,r.regno,r.cat,r.reason,r.exp_time,s.name,s.photo,s.branch,s.batch from request r,student s where r.regno=s.s_regno and status='WAITING_FACULTY_APPROVAL' and 	s.fad_regno='$regno'";	
		
		return $this->dbObj->ExecuteQuery($sql, 1);
	
		
	}
	
	 public function activity_stud($regno)
	{
	$sql = "select * from request r,student s where r.regno=s.s_regno and s.s_regno='$regno'";	
		
		return $this->dbObj->ExecuteQuery($sql, 1);
	
		
	}
	
	public function activity_fac($regno)
	{
	$sql = "select * from request r,student s where r.regno=s.s_regno and s.fad_regno='$regno'";	
		
		return $this->dbObj->ExecuteQuery($sql, 1);
	
		
	}
	
	public function user_data($regno,$type)
	{
		if($type=="STUDENT")
		{
			$sql = "select * from student where s_regno='$regno'";
		}
		if($type=="FACULTY")
		{
	$sql = "select * from fac_adv where f_regno='$regno'";	
		}
		
		if($type=="GUARD")
		{
	$sql = "select * from guard where g_regno='$regno'";	
		}
		
		if($type=="OFFICE")
		{
	$sql = "select * from office where o_regno='$regno'";	
		}
		
	if($type=="HOD")
		{
	$sql = "select * from hod where h_regno='$regno'";	
		}
		return $this->dbObj->ExecuteQuery($sql, 1);
		
	}
	
	
	
	public function req_details($reqid)
	{
		
	$sql = "select * from request r,student s where s.s_regno=r.regno and r.reqid='$reqid'";	
		
		return $this->dbObj->ExecuteQuery($sql, 1);
	
		
	}
	
	    public function search_student($s_regno)
	{
		
		$sql="select r.reqid,r.regno,s.name,s.branch,s.batch,s.photo,r.cat,r.reason,r.exp_time,r.office_regno,r.status,s.fad_regno,s.hod_regno  from request r,student s where r.regno=s.s_regno and r.regno='$s_regno'";	

		return $this->dbObj->ExecuteQuery($sql, 1);
	
		
	}
	
	 public function activity_hod($regno)
	{
		
	$sql = "select r.reqid,r.regno,r.cat,r.reason,r.exp_time,s.name,s.photo,s.branch,s.batch,s.fad_regno,s.hod_regno from request r,student s where r.regno=s.s_regno and ( status='FACULTY_APPROVED' or status='FORWARD_HOD')  and s.hod_regno='$regno'";	

		return $this->dbObj->ExecuteQuery($sql, 1);
	
		
	}


public function activity_office($regno)
	{
		
	//$sql = "select reqid,regno,cat,reason,exp_time,name from request where status='HOD_APPROVED' ";	
		$sql = "select * from request r,student s where r.regno=s.s_regno and status='HOD_APPROVED' or status='FACULTY_APPROVED'";	

		
		return $this->dbObj->ExecuteQuery($sql, 1);
	
		
	}
   
   
   
  
   
   public function faculty_sign($req_id,$regno,$status)
   {
	   $sql="update request set status='$status',fappr_time=now() where reqid='$req_id'";
    $id= $this->dbObj->ExecuteQuery($sql, 3);
	$sql1="insert into req_trans(req_id,trans_type,	trans_time,trans_status) 
	values('$req_id','FACULTY',now(),'$status')";
	$trans_id=$this->dbObj->ExecuteQuery($sql1, 2);
	return $id;
   }
   
    public function forward_hod($req_id,$regno,$message)
   {
	   
	   $status="FORWARD_HOD";
	   $sql="update request set fa_hod_msg='$message',ffor_time=now(),status='$status' where reqid='$req_id'";
    $id=$this->dbObj->ExecuteQuery($sql, 3);
	
	$sql1="insert into req_trans(req_id,trans_type,	trans_time,trans_status) 
	values('$req_id','FACULTY',now(),'$status')";
	$trans_id=$this->dbObj->ExecuteQuery($sql1, 2);
	return $id;
   }
   
     public function hod_sign($req_id,$regno,$status)
   {
	   $sql="update request set status='$status',hodappr_time=now() where reqid='$req_id'";
    $id= $this->dbObj->ExecuteQuery($sql, 3);
	
	$sql1="insert into req_trans(req_id,trans_type,	trans_time,trans_status) 
	values('$req_id','HOD',now(),'$status')";
	$trans_id=$this->dbObj->ExecuteQuery($sql1, 2);
	return $id;
   }
   
     public function office_sign($req_id,$regno,$status)
   {
	  
	   $sql="update request set status='$status',officeappr_time=now(),office_regno='$regno' where reqid='$req_id'";
  $id=$this->dbObj->ExecuteQuery($sql, 3);
	$sql1="insert into req_trans(req_id,trans_type,	trans_time,trans_status) 
	values('$req_id','OFFICE',now(),'$status')";
	$trans_id=$this->dbObj->ExecuteQuery($sql1, 2);
	return $id;
   }
   
   
     public function guard_sign($req_id,$regno,$status)
   {
	  
	   $sql="update request set status='$status',out_time=now(),guard_regno='$regno' where reqid='$req_id'";
    $id=$this->dbObj->ExecuteQuery($sql, 3);
	$sql1="insert into req_trans(req_id,trans_type,	trans_time,trans_status) 
	values('$req_id','GUARD',now(),'$status')";
	$trans_id=$this->dbObj->ExecuteQuery($sql1, 2);
	return $id;
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
