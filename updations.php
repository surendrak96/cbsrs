<?php	include("dbconnect.php");	?>
<?php
if(isset($_POST['htno']))
	{
		//	id,picture,academicyear,regulation,sem,section,dob,username,branch,type,gender,email,mobile,rollno,pwd 
		//	htno,aca,regu,branch,sem,sec,sname,dob,gender,email,mobile,pwd,update
		$htno 			= mysql_real_escape_string($_POST['htno']);
		$htno_success	= mysql_query(" SELECT * from `logincheck` WHERE rollno='$htno' AND type='student'") or die(mysql_error());	
		$count = mysql_num_rows($htno_success);
		if($count==1)
			{
				$getrec = mysql_fetch_array($htno_success);

				$json_array = array('status'=>1,'aca'=>$getrec['academicyear'],'regu'=>$getrec['regulation'],'branch'=>$getrec['branch'],'sem'=>$getrec['sem'],'sec'=>$getrec['section'],'sname'=>$getrec['username'],'dob'=>$getrec['dob'],'gender'=>$getrec['gender'],'email'=>$getrec['email'],'mobile'=>$getrec['mobile'],'pwd'=>$getrec['pwd'],'type'=>$getrec['type']);
				echo json_encode($json_array);
				exit();
			}
		else
			{
				$json_array = array('status'=>0);
				echo json_encode($json_array);
				exit();
			}	
	}
if(isset($_POST['fid']))
	{
		//	id,picture,academicyear,regulation,sem,section,dob,username,branch,type,gender,email,mobile,rollno,pwd 
		//	htno,aca,regu,branch,sem,sec,sname,dob,gender,email,mobile,pwd,update
		$htno 			= mysql_real_escape_string($_POST['fid']);
		$htno_success	= mysql_query(" SELECT * from `logincheck` WHERE rollno='$htno' AND (type='principal' OR type='student' OR type='faculty' OR type='hod')") or die(mysql_error());	
		$count = mysql_num_rows($htno_success);
		if($count==1)
			{
				$getrec = mysql_fetch_array($htno_success);

				$json_array = array('status'=>1,'aca'=>$getrec['academicyear'],'regu'=>$getrec['regulation'],'branch'=>$getrec['branch'],'sem'=>$getrec['sem'],'sec'=>$getrec['section'],'sname'=>$getrec['username'],'dob'=>$getrec['dob'],'gender'=>$getrec['gender'],'email'=>$getrec['email'],'mobile'=>$getrec['mobile'],'pwd'=>$getrec['pwd'],'type'=>$getrec['type']);
				echo json_encode($json_array);
				exit();
			}
		else
			{
				$json_array = array('status'=>0);
				echo json_encode($json_array);
				exit();
			}	
	}	

