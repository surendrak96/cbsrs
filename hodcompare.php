<?php include("dbconnect.php")	;
	if(isset($_SESSION['rollno']) && isset($_SESSION['username']) && isset($_SESSION['mobile']) && isset($_SESSION['type']))
		{
			if($_SESSION['type']=='hod' || $_SESSION['type']=='admin')
			{
				$userid 	= $_SESSION['rollno'];
				$username 	= $_SESSION['username'];
				$mobile 	= $_SESSION['mobile'];
				$utype 		= $_SESSION['type'];
				$branch 	= $_SESSION['branch'];
		
				$success = mysql_query("SELECT * from `logincheck` where rollno='$userid'") or die(mysql_error());
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
				<li><a href="hodhomepage.php">Home</a></li>
				<li><a href="hodprofile.php">Profile</a></li>
				<li><a href="hodviewmarkslist.php">Department MarksList</a></li>
				<li><a href="hodviewtoprankers.php">Top Rankers</a></li>
				<li><a href="hodcompare.php">Compare</a></li>
				<li><a href="hodchangepassword.php">Change Password</a></li>
				<li><a href="logout.php">Logout</a></li>
				
			</ul>
		</div>
		
		<div class="minimenu"><div>MENU</div>
			<select onchange="location=this.value">
				<option></option>
				<option value="hodhomepage.php">Home</option>
				<option value="hodprofile.php">Profile</option>
				<option value="hodviewmarkslist.php">Department MarksList</option>
				<option value="hodviewtoprankers.php">Top Rankers</option>
				<option value="hodcompare.php">Compare</option>
				<option value="hodchangepassword.php">Change Password</option>
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
				
					<h2 style="color:#2E80A5;">Compare</h2>
					<table border="0">
			<form action='hodcompare.php' method='POST' enctype="multipart/form-data">
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
					<td width="445px" align="right">Branch-1:</td><td>
					<select style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="branch1">
							<option value='0'>-- Select Branch --</option>
							<option value='CSE'>CSE</option>
							<option value='IT'>IT</option>
							<option value='EEE'>EEE</option>
							<option value='ECE'>ECE</option>
							<option value='CIVIL'>CIVIL</option>
							<option value='MECH'>MECH</option>
					</select>		
					</td>
				</tr>
				<tr>
					<td width="445px" align="right">Branch-2:</td><td>
					<select style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="branch2">
							<option value='0'>-- Select Branch --</option>
							<option value='CSE'>CSE</option>
							<option value='IT'>IT</option>
							<option value='EEE'>EEE</option>
							<option value='ECE'>ECE</option>
							<option value='CIVIL'>CIVIL</option>
							<option value='MECH'>MECH</option>
					</select>		
					</td>
				</tr>
				<tr>
					<td width="445px" align="right">Semister:</td><td>
					<SELECT style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="sem" id='ssemister' title="* Semister">
																	<option value='0'>-- Select Semister --</option>
																	<option value='1-1'>1 Year 1 Semister</option>
																	<option value='1-2'>1 Year 2 Semister</option>
																	<option value='2-1'>2 Year 1 Semister</option>
																	<option value='2-2'>2 Year 2 Semister</option>
																	<option value='3-1'>3 Year 1 Semister</option>
																	<option value='3-2'>3 Year 2 Semister</option>
																	<option value='4-1'>4 Year 1 Semister</option>
																	<option value='4-2'>4 Year 2 Semister</option>
																</select>
					</td>
				</tr>
				<tr>
				<td></td>
					<td align="right"><input class="btn" type="Submit" value="Compare These Dept" name="Compare_Now" style='min-width:180px;height:34px;color:white;border-style: solid;border-width:1px;' />
					</td>
				</tr>
				</form>
			</table>
			<?php
			//regu,branch1,branch2,sem,Compare_Now
			if(isset($_POST['regu']) && isset($_POST['branch1']) && isset($_POST['branch2']) && isset($_POST['sem']) && isset($_POST['Compare_Now']))
				{
						$regu 		= mysql_real_escape_string($_POST['regu']);
						$branch1 	= mysql_real_escape_string($_POST['branch1']);
						$branch2 	= mysql_real_escape_string($_POST['branch2']);
						$sem 		= mysql_real_escape_string($_POST['sem']);
						
			//------------------------------------			
						$get_distinct_htnos_branch_1 = mysql_query("SELECT distinct htno from `student_marks` where htno LIKE '%$regu%' AND `branch`='$branch1' AND `sem`='$sem' AND avg>=70 ORDER BY avg desc") or die(mysql_error());
						$ht_count_branch_1 = mysql_num_rows($get_distinct_htnos_branch_1);  // we get students of more than 70% avg of branch-1.
						
						$branch_1_pass_perc = mysql_query("SELECT sum(avg)/count(*) as avg_perc from `student_marks` where htno LIKE '%$regu%' AND `branch`='$branch1' AND `sem`='$sem'") or die(mysql_error());
						$pass_perc_branch_1 = mysql_num_rows($branch_1_pass_perc);  // we get pass percentage of branch-1.
						$get_rec = mysql_fetch_assoc($branch_1_pass_perc);
						$branch_1_avg_perc 	= $get_rec['avg_perc'];
						
						//SELECT htno, stud_name, branch, max(avg)as max_avg  FROM `student_marks` WHERE branch='CSE' AND sem='4-1'
						
						$branch_1_topper = mysql_query("SELECT htno, stud_name, branch, max(avg)as max_avg  FROM `student_marks` where htno LIKE '%$regu%' AND `branch`='$branch1' AND `sem`='$sem'") or die(mysql_error());
						$topper_branch_1 = mysql_num_rows($branch_1_topper);
						
						$get_rec = mysql_fetch_assoc($branch_1_topper);
						
						$branch_1_htno 		= $get_rec['htno'];
						$branch_1_stud_name = $get_rec['stud_name'];
						$branch_1_branch 	= $get_rec['branch'];
						$branch_1_max_avg 	= $get_rec['max_avg'];
			//------------------------------------			
						$get_distinct_htnos_branch_2 = mysql_query("SELECT distinct htno from `student_marks` where htno LIKE '%$regu%' AND `branch`='$branch2' AND `sem`='$sem' AND avg>=70 ORDER BY avg desc") or die(mysql_error());
						$ht_count_branch_2 = mysql_num_rows($get_distinct_htnos_branch_2);  // we get students of more than 70% avg of branch-2.
						
						$branch_2_pass_perc = mysql_query("SELECT sum(avg)/count(*) as avg_perc from `student_marks` where htno LIKE '%$regu%' AND `branch`='$branch2' AND `sem`='$sem'") or die(mysql_error());
						$pass_perc_branch_2 = mysql_num_rows($branch_2_pass_perc);  // we get pass percentage of branch-1.
						$get_rec = mysql_fetch_assoc($branch_2_pass_perc);
						$branch_2_avg_perc 	= $get_rec['avg_perc'];
						//SELECT htno, stud_name, branch, max(avg)as max_avg  FROM `student_marks` WHERE branch='CSE' AND sem='4-1'
						
						$branch_2_topper = mysql_query("SELECT htno, stud_name, branch, max(avg)as max_avg  FROM `student_marks` where htno LIKE '%$regu%' AND `branch`='$branch2' AND `sem`='$sem'") or die(mysql_error());
						$topper_branch_2 = mysql_num_rows($branch_2_topper);
						
						$get_rec = mysql_fetch_assoc($branch_2_topper);
						
						$branch_2_htno 		= $get_rec['htno'];
						$branch_2_stud_name = $get_rec['stud_name'];
						$branch_2_branch 	= $get_rec['branch'];
						$branch_2_max_avg 	= $get_rec['max_avg'];
			//-------------------------------------			
				echo "
				<div style='display:inline block;' align='center'>
					<div align='center'><br>
						<table style='border:3px solid silver;width:700px;'>
							<tr>
								<td colspan=2 align='center' style='border:1px solid silver;background:#002B55;color:white;font-size:20px;'>".$branch1."</td>
							</tr>
							<tr style='border:1px solid silver;'>
								<td style='background:maroon;color:white;width:230px;' align='right'>Number of students above 70% :&nbsp;&nbsp;</td> <td align='center'>".$ht_count_branch_1."</td>
							</tr>
							<tr style='border:1px solid silver;'>
								<td style='background:maroon;color:white;width:230px;' align='right'>Branch Pass Percentage :&nbsp;&nbsp;</td> <td align='center'>".$branch_1_avg_perc."</td>
							</tr>
							<tr style='border:1px solid silver;background:#ACD602'>
								<td align='right' style='background:maroon;color:white;width:230px;' valign='middle'>Branch Topper :&nbsp;&nbsp;</td>
								<td style='font-size:14px;backgorund:#D4D4FF;' align='center'>
									".$branch_1_htno."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$branch_1_stud_name."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$branch_1_max_avg."
								</td>
							</tr>
						</table>
					</div><br>
					<div align='center'><br>
						<table style='border:3px solid silver;width:700px;'>
							<tr>
								<td colspan=2 align='center' style='border:1px solid silver;background:#002B55;color:white;font-size:20px;'>".$branch2."</td>
							</tr>
							<tr style='border:1px solid silver;'>
								<td style='background:maroon;color:white;width:230px;' align='right'>Number of students above 70% :&nbsp;&nbsp;</td> <td align='center'>".$ht_count_branch_2."</td>
							</tr>
							<tr style='border:1px solid silver;'>
								<td style='background:maroon;color:white;width:230px;' align='right'>Branch Pass Percentage :&nbsp;&nbsp;</td> <td align='center'>".$branch_2_avg_perc."</td>
							</tr>
							<tr style='border:1px solid silver;background:#ACD602'>
								<td align='right' style='background:maroon;color:white;width:230px;' valign='middle'>Branch Topper :&nbsp;&nbsp;</td>
								<td style='font-size:14px;backgorund:#D4D4FF;' align='center'>
									".$branch_2_htno."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$branch_2_stud_name."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$branch_2_max_avg."
								</td>
							</tr>
						</table>
					</div>
				</div>

				";				
					
				}				
			?>
			
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