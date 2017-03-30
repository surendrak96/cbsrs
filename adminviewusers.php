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
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,800,700,300' rel='stylesheet' type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>                  
                <link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css"/>
                <link rel="stylesheet" href="js/flexslider/flexslider.css"/>                
                <link rel="stylesheet" href="css/jquery.ui.all.css"/>                
                <link rel="stylesheet" href="css/jquery.ui.theme.css"/> 
				<link rel="stylesheet" href="style.css"/>
                <link rel="stylesheet" href="css/media-queries.css"/>                    
                <link rel="stylesheet" href="css/custom.css"/>  
				
				<script src="js/jquery-1.8.2.min.js"></script>
                <script src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>                
                <script src="js/jquery.validate.min.js"></script>
                <script src="js/jquery.form.js"></script>
                <script src="js/jquery.ui.core.min.js"></script>
                <script src="js/jquery.ui.datepicker.min.js"></script>
                <script src="js/jquery.cycle.lite.js"></script>
                <script src="js/jquery.easing.1.3.js"></script>
                <script src="js/jquery-twitterFetcher.js"></script>
                <script src="js/flexslider/jquery.flexslider-min.js"></script>
                <script src="js/jquery.isotope.min.js"></script>
                
                <script src="js/custom.js"></script>
	
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
	<script>
			$(document).ready(function() {
				// Your Code goes here
				$(function() {
								$( "#datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
							  });
				
		</script>
		
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
				<div class="wrap-col" align='center'>
					<h2 style="color:#2E80A5;">View Users</h2>
					<table border="0">
				<tr>
				<form action='adminviewusers.php' method='post'>
					<td align="left">Branch:</td>
					<td>
					<SELECT style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="sbranch" id='sbranch' title="* Brnach">
							<option value='0'>-- Select Branch --</option>
							<option value='CSE'>CSE</option>
							<option value='IT'>IT</option>
							<option value='EEE'>EEE</option>
							<option value='ECE'>ECE</option>
					</SELECT>
					</td>
				</tr>				
				<tr>
					<td align="left">User Type:</td>
					<td>
					<SELECT style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="utype" id='utype' title="* User Type">
																	<option value='0'>-- Select User Type --</option>
																	<option value='faculty'>Faculty</option>
																	<option value='hod'>HOD</option>
																	<option value='principal'>Principal</option>
																	<option value='student'>Students</option>
																</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td align="right"><input class="btn" style='min-width:180px;height:34px;color:white;border-style: solid;border-width:1px;' type="Submit" value="View" name="view"/>
					</td>
				</tr>
				</form>
				
			</table>
					
				</div>
			</div>
		</div>
	</div>
</section>
<div align='center'>
<?php
					
					//sbranch,utype
				if(isset($_POST['sbranch']) && isset($_POST['utype']))
					{
							$branch 	= mysql_real_escape_string($_POST['sbranch']);
							$utype 		= mysql_real_escape_string($_POST['utype']);
							
							if($utype == 'principal')
								{
									$branch = '';
								}
						if($utype!='student')	
							{
							$get_data = mysql_query("SELECT * from `logincheck` where branch='$branch' AND type='$utype' AND status='1'") or die(mysql_error());
							$count = mysql_num_rows($get_data);
							if($count>0)
								{
									
								echo "
										<table rules='all' style='border:1px solid black;' align='center'>
											<tr style='border:1px solid black;'>
												<td style='color:white;background:#2E80A5;padding:10px;'> Sl.No </td>
												<td style='color:white;background:#2E80A5;padding:10px;'> Name </td>
												<td style='color:white;background:#2E80A5;padding:10px;'> Gender </td>
												<td style='color:white;background:#2E80A5;padding:10px;'> Branch </td>
												<td style='color:white;background:#2E80A5;padding:10px;'> Email ID </td>
												<td style='color:white;background:#2E80A5;padding:10px;'> Mobile </td>
											</tr>	";
								//// id,picture,academicyear,regulation,sem,section,dob,username,branch,type,,gender,email,mobile,rollno,pwd
									$x=1;
									while($get_recs = mysql_fetch_assoc($get_data))
										{
											echo "
											<tr style='border:1px solid black;'>
												<td style='color:maroon;background:white;padding:10px;'> ".$x." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_recs['username']."</td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_recs['gender']."</td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_recs['branch']." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_recs['email']." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_recs['mobile']." </td>
												
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
						else
							{
								
							//id,updatedon,htno,stud_name,branch,sem,subject_name,internal,external,total,avg,status
							$get_data = mysql_query("SELECT distinct rollno from `logincheck` where branch='$branch' AND type='$utype' AND status=1") or die(mysql_error());
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
											$get_stud_info = mysql_query("SELECT * from `logincheck` where rollno='".$get_recs['rollno']."' AND branch='$branch' AND status=1") or die(mysql_error());
											$count = mysql_num_rows($get_stud_info);
											$get_info = mysql_fetch_assoc($get_stud_info);
											echo "
											<tr style='border:1px solid black;'>
												<td style='color:maroon;background:white;padding:10px;'> ".$x." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_info['updatedon']." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_info['rollno']." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_info['username']." </td>
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
					}
					?>
					
</div>	<br><br><br><br><br>
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
