<?php include("dbconnect.php")	;
	if(isset($_SESSION['rollno']) && isset($_SESSION['username']) && isset($_SESSION['mobile']) && isset($_SESSION['type']))
		{
			if($_SESSION['type']=='faculty' || $_SESSION['type']=='admin')
			{
				$userid 	= $_SESSION['rollno'];
				$mobile 	= $_SESSION['mobile'];
				$type 		= $_SESSION['type'];
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
				<li><a href="facultyhomepage.php">Home</a></li>
				<li><a href="facultyprofile.php">Profile</a></li>
				<li><a href="facultyclassdetails.php">Class Details</a></li>
				<li><a href="facultytoprankers.php">Top Rankers</a></li>
				<li><a href="facultycompare.php">Compare</a></li>
				<li><a href="facultysubjectpasspercent.php">Subject Pass Percent</a></li>				
				<li><a href="facultychangepassword.php">Change Password</a></li>
				<li><a href="logout.php">Logout</a></li>
				
			</ul>
		</div>
		
		<div class="minimenu"><div>MENU</div>
			<select onchange="location=this.value">
				<option></option>
				<option value="facultyhomepage.php">Home</option>
				<option value="facultyprofile.php">Profile</option>
				<option value="facultyclassdetails.php">Class Details</option>
				<option value="facultytoprankers.php">Top Rankers</option>
				<option value="facultycompare.php">Compare</option>
				<option value="facultysubjectpasspercent.php">Subject Pass Percent</option>
				<option value="facultychangepassword.php">Change Password</option>
				<option value="index.php">Logout</option>
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
					<h2 style="color:#2E80A5;">Class Details Page!</h2>
				<form action='facultyclassdetails.php' method='POST' enctype="multipart/form-data">				
				<table border="0">
						<tr>
					<td width="445px" align="right">Regulation :</td><td>
					<select style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="regu">
							<option value='0'>-- Select Regulation --</option>
							<option value='13'>R13</option>
							<option value='14'>R14</option>
							<option value='15'>R15</option>
							<option value='16'>R16</option>
					</select>		
					</td>
				</tr>
				
				<tr>
					<td width="445px" align="right">Semister:</td><td>
					<select name="sem" style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;'>
						<option value='0'>-- Select Semester --</option>
						<option value='1-1'>1-1</option>
						<option value='1-2'>1-2</option>
						<option value='2-1'>2-1</option>
						<option value='2-2'>2-2</option>
						<option value='3-1'>3-1</option>
						<option value='3-2'>3-2</option>
						<option value='4-1'>4-1</option>
						<option value='4-2'>4-2</option>			
					</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td align="right"><input class="btn" type="Submit" value="View Marks" name="Show_Details" style='min-width:180px;height:34px;color:white;border-style: solid;border-width:1px;'/>
					</td>
				</tr>
			</table>	
				</form>
				</div>
			</div>
		</div>
	</div><center>
	<?php
					
					//regu,sem,Show_Details
				if(isset($_POST['regu']) && isset($_POST['sem']) && isset($_POST['Show_Details']))
					{
							$regu 	= mysql_real_escape_string($_POST['regu']);
							$sem 	= mysql_real_escape_string($_POST['sem']);
							
							//id,updatedon,htno,stud_name,branch,sem,subject_name,internal,external,total,avg,status
							$get_data = mysql_query("SELECT distinct htno from `student_marks` where branch='$branch' AND sem='$sem' AND htno LIKE '%$regu%'") or die(mysql_error());
							$count = mysql_num_rows($get_data);
							if($count>0)
								{
									
								echo "
										<table rules='all' style='border:1px solid black;' align='center'>
											<tr style='border:1px solid black;'>
												<td style='color:white;background:#2E80A5;padding:10px;'> Sl.No </td>
												<td style='color:white;background:#2E80A5;padding:10px;'> Regd.Date </td>
												<td style='color:white;background:#2E80A5;padding:10px;'> H.Ticket.No </td>
												<td style='color:white;background:#2E80A5;padding:10px;'> Name </td>
												<td style='color:white;background:#2E80A5;padding:10px;'> Branch </td>
												
											</tr>	";
								//// id,picture,academicyear,regulation,sem,section,dob,username,branch,type,,gender,email,mobile,rollno,pwd
									$x=1;
									while($get_recs = mysql_fetch_assoc($get_data))
										{
											$get_stud_info = mysql_query("SELECT * from `student_marks` where htno='".$get_recs['htno']."' AND branch='$branch'") or die(mysql_error());
											$count = mysql_num_rows($get_stud_info);
											$get_info = mysql_fetch_assoc($get_stud_info);
											echo "
											<tr style='border:1px solid black;'>
												<td style='color:maroon;background:white;padding:10px;'> ".$x." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_info['updatedon']." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_info['htno']." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_info['stud_name']." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_info['branch']." </td>
												
											</tr>	";
											$x++;
										}
									echo "
										</table>";			
								}
						else
							{
								echo "
								<table>
									<tr>
										<td> No Records Found..!</td>
									</tr>
								</table>
								";
							}
					}
						
					
					?></center>
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