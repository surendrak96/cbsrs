<?php include("dbconnect.php");?>
<?php
// STUDENT REGISTRATION-********************************************************************************
//saca,sregulation,sbranch,ssemister,ssection,sgender,sregno,sname,datepicker,smobile,semail,spwd     -------- FIRSt REG
if(isset($_POST['saca']) && isset($_POST['sregulation']) && isset($_POST['branch']) && isset($_POST['ssemister']) && isset($_POST['ssection']) && isset($_POST['gender']) && isset($_POST['Rollnumber']) && isset($_POST['name']) && isset($_POST['sdob']) && isset($_POST['mobile']) && isset($_POST['email']) && isset($_POST['pword']) && isset($_POST['type']))
	{
		$saca 			= mysql_real_escape_string($_POST['saca']);
		$sregulation 	= mysql_real_escape_string($_POST['sregulation']);
		$branch 		= mysql_real_escape_string($_POST['branch']);
		$ssemister 		= mysql_real_escape_string($_POST['ssemister']);
		$ssection 		= mysql_real_escape_string($_POST['ssection']);
		$gender 		= mysql_real_escape_string($_POST['gender']);
		$Rollnumber 	= mysql_real_escape_string($_POST['Rollnumber']);
		$name 			= mysql_real_escape_string($_POST['name']);
		$sdob 			= mysql_real_escape_string($_POST['sdob']);
		$mobile 		= mysql_real_escape_string($_POST['mobile']);
		$email 			= mysql_real_escape_string($_POST['email']);
		$pword 			= mysql_real_escape_string($_POST['pword']);
		$type 			= mysql_real_escape_string($_POST['type']);
		
		
		date_default_timezone_set('Asia/Calcutta'); 
		$updated_on	= date("d-m-Y");
		
		$check_info = mysql_query("SELECT * from `logincheck` where mobile='$mobile'") or die(mysql_error());
		$count 		= mysql_num_rows($check_info);	
		if($count==1)
			{
				$msg = 4; // duplicate mobile no
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		$check_info = mysql_query("SELECT * from `logincheck` where email='$email'") or die(mysql_error());
		$count = mysql_num_rows($check_info);	
		if($count==1)
			{
				$msg = 5; // duplicate email ID
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		$check_info = mysql_query("SELECT * from `logincheck` where rollno='$Rollnumber'") or die(mysql_error());
		$count = mysql_num_rows($check_info);	
		if($count==1)
			{
				$msg = 6; // duplicate roll no
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		// logincheck TAB:- id,picture,academicyear,regulation,,sem,section,dob	
		$success1 = mysql_query("INSERT INTO `logincheck` (id, updatedon, username, academicyear, regulation, sem, section, dob, branch, type, gender, email, mobile,rollno,pwd,status) values ('','$updated_on','$name','$saca','$sregulation','$ssemister','$ssection','$sdob','$branch','$type','$gender','$email','$mobile','$Rollnumber','$pword',0)") or die(mysql_error());
		
		//studentmarks TAB:- id,updatedon,htno,stud_name,branch,sem,subject_name,internal,external,total,avg,status
		$success2 = mysql_query("INSERT INTO `student_marks` (id,updatedon,htno,stud_name,academicyear,regulation,branch) values ('','$updated_on','$Rollnumber','$name','$saca','$sregulation','$branch')") or die(mysql_error());
		
		$success3 = mysql_query("INSERT INTO `stud_attendance` (id,updatedon,rollno,studname,academicyear,regulation,branch,status) values ('','$updated_on','$Rollnumber','$name','$saca','$sregulation','$branch','0')") or die(mysql_error());
		
		if($success1 && $success2 && $success3)
			{
				$msg = 1;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		else
			{
				$msg = 0;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
	}
// FACULTY AND HOD REGISTRATION **************************************************************************************
//fname,fgender,femail,fmobile,fRollnumber,fpword,fbranch,ftype
if(isset($_POST['dob']) && isset($_POST['fname']) && isset($_POST['fgender']) && isset($_POST['femail']) && isset($_POST['fmobile']) && isset($_POST['fRollnumber']) && isset($_POST['fpword']) && isset($_POST['fbranch']) && isset($_POST['ftype']))
	{
		$dob 			= mysql_real_escape_string($_POST['dob']);
		$name 			= mysql_real_escape_string($_POST['fname']);
		$gender 		= mysql_real_escape_string($_POST['fgender']);
		$email 			= mysql_real_escape_string($_POST['femail']);
		$mobile 		= mysql_real_escape_string($_POST['fmobile']);
		$Rollnumber 	= mysql_real_escape_string($_POST['fRollnumber']);
		$pword 			= mysql_real_escape_string($_POST['fpword']);
		$branch 		= mysql_real_escape_string($_POST['fbranch']);
		$type 			= mysql_real_escape_string($_POST['ftype']);
		
		if($_POST['ftype']!='student')
			{
				$status = 1;
			}
		else
			{
				$status = 0;	
			}			
		
		
		$check_info = mysql_query("SELECT * from `logincheck` where mobile='$mobile'") or die(mysql_error());
		$count 		= mysql_num_rows($check_info);	
		if($count==1)
			{
				$msg = 4; // duplicate mobile no
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		$check_info = mysql_query("SELECT * from `logincheck` where email='$email'") or die(mysql_error());
		$count = mysql_num_rows($check_info);	
		if($count==1)
			{
				$msg = 5; // duplicate email ID
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		$check_info = mysql_query("SELECT * from `logincheck` where rollno='$Rollnumber'") or die(mysql_error());
		$count = mysql_num_rows($check_info);	
		if($count==1)
			{
				$msg = 6; // duplicate roll no
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		$success = mysql_query("INSERT INTO `logincheck` (id,dob,username,branch,type,gender,email,mobile,rollno,pwd,status) values ('','$dob','$name','$branch','$type','$gender','$email','$mobile','$Rollnumber','$pword',$status)") or die(mysql_error());
		
		if($success)
			{
				$msg = 1;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		else
			{
				$msg = 0;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
	}
//STUDENT PROFILE UPDATE	
// ******************** PROFILE UPDATE ***************************
//uid,uname,gender,uemail,umobile,profile_update
//suid:suid,suname:suname,sgender:sgender,ssdob:ssdob,suemail:suemail,sumobile:sumobile
if(isset($_POST['suid']) && isset($_POST['suname']) && isset($_POST['sgender']) && isset($_POST['ssdob']) && isset($_POST['suemail']) && isset($_POST['sumobile']))
	{
		$uid 		= mysql_real_escape_string($_POST['suid']);
		$uname 		= mysql_real_escape_string($_POST['suname']);
		$gender		= mysql_real_escape_string($_POST['sgender']);
		$uemail 	= mysql_real_escape_string($_POST['suemail']);
		$umobile 	= mysql_real_escape_string($_POST['sumobile']);
		$dob 	= mysql_real_escape_string($_POST['ssdob']);
				
		$user_name_pattern = '/^[a-zA-Z\s.]+$/';
		$mobile_pattern = '/[789]\d{9}$/';
		
		//------------------------------------------------- USER NAME CHECK --------------------------------------------
		if ( !preg_match($user_name_pattern, $uname) )
			{
				echo "<script language='javascript'>alert('Invalid Name..!');window.location = 'adminprofile.php';</script>";exit();
			}
		//------------------------------------------------- MOBILE NUMBER CHECK ----------------------------------------
		if ( !preg_match($mobile_pattern, $umobile) )
			{
				echo "<script language='javascript'>alert('Invalid mobile number..!');window.location = 'adminprofile.php';</script>";exit();
			}
		//------------------------------------------------- EMAIL ID CHECK ---------------------------------------------	
		if (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) 
			{
				echo "<script language='javascript'>alert('Invalid Email ID..!');window.location = 'adminprofile.php';</script>";exit();
			}		
				
		$rollno 		= $_SESSION['rollno'];
		$pwd 			= $_SESSION['pwd'];
	//id,picture,academicyear,regulation,sem,section,dob,username,branch,type,gender,email,mobile,rollno,pwd,address	
	$updation = mysql_query("UPDATE `logincheck` SET `username`='$uname',`gender`='$gender' ,`email`='$uemail' ,`mobile`='$umobile', dob='$dob' WHERE `rollno`='$rollno' AND pwd='$pwd'") or die(mysql_error());
	
	$check_updation = mysql_query("SELECT * from `logincheck` where `username`='$uname' AND `gender`='$gender' AND `email`='$uemail' AND `mobile`='$umobile' AND rollno='$rollno' AND pwd='$pwd'") or die(mysql_error());
				$count = mysql_num_rows($check_updation);
				if($count==1)
					{
						$msg = 1;
						$json_array = array('status'=>$msg);
						echo json_encode($json_array);
						exit();
					}
	
	
	}

//pname,who_r_u,subject,pgender,pemail,pmobile,password -------- REG UPDATE
if(isset($_POST['pname']) && isset($_POST['who_r_u']) && isset($_POST['subject']) && isset($_POST['pgender']) && isset($_POST['pemail']) && isset($_POST['pmobile']))
	{
		
		$pname 			= mysql_real_escape_string($_POST['pname']);
		$who_r_u 		= mysql_real_escape_string($_POST['who_r_u']);
		$subject		= mysql_real_escape_string($_POST['subject']);
		$pgender 		= mysql_real_escape_string($_POST['pgender']);
		$pemail		 	= mysql_real_escape_string($_POST['pemail']);
		$pmobile		= mysql_real_escape_string($_POST['pmobile']);
		
		$rollno 		= $_SESSION['rollno'];
		$pwd 			= $_SESSION['pwd'];
		
	$success = mysql_query("UPDATE `logincheck` SET `username`='$pname' ,`whoru`='$who_r_u',`involvement`='$subject',`gender`='$pgender' ,`email`='$pemail' ,`mobile`='$pmobile' WHERE `rollno`='$rollno' AND pwd='$pwd'") or die(mysql_error());
	
	$success = mysql_query("UPDATE `messenger` SET msgsender='$pname' WHERE senderid='$rollno' ") or die(mysql_error());
		
		if($success) 
			{
				$msg = 1;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		else
			{
				$msg = 0;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
	}
//rollno,pwd,type
if(isset($_POST['rollno']) && isset($_POST['pwd']) && isset($_POST['types']))
	{
		$rollno = mysql_real_escape_string($_POST['rollno']);
		$pwd 	= mysql_real_escape_string($_POST['pwd']);
		$type 	= mysql_real_escape_string($_POST['types']);
				
	$login_check = mysql_query("SELECT * from `logincheck` where rollno='$rollno' and type='$type' and pwd='$pwd' AND status=1") or die(mysql_error());
	$count = mysql_num_rows($login_check);
		$check = mysql_fetch_assoc($login_check); 
		if($count==1)
			{
				
				$_SESSION['IsValid'] 	= true;
				$_SESSION['rollno'] 	= $check['rollno'];
				$_SESSION['username'] 	= $check['username'];
				$_SESSION['mobile'] 	= $check['mobile'];
				$_SESSION['pwd']		= $check['pwd'];
				$_SESSION['picture']	= $check['picture'];
				$_SESSION['type']		= $check['type'];
				$_SESSION['branch']		= $check['branch'];
				$_SESSION['reg']		= $check['regulation'];

				$msg = 1;
				$json_array = array('status'=>$msg,'type'=>$check['type']);
				echo json_encode($json_array);
				exit();
			}
		else
			{
				$msg = 0;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
	}
//---------------------------------------------------------------POSTING CODE ACCORDING TO THE YEAR SELECTION ----------------
if(isset($_POST['to_be_posted']) && isset($_POST['year'])) 
	{
	if(isset($_SESSION['username']) &&  isset($_SESSION['rollno']))	
		{
		
		$to_be_posted 	= mysql_real_escape_string($_POST['to_be_posted']);
		$year 			= mysql_real_escape_string($_POST['year']);
				
		date_default_timezone_set('Asia/Calcutta'); 
		$post_date	= date("d-m-Y H:i:s"); // time in India
		
		$username		= $_SESSION['username'];
		$rollno			= $_SESSION['rollno'];
		$postee_pic		= $_SESSION['picture'];
		
		//msgid,msgdate,message,msgsender,senderid,year,status

		$success = mysql_query("INSERT INTO  `messenger` (msgid,msgdate,message,msgsender,postee_pic,senderid,year,status) values('','$post_date','$to_be_posted','$username','$postee_pic','$rollno','$year',0) ") or die(mysql_error());
					
		if($success)
			{
				//echo "<script language='javascript'>alert('Success..!');window.location = 'home.php';</script>";
				$msg = 1;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		else
			{
				//echo "<script language='javascript'>alert('Not Success..!');window.location = 'home.php';</script>";
				$msg = 0;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		}
	}
?>
<?php
if(isset($_POST['msgid']))   // ---------------- LIKE INCEREMENT - DECREMENT CODE -------------------
	{
		$msg = 0;
		if(isset($_SESSION['rollno']))
			{
				$rollno = $_SESSION['rollno'];
			}
		if(isset($_SESSION['admin_id']))
			{
				$rollno = $_SESSION['admin_id'];
			}	
		$msgid 	= mysql_real_escape_string($_POST['msgid']);
		
		$get_like_value = mysql_query("SELECT `like`,`liked_ids` from `messenger` WHERE msgid='$msgid'") or die(mysql_error());
		$count 			= mysql_num_rows($get_like_value);
		$get_liked_ids 	= mysql_fetch_assoc($get_like_value); 
	
	if($get_like_value && empty($get_liked_ids['liked_ids']))
		{
			$like_value = $get_liked_ids['like']+1;
			
			$insert_rollnos = array($rollno);  
			$insert_rolls = serialize($insert_rollnos);
			$success = mysql_query("UPDATE `messenger` SET `like`='".$like_value."', `liked_ids`='".$insert_rolls."' WHERE msgid='".$msgid."'") or die(mysql_error());
						
			if($success)
				{
					$msg = 1;
					$json_array = array('status'=>$msg);
					echo json_encode($json_array);
					exit();
				}
			else
				{
					$msg = 0;
					$json_array = array('status'=>$msg);
					echo json_encode($json_array);
					exit();
				}
		}
	if($get_like_value && !empty($get_liked_ids['liked_ids']))
		{ 
			// CODE IF ALREADY LIKED....!
	
		$list_of_rollnos = unserialize($get_liked_ids['liked_ids']);
		$count = count($list_of_rollnos);
		
		for($x = 0; $x < $count; $x++)
			{
			if($rollno == $list_of_rollnos[$x])
				{
					if($get_liked_ids['like']>0)    		$like_value = $get_liked_ids['like']-1;
					else 									$like_value = 0;
					
					$key = array_search($rollno, $list_of_rollnos);
					unset ($list_of_rollnos[$key]);
					
					$success = mysql_query("UPDATE `messenger` SET `like`='".$like_value."' WHERE msgid='".$msgid."'") or die(mysql_error());
						
					if($success)
						{
							$msg = 1;
						}
					else
						{
							$msg = 0;
						}
				}
			}
		if($msg == 1)
			{
				$list_of_rollnos = serialize($list_of_rollnos);
				$success = mysql_query("UPDATE `messenger` SET `liked_ids`='".$list_of_rollnos."' WHERE msgid='".$msgid."'") or die(mysql_error());
				$msg = 1;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		else
			{
				$like_value = $get_liked_ids['like']+1;
				array_push($list_of_rollnos,$rollno);
				$insert_rolls = serialize($list_of_rollnos);
	$success = mysql_query("UPDATE `messenger` SET `like`='".$like_value."',`liked_ids`='".$insert_rolls."' WHERE msgid='".$msgid."'") or die(mysql_error());
							
				if($success)
					{
						$msg = 1;
						$json_array = array('status'=>$msg);
						echo json_encode($json_array);
						exit();
					}
			}
		}
	}
//----------------------------------------------------------------------------------------------------	
if(isset($_POST['replyid']) && isset($_POST['reply']) && isset($_POST['get_username'])) //replyid,reply
	{

		$msgid 			= mysql_real_escape_string($_POST['replyid']);
		$reply 			= mysql_real_escape_string($_POST['reply']);
		$get_username 	= mysql_real_escape_string($_POST['get_username']);
		
		$get_reply = mysql_query("SELECT reply FROM `messenger` WHERE msgid='$msgid'") or die(mysql_error());
		
		$set_reply = mysql_fetch_assoc($get_reply);
		
		$reply = " ".$set_reply['reply']."<br>".$reply."&#8594;".$get_username." ";
		
		$update_reply = mysql_query("UPDATE `messenger` SET `reply`='$reply'  WHERE msgid='$msgid'") or die(mysql_error());
	
			if($update_reply)
				{
					$msg = 1;
					$json_array = array('status'=>$msg);
					echo json_encode($json_array);
					exit();
				}
			else
				{
					$msg = 0;
					$json_array = array('status'=>$msg);
					echo json_encode($json_array);
					exit();
				}
	}
if(isset($_POST['delid'])) 
	{

		$delid 	= mysql_real_escape_string($_POST['delid']);
		
		$get_id = mysql_query("SELECT msgid FROM `messenger` WHERE msgid='$delid'") or die(mysql_error());
		
		$count = mysql_num_rows($get_id);
		
		if($count==1)
			{
				$del_msg = mysql_query("DELETE FROM `messenger` WHERE msgid='$delid'") or die(mysql_error());
				if($del_msg)
					{
						//echo "<script language='javascript'>alert('Success..!');window.location = 'home.php';</script>";
						$msg = 1;
						$json_array = array('status'=>$msg);
						echo json_encode($json_array);
						exit();
					}
				else
					{
						//echo "<script language='javascript'>alert('Not Success..!');window.location = 'home.php';</script>";
						$msg = 0;
						$json_array = array('status'=>$msg);
						echo json_encode($json_array);
						exit();
					}
			}
		else
			{
				//echo "<script language='javascript'>alert('Not Success..!');window.location = 'home.php';</script>";
				$msg = 0;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}	
		
	}	
?>
<?php
//oldpwd,newpwd1,			
if(isset($_POST['oldpwd']) && isset($_POST['newpwd']))
	{
		if(isset($_SESSION['rollno'])) $rollno = $_SESSION['rollno'];
	    else{
					$msg = -1;
					$json_array = array('status'=>$msg);
					echo json_encode($json_array);
					exit();
			}
		
		$oldpwd 	= mysql_real_escape_string($_POST['oldpwd']);
		$new_pwd 	= mysql_real_escape_string($_POST['newpwd']);
				
		$login_check = mysql_query("SELECT * from `logincheck` where rollno='$rollno' and pwd='$oldpwd'") or die(mysql_error());
		$count = mysql_num_rows($login_check);

		if($count==1)
			{
			$pwd_update  = mysql_query("UPDATE `logincheck` SET pwd='$new_pwd' where rollno='$rollno' and pwd='$oldpwd'") or die(mysql_error());
			$login_check = mysql_query("SELECT * from `logincheck` where rollno='$rollno' and pwd='$new_pwd'") or die(mysql_error());
			$count = mysql_num_rows($login_check);
			if($count==1)		
				{
					session_destroy();
					$msg = 1;
					$json_array = array('status'=>$msg);
					echo json_encode($json_array);
					exit();
				}
			else
				{
					$msg = 0;
					$json_array = array('status'=>$msg);
					echo json_encode($json_array);
					exit();
				}
			}
	}
//---------------------------------------------------------- SENDING OTP -----------------------------user_id	
if(isset($_POST['user_id']) && isset($_POST['mobile_no']))
	{
		
		$user_id = mysql_real_escape_string($_POST['user_id']);
		$mobile_no = mysql_real_escape_string($_POST['mobile_no']);
		
		$login_check = mysql_query("SELECT * from `logincheck` where rollno='$user_id' AND mobile='$mobile_no'") or die(mysql_error());
		$count = mysql_num_rows($login_check);

		if($count==1)
			{
				$send_pwd = mysql_fetch_assoc($login_check);
				
				$username="venualamir";
				$password="password";
				$sender="ALAMIR";
				$mmessage = "Dear registered user, Your Password is '".$send_pwd['pwd']."' ADITYA ENG COLLEGE, Surampalem.";
				$contact = $mobile_no;
							
				$url="desireit.bulksms5.com/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($contact)."&message=".urlencode($mmessage)."&sender=".urlencode($sender)."&type=".urlencode('3'); 
							
				$ch = curl_init($url);					
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);					
				$curl_scraped_page = curl_exec($ch);					
				curl_close($ch);
				
				$msg = 1;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		else
			{
				$msg = 0;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
	}
?>
<?php
//------------------------------- ADMIN SECTION STARTS-------------------------------------
//admin_username,admin_password,
if(isset($_POST['admin_username']) && isset($_POST['admin_password']))
	{
		$admin_id 	= mysql_real_escape_string($_POST['admin_username']);
		$admin_pwd 		= mysql_real_escape_string($_POST['admin_password']);
		
		//id,admin_name,admin_pwd,status		
		
		$login_check = mysql_query("SELECT * from `adminlogin` where admin_name='$admin_id' and admin_pwd='$admin_pwd'") or die(mysql_error());
		$count = mysql_num_rows($login_check);
		$check = mysql_fetch_assoc($login_check); 
		if($count==1)
			{
				
				$_SESSION['IsValid'] = true;
				$_SESSION['admin_id'] = $check['admin_name'];
				$_SESSION['admin_pwd'] = $check['admin_pwd'];

				$msg = 1;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		else
			{
				$msg = 0;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
	}
//-------------------------- ADMIN SECTION IS OVER --------------------------------------------------------
?>
<?php
//empname,subject_inv,emp_gender,emp_email,emp_mobile,emp_id,emp_pwd
//-------------------------- FACULTY REGISTRATION SECTION STARTS --------------------------------------------------------
 // DATABASE logincheck:  -------  id 	picture 	username 	whoru 	involvement 	gender 	email 	mobile 	rollno 	pwd
if(isset($_POST['empname']) && isset($_POST['subject_inv']) && isset($_POST['emp_gender']) && isset($_POST['emp_email']) && isset($_POST['emp_mobile']) && isset($_POST['emp_id']) && isset($_POST['emp_pwd']))
	{
		$empname 		= mysql_real_escape_string($_POST['empname']);
		$subject_inv 	= mysql_real_escape_string($_POST['subject_inv']);
		$emp_gender		= mysql_real_escape_string($_POST['emp_gender']);
		$emp_email 		= mysql_real_escape_string($_POST['emp_email']);
		$emp_mobile		= mysql_real_escape_string($_POST['emp_mobile']);
		$emp_id			= mysql_real_escape_string($_POST['emp_id']);
		$emp_pwd		= mysql_real_escape_string($_POST['emp_pwd']);
		
		//---------------------------- CHECK BEFORE FACULTY CREATION ------------------
		$check_info = mysql_query("SELECT * from `logincheck` where mobile='$emp_mobile'") or die(mysql_error());
		$count 		= mysql_num_rows($check_info);	
		if($count==1)
			{
				$msg = 4; // duplicate mobile no
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		$check_info = mysql_query("SELECT * from `logincheck` where email='$emp_email'") or die(mysql_error());
		$count = mysql_num_rows($check_info);	
		if($count==1)
			{
				$msg = 5; // duplicate email ID
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		$check_info = mysql_query("SELECT * from `logincheck` where rollno='$emp_id'") or die(mysql_error());
		$count = mysql_num_rows($check_info);	
		if($count==1)
			{
				$msg = 6; // duplicate empid
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}	
		//-----------------------------------------------------------------------------
// msgid 	msgdate 	message 	like 	liked_ids 	reply 	reply_by 	attachments 	attach_ext 	msgsender 	postee_pic 	senderid 	year 	status		
		
	if(isset($_SESSION['admin_id']))
		{
		$profile_success1 = mysql_query("INSERT INTO `logincheck` (id,username,involvement,gender,email,mobile,rollno,pwd) values ('','$empname','$subject_inv','$emp_gender','$emp_email','$emp_mobile','$emp_id','$emp_pwd')") or die(mysql_error());

		if($success) //id 	picture 	username 	whoru 	involvement 	gender 	email 	mobile 	rollno 	pwd
			{
				$msg = 1;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		else
			{
				$msg = 0;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}	
		}
	} 
//-------------------------- FACULTY REGISTRATION SECTION ENDS ----------------------------------------------------------
//get_user_id
if(isset($_POST['get_user_id'])) // to delete user profile from the databse
	{

		$del_user_id 	= mysql_real_escape_string($_POST['get_user_id']);
		
		$success1 = mysql_query("DELETE FROM `logincheck` WHERE rollno='$del_user_id'") or die(mysql_error());
		$success2 = mysql_query("DELETE FROM `messenger` WHERE senderid='$del_user_id'") or die(mysql_error());
		
		if($success1 && $success2)
			{
				$check_if_available1 = mysql_query("SELECT * FROM `logincheck` WHERE rollno='$del_user_id'") or die(mysql_error());
				$count1 = mysql_num_rows($check_if_available1);
				
				$check_if_available2 = mysql_query("SELECT * FROM `messenger` WHERE senderid='$del_user_id'") or die(mysql_error());
				$count2 = mysql_num_rows($check_if_available2);
				
				if($count1==0 && $count2==0)
					{
						$msg = 1;
						$json_array = array('status'=>$msg);
						echo json_encode($json_array);
						exit();
					}
				else
					{
						$msg = 0;
						$json_array = array('status'=>$msg);
						echo json_encode($json_array);
						exit();
					}
			}
	}
//opwd,npwd	
if(isset($_POST['opwd']) && isset($_POST['npwd']))
	{
		if(isset($_SESSION['admin_id'])) $admin_id = $_SESSION['admin_id'];
	    else{
					$msg = -1;
					$json_array = array('status'=>$msg);
					echo json_encode($json_array);
					exit();
			}
		
		$oldpwd 	= mysql_real_escape_string($_POST['opwd']);
		$new_pwd 	= mysql_real_escape_string($_POST['npwd']);
				
		$login_check = mysql_query("SELECT * from `adminlogin` where admin_name='$admin_id' and admin_pwd='$oldpwd'") or die(mysql_error());
		$count = mysql_num_rows($login_check);

		if($count==1)
			{
		$pwd_update  = mysql_query("UPDATE `adminlogin` SET admin_pwd='$new_pwd' where admin_name='$admin_id' and admin_pwd='$oldpwd'") or die(mysql_error());
		$login_check = mysql_query("SELECT * from `adminlogin` where admin_name='$admin_id' and admin_pwd='$new_pwd'") or die(mysql_error());
		$count = mysql_num_rows($login_check);
			if($count==1)		
				{
					session_destroy();
					$msg = 1;
					$json_array = array('status'=>$msg);
					echo json_encode($json_array);
					exit();
				}
			else
				{
					$msg = 0;
					$json_array = array('status'=>$msg);
					echo json_encode($json_array);
					exit();
				}
			}
		else
			{
				$msg = 0;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}	
	}
?>