//alert(htno+"-"+aca+"-"+regu+"-"+branch+"-"+sem+"-"+sec+"-"+sname+"-"+dob+"-"+gender+"-"+email+"-"+mobile+"-"+pwd);
if(isset($_POST['rollno']) && isset($_POST['aca']) && isset($_POST['regu']) && isset($_POST['branch']) && isset($_POST['sem']) && isset($_POST['sec']) && isset($_POST['sname']) && isset($_POST['dob']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['pwd']))
	{
		$htno 			= mysql_real_escape_string($_POST['rollno']);
		$aca 			= mysql_real_escape_string($_POST['aca']);
		$regu 			= mysql_real_escape_string($_POST['regu']);
		$branch 		= mysql_real_escape_string($_POST['branch']);
		$sem 			= mysql_real_escape_string($_POST['sem']);
		$sec 			= mysql_real_escape_string($_POST['sec']);
		$sname 			= mysql_real_escape_string($_POST['sname']);
		$dob 			= mysql_real_escape_string($_POST['dob']);
		$gender 		= mysql_real_escape_string($_POST['gender']);
		$email 			= mysql_real_escape_string($_POST['email']);
		$mobile 		= mysql_real_escape_string($_POST['mobile']);
		$pwd 			= mysql_real_escape_string($_POST['pwd']);
		
$Delete_subjects = mysql_query("Delete from `logincheck` where branch='$branch' AND sem='$sem' AND rollno='$htno'") or die(mysql_error());
////	id,picture,academicyear,regulation,sem,section,dob,username,branch,type,gender,email,mobile,rollno,pwd 		
$success = mysql_query("INSERT INTO `logincheck` (id, academicyear, regulation, sem, section, dob, username, branch, gender, email, mobile, rollno, pwd,type) values ('','$aca','$regu','$sem','$sec','$dob','$sname','$branch','$gender','$email','$mobile','$htno','$pwd','student')") or die(mysql_error());
		
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
if(isset($_POST['facid']) && isset($_POST['branch']) && isset($_POST['sname']) && isset($_POST['dob']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['pwd']) && isset($_POST['utype']))
	{
		$htno 			= mysql_real_escape_string($_POST['facid']);
		$branch 		= mysql_real_escape_string($_POST['branch']);
		$sname 			= mysql_real_escape_string($_POST['sname']);
		$dob 			= mysql_real_escape_string($_POST['dob']);
		$gender 		= mysql_real_escape_string($_POST['gender']);
		$email 			= mysql_real_escape_string($_POST['email']);
		$mobile 		= mysql_real_escape_string($_POST['mobile']);
		$pwd 			= mysql_real_escape_string($_POST['pwd']);
		$utype 			= mysql_real_escape_string($_POST['utype']);
		
		date_default_timezone_set('Asia/Calcutta'); 
		$updated_on	= date("d-m-Y");
		
		$htno_success	= mysql_query(" SELECT * from `logincheck` WHERE rollno='$htno' AND type='$utype'") or die(mysql_error());	
		$count = mysql_num_rows($htno_success);
		if($count==1)
			{
				
				//id,picture,academicyear,regulation,sem,section,dob,username,branch,type,gender,email,mobile,rollno,pwd 		
				$success = mysql_query("UPDATE `logincheck` SET dob='$dob', username='$sname', branch='$branch', gender='$gender', email='$email', mobile='$mobile', pwd='$pwd' WHERE type='$utype' AND rollno='$htno'") or die(mysql_error());
				
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
		else
			{
				$msg = 0;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}	
		
	}	
if(isset($_POST['drollno']) && isset($_POST['daca']) && isset($_POST['dregu']) && isset($_POST['dbranch']) && isset($_POST['dsem']) && isset($_POST['dsec']) && isset($_POST['dsname']) && isset($_POST['ddob']) && isset($_POST['dgender']) && isset($_POST['demail']) && isset($_POST['dmobile']) && isset($_POST['dpwd']))
	{
		$htno 			= mysql_real_escape_string($_POST['drollno']);
		$aca 			= mysql_real_escape_string($_POST['daca']);
		$regu 			= mysql_real_escape_string($_POST['dregu']);
		$branch 		= mysql_real_escape_string($_POST['dbranch']);
		$sem 			= mysql_real_escape_string($_POST['dsem']);
		$sec 			= mysql_real_escape_string($_POST['dsec']);
		$sname 			= mysql_real_escape_string($_POST['dsname']);
		$dob 			= mysql_real_escape_string($_POST['ddob']);
		$gender 		= mysql_real_escape_string($_POST['dgender']);
		$email 			= mysql_real_escape_string($_POST['demail']);
		$mobile 		= mysql_real_escape_string($_POST['dmobile']);
		$pwd 			= mysql_real_escape_string($_POST['dpwd']);
		
$Delete_login = mysql_query("Delete from `logincheck` WHERE email='$email' AND mobile='$mobile' AND rollno='$htno'")or die(mysql_error());

$Delete_Marks = mysql_query("Delete from `studentmarks` WHERE rollno='$htno' AND regulation='$regu' AND academicyear='$aca' AND branch='$branch' AND sem='$sem' AND section='$sec'") or die(mysql_error());

$Delete_Attendance = mysql_query("Delete from `stud_attendance` WHERE rollno='$htno' AND regulation='$regu' AND academicyear='$aca' AND branch='$branch' AND sem='$sem' AND section='$sec'") or die(mysql_error());

$select_login = mysql_query("SELECT * FROM `logincheck` WHERE rollno='$htno' AND regulation='$regu' AND academicyear='$aca' AND branch='$branch' AND sem='$sem' AND section='$sec'") or die(mysql_error());

$select_marks = mysql_query("SELECT * FROM `studentmarks` WHERE rollno='$htno' AND regulation='$regu' AND academicyear='$aca' AND branch='$branch' AND sem='$sem' AND section='$sec'") or die(mysql_error());

$select_attendance = mysql_query("SELECT * FROM `stud_attendance` WHERE rollno='$htno' AND regulation='$regu' AND academicyear='$aca' AND branch='$branch' AND sem='$sem' AND section='$sec'") or die(mysql_error());

$count1 = mysql_num_rows($select_login);
$count2 = mysql_num_rows($select_marks);
$count3 = mysql_num_rows($select_attendance);

		if($count1==0 && $count2==0 && $count3==0)
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
if(isset($_POST['dfacid']) && isset($_POST['dfbranch']) && isset($_POST['dfsname']) && isset($_POST['dfdob']) && isset($_POST['dfgender']) && isset($_POST['dfemail']) && isset($_POST['dfmobile']) && isset($_POST['dfpwd']))
	{
		$htno 			= mysql_real_escape_string($_POST['dfacid']);
		$branch 		= mysql_real_escape_string($_POST['dfbranch']);
		$sname 			= mysql_real_escape_string($_POST['dfsname']);
		$dob 			= mysql_real_escape_string($_POST['dfdob']);
		$gender 		= mysql_real_escape_string($_POST['dfgender']);
		$email 			= mysql_real_escape_string($_POST['dfemail']);
		$mobile 		= mysql_real_escape_string($_POST['dfmobile']);
		$pwd 			= mysql_real_escape_string($_POST['dfpwd']);
		
$Delete_subjects = mysql_query("Delete from `logincheck` where email='$email' AND mobile='$mobile' AND rollno='$htno'") or die(mysql_error());

$success = mysql_query("SELECT * FROM `logincheck` where rollno='$htno'") or die(mysql_error());

$count = mysql_num_rows($success);

		if($count==0)
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
if(isset($_POST['sub_branch']) && isset($_POST['sub_semester']))
{
	$branch 	= 	mysql_real_escape_string($_POST['sub_branch']);
	$semester 	= 	mysql_real_escape_string($_POST['sub_semester']);
	if(!empty($branch) || !empty($semester))
		{
		$spec_success	=	mysql_query("SELECT * FROM `subjects` where branch='$branch' AND semister='$semester'") or die(mysql_error());

		if($spec_success)
			{
			 $count = mysql_num_rows($spec_success);
				if($count>0)
					{
						for($i=1;$i<=$count;$i++)
							{
								$specs = mysql_fetch_assoc($spec_success);  // to get subject names....!
								$json_array [] = $specs['subject'];	
							}	 
						echo json_encode($json_array);
						exit();
					}
			}
		}
}
//up_branch,up_semester,up_sub1,up_sub2,up_sub3,up_sub4,up_sub,up_sub6
if(isset($_POST['up_branch']) && isset($_POST['up_semester']) && isset($_POST['up_sub1']) && isset($_POST['up_sub2']) && isset($_POST['up_sub3']) && isset($_POST['up_sub4']) && isset($_POST['up_sub5']) && isset($_POST['up_sub6']))
		{
		//echo "<script language='javascript'>alert('Okay..!');</script>";exit();
		
		if(empty(trim($_POST['up_branch'])) || empty(trim($_POST['up_semester'])) || empty(trim($_POST['up_sub1'])) || empty(trim($_POST['up_sub2'])) || empty(trim($_POST['up_sub3'])) || empty(trim($_POST['up_sub4'])) || empty(trim($_POST['up_sub5'])) || empty(trim($_POST['up_sub6'])))
			{
				echo "<script language='javascript'>alert('Empty fileds found..!');</script>";exit();
			}
		$branch 		= mysql_real_escape_string($_POST['up_branch']);
		$year_sem 		= mysql_real_escape_string($_POST['up_semester']);
		$sub1 			= mysql_real_escape_string($_POST['up_sub1']);
		$sub2 			= mysql_real_escape_string($_POST['up_sub2']);
		$sub3 			= mysql_real_escape_string($_POST['up_sub3']);
		$sub4 			= mysql_real_escape_string($_POST['up_sub4']);
		$sub5 			= mysql_real_escape_string($_POST['up_sub5']);
		$sub6 			= mysql_real_escape_string($_POST['up_sub6']);
		$subs[1] = $sub1;
		$subs[2] = $sub2;
		$subs[3] = $sub3;
		$subs[4] = $sub4;
		$subs[5] = $sub5;
		$subs[6] = $sub6;
		$Delete_subjects = mysql_query("Delete from `subjects` where branch='$branch' AND semister='$year_sem'") or die(mysql_error());
		//TAB	SUBJECTS :-	id,branch,semister,subject
		$x=1;
		while($x<=6)
			{
			$Insert_Subjects = mysql_query("INSERT into `subjects` (id,branch,semister,subject) values('','$branch','$year_sem','$subs[$x]')") or die(mysql_error());	
			$x++;
			}
				if($Insert_Subjects && x==7)
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
// MARK UPLOAD PART *****************************************************************************************
//studentmarks TAB :-	id,rollno,academicyear,regulation,branch,sem,section,examtype,sub1,sub2,sub3,sub4,sub5,sub6,total,average,status	

//msaca,msregulation,msbranch,mssemister,mssection

if(isset($_POST['msaca']) && isset($_POST['msregulation']) && isset($_POST['msbranch']) && isset($_POST['mssemister']) && isset($_POST['mssection']))
	{
		$aca 		= 	mysql_real_escape_string($_POST['msaca']);
		$regu 		= 	mysql_real_escape_string($_POST['msregulation']);
		$branch 	= 	mysql_real_escape_string($_POST['msbranch']);
		$semester 	= 	mysql_real_escape_string($_POST['mssemister']);
		$sec 		= 	mysql_real_escape_string($_POST['mssection']);

		$spec_success	=	mysql_query("SELECT * FROM `studentmarks` where academicyear='$aca' AND regulation='$regu' AND branch='$branch' AND sem='$semester' AND section='$sec'") or die(mysql_error());

			if($spec_success)
				{
				 $count = mysql_num_rows($spec_success);
					if($count>0)
						{
							for($i=1;$i<=$count;$i++)
								{
									$htnos = mysql_fetch_assoc($spec_success);  // to get subject names....!
									$json_array [] = $htnos['rollno'];	
								}	 
							echo json_encode($json_array);
							exit();
						}
				}
	}
//up_aca,up_reg,up_branch,up_semester,up_sec,up_htno,up_examtype,up_sub1,up_sub2,up_sub3,up_sub4,up_sub5,up_sub6,up_tot,up_avg
if(isset($_POST['mup_aca']) && isset($_POST['mup_reg']) && isset($_POST['mup_branch']) && isset($_POST['mup_semester']) && isset($_POST['mup_sec']) && isset($_POST['mup_htno']) && isset($_POST['mup_examtype']) && isset($_POST['mup_sub1']) && isset($_POST['mup_sub2']) && isset($_POST['mup_sub3']) && isset($_POST['mup_sub4']) && isset($_POST['mup_sub5']) && isset($_POST['mup_sub6']) && isset($_POST['mup_tot']) && isset($_POST['mup_avg']))
		{
		
		if(empty(trim($_POST['mup_aca'])) || empty(trim($_POST['mup_reg'])) || empty(trim($_POST['mup_branch'])) || empty(trim($_POST['mup_semester'])) || empty(trim($_POST['mup_sec'])) || empty(trim($_POST['mup_htno'])) || empty(trim($_POST['mup_examtype'])) || empty(trim($_POST['mup_sub1'])) || empty(trim($_POST['mup_sub2'])) || empty(trim($_POST['mup_sub3'])) || empty(trim($_POST['mup_sub4'])) || empty(trim($_POST['mup_sub5'])) || empty(trim($_POST['mup_sub6'])) || empty(trim($_POST['mup_tot'])) || empty(trim($_POST['mup_avg'])))
			{
				$msg = 0;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		$aca 		= mysql_real_escape_string($_POST['mup_aca']);
		$reg 		= mysql_real_escape_string($_POST['mup_reg']);
		$branch 	= mysql_real_escape_string($_POST['mup_branch']);
		$semester 	= mysql_real_escape_string($_POST['mup_semester']);
		$sec 		= mysql_real_escape_string($_POST['mup_sec']);
		$htno 		= mysql_real_escape_string($_POST['mup_htno']);
		$examtype 	= mysql_real_escape_string($_POST['mup_examtype']);
		
		$sub1 		= mysql_real_escape_string($_POST['mup_sub1']);
		$sub2 		= mysql_real_escape_string($_POST['mup_sub2']);
		$sub3 		= mysql_real_escape_string($_POST['mup_sub3']);
		$sub4 		= mysql_real_escape_string($_POST['mup_sub4']);
		$sub5 		= mysql_real_escape_string($_POST['mup_sub5']);
		$sub6 		= mysql_real_escape_string($_POST['mup_sub6']);
		
		$tot 		= mysql_real_escape_string($_POST['mup_tot']);
		$avg 		= mysql_real_escape_string($_POST['mup_avg']);
		
		$Update_Marks = mysql_query("UPDATE `studentmarks` set examtype='$examtype', sub1='$sub1', sub2='$sub2', sub3='$sub3', sub4='$sub4', sub5='$sub5', sub6='$sub6', total='$tot', average='$avg', status='0' WHERE rollno='$htno' AND academicyear='$aca' AND regulation='$reg' AND branch='$branch' AND sem='$semester' AND section='$sec'") or die(mysql_error());	
		if($Update_Marks)
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
//gsaca,gsregulation,gsbranch,gssemister,gssection,gexamhtno,gexamtype
if(isset($_POST['gsaca']) && isset($_POST['gsregulation']) && isset($_POST['gsbranch']) && isset($_POST['gssemister']) && isset($_POST['gssection']) && isset($_POST['gexamhtno']) && isset($_POST['gexamtype']))
		{
		
		if(empty(trim($_POST['gsaca'])) || empty(trim($_POST['gsregulation'])) || empty(trim($_POST['gsbranch'])) || empty(trim($_POST['gssemister'])) || empty(trim($_POST['gssection'])) || empty(trim($_POST['gexamhtno'])) || empty(trim($_POST['gexamtype'])))
			{
				$msg = 0;
				$json_array = array('status'=>$msg);
				echo json_encode($json_array);
				exit();
			}
		$aca 		= mysql_real_escape_string($_POST['gsaca']);
		$reg 		= mysql_real_escape_string($_POST['gsregulation']);
		$branch 	= mysql_real_escape_string($_POST['gsbranch']);
		$semester 	= mysql_real_escape_string($_POST['gssemister']);
		$sec 		= mysql_real_escape_string($_POST['gssection']);
		$htno 		= mysql_real_escape_string($_POST['gexamhtno']);
		$examtype 	= mysql_real_escape_string($_POST['gexamtype']);
		
		$Get_Marks = mysql_query("SELECT * from `studentmarks` WHERE rollno='$htno' AND academicyear='$aca' AND regulation='$reg' AND branch='$branch' AND sem='$semester' AND section='$sec' AND examtype='$examtype'") or die(mysql_error());	
		$count = mysql_num_rows($Get_Marks);
		if($count==1)
			{
				$getrec = mysql_fetch_array($Get_Marks);

				$json_array = array('status'=>1,'sub1'=>$getrec['sub1'],'sub2'=>$getrec['sub2'],'sub3'=>$getrec['sub3'],'sub4'=>$getrec['sub4'],'sub5'=>$getrec['sub5'],'sub6'=>$getrec['sub6'],'tot'=>$getrec['total'],'avg'=>$getrec['average']);
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






