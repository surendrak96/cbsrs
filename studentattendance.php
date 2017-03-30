<?php include("dbconnect.php")	;
	if(isset($_SESSION['rollno']) && isset($_SESSION['username']) && isset($_SESSION['mobile']) && isset($_SESSION['type']))
		{
			if($_SESSION['type']=='student' || $_SESSION['type']=='admin')
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
				<li><a href="studenthomepage.php">Home</a></li>
				<li><a href="studentprofile.php">Profile</a></li>
				<li><a href="studentattendance.php">attendance</a></li>
				<li><a href="studentmarkslist.php">MarksList</a></li>
				<li><a href="studenttoprankers.php">Top Rankers</a></li>
				<li><a href="studentlatestresult.php">Latest Results</a></li>
				<li><a href="studentchangepassword.php">Change Password</a></li>
				<li><a href="logout.php">Logout</a></li>
				
			</ul>
		</div>
		
		<div class="minimenu"><div>MENU</div>
			<select onchange="location=this.value">
				<option></option>
				<option value="studenthomepage.php">Home</option>
				<option value="studentprofile.php">Profile</option>
				<option value="studentattendance.php">attendance</option>
				<option value="studentmarkslist.php">MarkList</option>
				<option value="studenttoprankers.php">Top Rankers</option>
				<option value="studentlatestresult.php">Latest Results</option>
				<option value="studentchangepassword.php">Change Password</option>
				<option value="logout.php">Logout</option>
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
					<h2 style="color:#2E80A5;">View Attendance</h2>

			<table>
			<tr>
					<td colspan=2>

					</td>
				</tr>
			</table>
					
				</div>
			</div>
								<table border="0" align='center'>
				<tr>
				<form action='studentattendance.php' method='POST'>
					<td width="445px" align="right">Semister:</td><td>
					<select name="month" style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;'>
						<option value='0'>-- Select Semester --</option>
						<option value='January'>January</option>
						<option value='February'>February</option>
						<option value='March'>March</option>
						<option value='April'>April</option>
						<option value='May'>May</option>
						<option value='June'>June</option>
						<option value='July'>July</option>
						<option value='August'>August</option>
						<option value='September'>September</option>
						<option value='October'>October</option>
						<option value='November'>November</option>
						<option value='December'>December</option>
					</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td align="right"><input class="btn" type="Submit" value="Show Attendance" name="Show_Attendance" style='min-width:180px;height:34px;color:white;border-style: solid;border-width:1px;'/>
					</td>
				</tr>
				</form>
				<tr>
					<td colspan='2'>
						<center>
							<div style='height:30px;'></div>
							<span id='show_message'></span>
						</center>
					</td>
				</tr>
			</table>	
		</div>
	</div>
							<?php
				//month
				
							//echo "<script language='javascript'>alert('".."');</script>";
					if(isset($_POST['Show_Attendance']))
						{
							$month = mysql_real_escape_string($_POST['month']) ;
							
							$get_cols = mysql_query("SHOW COLUMNS FROM `stud_attendance`") or die(mysql_error());
							$count = mysql_num_rows($get_cols);
							while($get_col_name = mysql_fetch_assoc($get_cols))
								{
									if($month==$get_col_name['Field'])
										{
											$col_name = $get_col_name['Field'];
										}	
								}
							$success = mysql_query("SELECT * from `stud_attendance` where htno='$userid' AND branch='$branch'") or die(mysql_error());
							$count = mysql_num_rows($success);
							$x=1;
							if($count>0)
								{
									echo "<center>
										<table style='color:black;border:solid black 1px;' >
											<tr style='background:#3a231b;color:white;text-align:center;'>
												<td style='border:solid black 1px;padding:10px;'>User ID</td> 
												<td style='border:solid black 1px;padding:10px;'>Last Updated</td>
												<td style='border:solid black 1px;padding:10px;'>$col_name</td>
												<td style='border:solid black 1px;padding:10px;'>Your Total Percentage</td>
											</tr>
											";
										
									while($get_rec = mysql_fetch_array($success))		
										{
											echo "
												<tr>
													<td style='border:solid black 1px;padding:10px;text-align:center;'>
														".strtoupper($userid)."
													</td>
													<td style='border:solid black 1px;padding:10px;text-align:center;'>
														".$get_rec['updatedon']."
													</td>
												
												
													<td style='border:solid black 1px;padding:10px;text-align:center;'>
														".$get_rec[$col_name]."
													</td>
												
													<td style='border:solid black 1px;padding:10px;text-align:center;'>
														".$get_rec['avg']."
													</td>
													
												</tr>
										
										";
										}
									echo "
										
										</table></center>
									
									";
								}
							else
								{
									echo "
										<table border='0' rules='all' style='border:solid black 1px' align='center'>
											<tr>
												<td style='border:solid black 1px'>No Records Found..!</td>
											</tr>
										</table>
									
									";
								}
						}	
				?>
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