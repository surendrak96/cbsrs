<?php include("dbconnect.php")	;
	if(isset($_SESSION['rollno']) && isset($_SESSION['username']) && isset($_SESSION['mobile']) && isset($_SESSION['type']))
		{
			if($_SESSION['type']=='admin')
			{
				$userid 	= $_SESSION['rollno'];
				$mobile 	= $_SESSION['mobile'];
				$branch 	= $_SESSION['branch'];
		
				$success = mysql_query("SELECT * from `logincheck` where rollno='$userid' and mobile='$mobile'") or die(mysql_error());
				$count = mysql_num_rows($success);
				if($count==1)
					{
						$get_rec = mysql_fetch_array($success);
						//id 	reg_date  branch 	faculty_id 	fname 	gender 	email 	mobile 	pwd 	fac_image 	address 	status 
					}	
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
<title>CBSRS</title>
<link rel="stylesheet" href="css/cbsrs.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
		<style>
	.btn {
  background: #2E80A5;
  background-image: -webkit-linear-gradient(top, #2E80A5, #2980b9);
  background-image: -moz-linear-gradient(top, #2E80A5, #2980b9);
  background-image: -ms-linear-gradient(top, #2E80A5, #2980b9);
  background-image: -o-linear-gradient(top, #2E80A5, #2980b9);
  background-image: linear-gradient(to bottom, #2E80A5, #2980b9);
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0px;
  font-family: Arial;
  color: #ffffff;
  font-size: 14px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
	</style>
</head>
<body>
<!--------------Header--------------->
<header>
	<div class="wrap-header cbsrs">
		<div id="logo"><a href="#"><img src="./images/logo.png"/></a></div>		
	</div>
</header>

<nav>
	<div class="wrap-nav cbsrs">
		<div class="menu">
			<ul>
				<li><a href="adminhomepage.php">Home</a></li>
				<li><a href="adminregistrations.php">Registrations</a></li>
				<li><a href="adminviewusers.php">View Users</a></li>
				<li><a href="adminapprovestudents.php">Approve Students</a></li>
				<li><a href="adminuploaddata.php">Upload Data</a></li>
				<li><a href="adminchangepassword.php">Change Password</a></li>
				<li><a href="logout.php">Logout</a></li>
				
			</ul>
		</div>
		
		<div class="minimenu"><div>MENU</div>
			<select onchange="location=this.value">
				
				<option value="adminhomepage.php">Home</option>
				<option value="adminregistrations.php">New User Registration</option>
				<option value="adminviewusers.php">View and Update Users</option>
				<option value="adminapprovestudents.php">Approve Students</option>
				<option value="adminuploaddata.php">Upload Data</option>
				<option value="adminchangepassword.php">>Change Password</option>
				<li><a href="index.php">Logout</a></li>
			</select>
		</div>		
	</div>
</nav>

<!--------------Content--------------->
<section id="content">
	<div class="wrap-content cbsrs">
		<div class="row block01">
			<div class="col-full">
				<div class="wrap-col">
					<p style="color:#2E80A5;">Upload Data</p><br>
					<table border="0">
				<tr>
		<form action='adminuploaddata.php' method='POST' enctype="multipart/form-data">
					<td width="445px" align="right">Upload:</td>
					<td>
						<select style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="datatype">
							<option value='0'>-- Select Data --</option>
							<option value='Attendance'>Attendance</option>
							<option value='Studentwise_Marks'>Studentwise Marks</option>
							<option value='Faculty_Pass_Percent'>Faculty Pass Percent</option>
					</td>
				</tr>
									
				<tr>
					<td align="right">Upload Data:</td>
					<td><input type="file" name="file_upload">
					</td>
				</tr>								
				
				<tr>
					<td></td>
					<td >
						<input style='min-width:180px;height:34px;color:white;border-style: solid;border-width:1px;' class="btn" type="Submit" value="Submit" name="Upload_Data"/>
					</td>
				</tr>
				
			</table>
		</form>			
				</div><br>
		<form action='adminuploaddata.php' method='POST' enctype="multipart/form-data">		
				<div class="wrap-col">
					<p style="color:#2E80A5;">Upload Result</p><br>
					<table border="0">
				<tr>
					<td width="445px" align="right">Results Regarding:</td>
					<td><input type='text' name='link_name' style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' /> 
					</td>
				</tr>
				<tr>
					<td width="445px" align="right">Upload Result:</td>
					<td><input type="file" name="result_upload">
					</td>
				</tr>								
				
				<tr>
					<td></td>
					<td >
						<input style='min-width:180px;height:34px;color:white;border-style: solid;border-width:1px;' class="btn" type="Submit" value="Submit" name="Upload_Results"/>
					</td>
				</tr>
		</form>			
			</table>
					
				</div>
				
			</div>
		</div>
	</div>
</section><br><br><br><br><br><br><br><br><br><br><br>
<!--------------Footer--------------->
<footer>
	<div class="wrap-footer">
		<div class="copyright">
			<p>Copyright © 2017  CLOUD BASED STUDENT RANKING SYSTEM </p>
		</div>
	</div>
</footer>

</body></html>
<?php
	
			}
		
		}
	else
			{
				session_destroy();
				echo "<script language='javascript'>window.location = 'index.php?no_direct_access=1';</script>";exit();
			}	

?>
<?php
//datatype,file_upload,Upload_Data
if( isset($_POST['Upload_Data']) && isset($_POST['datatype']))
	{
		$image_name = $_FILES['file_upload']['name'];  		// Uploaded Image actual name.
		$image_type = $_FILES['file_upload']['type'];		// To know Image type.
		$image_size = $_FILES['file_upload']['size'];		// To know Image size.
		$image_temp = $_FILES['file_upload']['tmp_name'];	// Temporary Image Name for Uploaded image at 'C:\xampp\tmp\' location.
		
		if($_POST['datatype']=='0')
			{
				echo "<script language='javascript'>alert('File Type Not Selected...!');window.location = 'adminuploaddata.php';</script>";
			}
		$datatype 	= mysql_real_escape_string($_POST['datatype']);
		
		//echo $image_name."-".$datatype;
		
		date_default_timezone_set('Asia/Calcutta'); 
		$updated_on	= date("d-m-Y");
		
		if($image_size > 10485760)   // Checking whether the file is less than 10MB or not.
			{
				echo " The file you are trying to upload is too large...! ";
				exit();
			}
		
		//---------------------------- EXCEL to DATABASE ---------------------------------------
		if($datatype=='Attendance')
			{
				if( $image_type == "application/vnd.ms-excel" )
					{
						$upload = move_uploaded_file($image_temp, "attendance/$image_name.xls");
						$file = "attendance/$image_name.xls";
						$fileopen = fopen($file, 'r');
						
						$i=0;
						
						if(!$fileopen)
							{
								echo "<script language='javascript'>alert('Attendance File can not be opened..!');window.location = 'adminuploaddata.php';</script>";exit();
							}
						
						$att_deletion = mysql_query("Delete from `stud_attendance`") or die(mysql_error());	
						
						while( !feof($fileopen) )
							{
								$record = fgetcsv($fileopen);
								if($i!=0)
								{
									$htno 		= $record[0];
									$branch 	= $record[1];
									$stud_name 	= $record[2];
											
									$jan 		= $record[3];
									$feb 		= $record[4];
									$mar 		= $record[5];
									$apr 		= $record[6];
									$may		= $record[7];
									$jun 		= $record[8];
									$jul 		= $record[9];
									$aug 		= $record[10];
									$sep 		= $record[11];
									$oct 		= $record[12];
									$nov 		= $record[13];
									$dec 		= $record[14];

									$perc 		= $record[15];
									
									//echo $htno."-".$branch."-".$stud_name;//."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-".."";
		//id,updatedon,rollno,studname,regulation,academicyear,branch,sem,section,January,February,March,April,May,June,July,August,September,October,November,December,avg,status
									$att_insertion = mysql_query("INSERT INTO `stud_attendance` (id, updatedon, rollno, studname, branch, January, February, March, April, May, June, July, August, September, October, November, December, avg, status) VALUES('','$updated_on', '$htno', '$stud_name', '$branch', '$jan', '$feb', '$mar', '$apr','$may','$jun','$jul','$aug','$sep','$oct','$nov','$dec','$perc','0')") or die(mysql_error());
								}
								$i++;
							}
					fclose($fileopen);
					echo "<script language='javascript'>alert('Upload Success');window.location = 'adminuploaddata.php';</script>";exit();
					}
				else
					{
						echo "<script language='javascript'>alert('Please provide .csv extention file only..!');window.location = 'adminuploaddata.php';</script>";exit();
					}
			}
		if($datatype=='Studentwise_Marks')
			{
			
				if( $image_type == "application/vnd.ms-excel" )
					{
						$upload = move_uploaded_file($image_temp, "stud_marks/$image_name.xls");
						$file = "stud_marks/$image_name.xls";
						$fileopen = fopen($file, 'r');
						
						$i=0;
						
						if(!$fileopen)
							{
								echo "<script language='javascript'>alert('Student Marks File can not be opened..!');window.location = 'adminuploaddata.php';</script>";exit();
							}
						else
							{
								$del_empty = mysql_query("DELETE from `student_marks`") or die(mysql_error());
							}

						$marks_deletion = mysql_query("Delete from `student_marks`") or die(mysql_error());	
						
						while( !feof($fileopen) )
							{
								$record = fgetcsv($fileopen);
								if($i!=0)
								{
									$htno 		= $record[0];
									$stud_name 	= $record[1];
									$branch 	= $record[2];
											
									$sem 		= $record[3];
									$subject 	= $record[4];
									$internal 	= $record[5];
									$external 	= $record[6];
									//$total		= $record[7];
									//$perc 		= $record[8];
									
									$total 	= (int)$internal + (int)$external ;
									$perc 	= (float)$total/2;
									
									//echo $htno."-".$branch."-".$stud_name;//."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-".."";
									//id,updatedon,htno,stud_name,branch,sem,subject_name,internal,external,total,avg,status
									
									$marks_insertion = mysql_query("INSERT into `student_marks` (id,updatedon,htno,stud_name,branch,sem,subject_name,internal,external,total,avg,status) VALUES('','$updated_on','$htno', '$stud_name', '$branch', '$sem', '$subject', '$internal', '$external', '$total','$perc',0)") or die(mysql_error());
									
								}
								$i++;
							}
					fclose($fileopen);
					
					$att_sem_updation = mysql_query("UPDATE `student_marks` SET sem='4-2' WHERE sem='4 2'") or die(mysql_error());
					$att_sem_updation = mysql_query("UPDATE `student_marks` SET sem='4-1' WHERE sem='4 1'") or die(mysql_error());
					$att_sem_updation = mysql_query("UPDATE `student_marks` SET sem='3-2' WHERE sem='3 2'") or die(mysql_error());
					$att_sem_updation = mysql_query("UPDATE `student_marks` SET sem='3-1' WHERE sem='3 1'") or die(mysql_error());
					$att_sem_updation = mysql_query("UPDATE `student_marks` SET sem='2-2' WHERE sem='2 2'") or die(mysql_error());
					$att_sem_updation = mysql_query("UPDATE `student_marks` SET sem='2-1' WHERE sem='2 1'") or die(mysql_error());
					$att_sem_updation = mysql_query("UPDATE `student_marks` SET sem='1-2' WHERE sem='1 2'") or die(mysql_error());
					$att_sem_updation = mysql_query("UPDATE `student_marks` SET sem='1-1' WHERE sem='1 1'") or die(mysql_error());
					
					//SELECT sum(internal+external) as total FROM `student_marks` where htno='13P31A0501' and sem='4-1'
					//SELECT sum(avg)/4 as percentage FROM `student_marks` where htno='13P31A0501' and sem='4-1'
					
					//--------------------------- Total and Avg Updation --------------------------------------------------------------	
					
					
					$get_distinct_sems = mysql_query("SELECT distinct sem from `student_marks`") or die(mysql_error());
					$sem_count = mysql_num_rows($get_distinct_sems);
						
					while($get_sem = mysql_fetch_array($get_distinct_sems))
						{
							$sem = $get_sem['sem'];
							
							$get_distinct_htnos = mysql_query("SELECT distinct htno from `student_marks`") or die(mysql_error());
							$ht_count = mysql_num_rows($get_distinct_htnos);
							
							while($get_ht = mysql_fetch_array($get_distinct_htnos))
								{
									$htno = $get_ht['htno'];
									
									$total_val = mysql_query("SELECT sum(internal+external) as total from `student_marks` where htno='$htno' AND sem='$sem'") or die(mysql_error());
									$get_val = mysql_fetch_array($total_val);
									$tot = $get_val['total'];
									$tot_updation = mysql_query("UPDATE `student_marks` SET total='$tot' where htno='$htno' AND sem='$sem'") or die(mysql_error());	
									
									$avg_val = mysql_query("SELECT sum(avg)/4 as percentage FROM `student_marks` where htno='$htno' AND sem='$sem'") or die(mysql_error());
									$get_val = mysql_fetch_array($avg_val);
									$avg = $get_val['percentage'];
									$tot_updation = mysql_query("UPDATE `student_marks` SET avg='$avg' where htno='$htno' AND sem='$sem'") or die(mysql_error());	
								}
						}	
					$marks_deletion = mysql_query("Delete from `student_marks` Where htno=''") or die(mysql_error());		
				//--------------------------- Total and Avg Updation --------------------------------------------------------------
					
					
					echo "<script language='javascript'>alert('Upload Success');window.location = 'adminuploaddata.php';</script>";
					
					exit();
					}
				else
					{
						echo "<script language='javascript'>alert('Please provide .csv extention file only..!');window.location = 'adminuploaddata.php';</script>";exit();
					}
			}
		if($datatype=='Faculty_Pass_Percent')
			{
				if( $image_type == "application/vnd.ms-excel" )
					{
						$upload = move_uploaded_file($image_temp, "faculty_pass_perc/$image_name.xls");
						$file = "faculty_pass_perc/$image_name.xls";
						$fileopen = fopen($file, 'r');
						
						$i=0;
						
						if(!$fileopen)
							{
								echo "<script language='javascript'>alert('Attendance File can not be opened..!');window.location = 'adminuploaddata.php';</script>";exit();
							}
						else
							{
								$del_empty = mysql_query("DELETE from `fac_pass_perc`") or die(mysql_error());
							}							
						while( !feof($fileopen) )
							{
								$record = fgetcsv($fileopen);
								if($i!=0)
								{
									$facid 		= $record[0];
									$facname 	= $record[1];
									$subject 	= $record[2];
									$avg	 	= $record[3];
									$dept 		= $record[4];
									
									//echo $htno."-".$branch."-".$stud_name;//."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-"..."-".."";
									//id,updatedon,,fac_id,fac_name,dept,sub_dealing,avg,status
									$fac_perc_insertion = mysql_query("INSERT into `fac_pass_perc` (id,updatedon,fac_id,fac_name,dept,sub_dealing,avg,status) VALUES('','$updated_on','$facid', '$facname', '$dept', '$subject', '$avg',0)") or die(mysql_error());
								}
								$i++;
							}
					fclose($fileopen);
					$del_empty = mysql_query("DELETE from `fac_pass_perc` WHERE fac_id=''") or die(mysql_error());
					
					//UPDATE `fac_pass_perc` SET `fac_id`= CONCAT('FAC',`fac_id`) Where status=0
					$del_empty = mysql_query("UPDATE `fac_pass_perc` SET `fac_id`= CONCAT('FAC',`fac_id`) Where status=0") or die(mysql_error());
					echo "<script language='javascript'>alert('Upload Success');window.location = 'adminuploaddata.php';</script>";exit();
					
					//UPDATE logincheck INNER JOIN fac_pass_perc ON fac_pass_perc.fac_id = logincheck.rollno SET logincheck.username = fac_pass_perc.fac_name
					$update_logincheck_tab = mysql_query("UPDATE logincheck INNER JOIN fac_pass_perc ON fac_pass_perc.fac_id = logincheck.rollno SET logincheck.username = fac_pass_perc.fac_name") or die(mysql_error());
					
					echo "<script language='javascript'>alert('Upload Success');window.location = 'adminuploaddata.php';</script>";exit();
					}
				else
					{
						echo "<script language='javascript'>alert('Please provide .csv extention file only..!');window.location = 'adminuploaddata.php';</script>";exit();
					}
			}	
	}
		//--------------------------------------------------------------------------------------

?>
<?php
//link_name,result_upload,Upload_Results

if( isset($_POST['Upload_Results']) )
	{
		$image_name = $_FILES['result_upload']['name'];  	// Uploaded Image actual name.
		$image_type = $_FILES['result_upload']['type'];		// To know Image type.
		$image_size = $_FILES['result_upload']['size'];		// To know Image size.
		$image_temp = $_FILES['result_upload']['tmp_name'];	// Temporary Image Name for Uploaded image at 'C:\xampp\tmp\' location.
		
		
		date_default_timezone_set('Asia/Calcutta'); 
		$updated_on	= date("d-m-Y");
		
		if(!empty(isset($_POST['Upload_Results'])))
			{
				$linkname = mysql_real_escape_string($_POST['link_name']);
			}
		else
			{
				$linkname = $updated_on."-Results-".uniqid(time());
			}		
		if($image_size > 10485760)   // Checking whether the file is less than 10MB or not.
			{
				echo " The file you are trying to upload is too large...! ";
				exit();
			}
		
		$ext = pathinfo($image_name, PATHINFO_EXTENSION);
		
	if($ext=='xls' || $ext=='xlsx' || $ext=='doc' || $ext=='docx' || $ext=='pdf')
		{
			$filename = uniqid(time()).".".$ext;  
			//echo "<script language='javascript'>alert('".$ext."');</script>";	
			
			$upload = move_uploaded_file($image_temp, "results/$filename"); 
			
			if( $upload ) 
				{
					//id,updatedon,filepath,linkname,status
					
					$up_date_attachment = mysql_query("INSERT into `results`(id,updatedon,filepath,linkname,status) values ('','$updated_on','results/$filename','$linkname',0)") or die(mysql_error());
					if($up_date_attachment)
						{
							echo "<script language='javascript'>alert('Results Uploaded...!');window.location = 'adminuploaddata.php';</script>";
						}
					else
						{
							echo "<script language='javascript'>alert('Results Not Uploaded...!');window.location = 'adminuploaddata.php';</script>";
						}	
				}
			else
				{
					echo "<script language='javascript'>alert('Not Uploaded...!');window.location = 'adminuploaddata.php';</script>";
				}	
		}
	else
		{
			echo "<script language='javascript'>alert('Invalid File Format...!');window.location = 'adminuploaddata.php';</script>";
		}
	}
?>