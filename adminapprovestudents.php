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
<?php
//accept_stud,dated,sbranch,accept
					if(isset($_POST['rec_id']) && isset($_POST['htno']))
						{
						$rec_id = mysql_real_escape_string($_POST['rec_id']);
						$htno 	= mysql_real_escape_string($_POST['htno']);

						$set_status = mysql_query("UPDATE `logincheck` set status=1 where rollno='$htno'") or die(mysql_error());
							
						$get_status = mysql_query("SELECT * FROM `logincheck` WHERE rollno='$htno' AND status=1") or die(mysql_error());
						$count = mysql_num_rows($get_status);
						if($count==1)
							{
								$get_rec = mysql_fetch_assoc($get_status);
								
								$username="venualamir";
								$password="password";
								$sender="ALAMIR";
								$mmessage = "Dear student, Your Registration has been approved by admin. Now you can login with User ID: ".$get_rec['rollno']." and Password: '".$get_rec['pwd']."'   ADITYA ENG COLLEGE, Surampalem.";
								$contact = $get_rec['mobile'];
											
								$url="desireit.bulksms5.com/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($contact)."&message=".urlencode($mmessage)."&sender=".urlencode($sender)."&type=".urlencode('3'); 
											
								$ch = curl_init($url);					
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);					
								$curl_scraped_page = curl_exec($ch);					
								curl_close($ch);
								
								echo "<script language='javascript'>alert('".$get_rec['rollno']." has been approved...!');</script>";
							}
								
									
						}	
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
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
	<script>
	$(document).ready(function() {
				// Your Code goes here
				$(function() {
								$( "#datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
							  });
	});
	</script>
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
				<div class="wrap-col" align='center'>
					
					
				</div>
				
			</div>
			<h2 style="color:#2E80A5;">Approve Students Page</h2>
					<table border="0">
				<form action='adminapprovestudents.php' method='post'>	
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
				
					<td align="right">Branch:</td>
					<td>
					<SELECT style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="branch" id='sbranch' title="* Brnach">
							<option value='0'>-- Select Branch --</option>
							<option value='CSE'>CSE</option>
							<option value='IT'>IT</option>
							<option value='EEE'>EEE</option>
							<option value='ECE'>ECE</option>
					</SELECT>
					</td>
				</tr>				
			<!--	<tr>
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
				</tr>-->
				<tr>
					<td></td>
					<td align="right"><input class="btn" style='min-width:180px;height:34px;color:white;border-style: solid;border-width:1px;' type="Submit" value="View Students" name="view_students"/>
					</td>
				</tr>
				</form>
				
			</table>
		</div>
		
	</div>
</section>
<div align='center'>
<?php
					
					
					
					
					//regu,branch,sem,view_students
					if(isset($_POST['regu']) && isset($_POST['branch']) && isset($_POST['view_students']))
						{
							$regu 		= mysql_real_escape_string($_POST['regu']);
							$branch 	= mysql_real_escape_string($_POST['branch']);
							//$sem 		= mysql_real_escape_string($_POST['sem']);
							//id,updatedon,htno,stud_name,branch,sem,subject_name,internal,external,total,avg,status
							$get_data = mysql_query("SELECT distinct rollno from `logincheck` where branch='$branch' AND rollno LIKE '%$regu%' AND status=0") or die(mysql_error());
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
												<td style='color:white;background:#2E80A5;padding:10px;'> Approve </td>
												<td style='color:white;background:#2E80A5;padding:10px;'> Declain </td>
											</tr>	";
								//// id,picture,academicyear,regulation,sem,section,dob,username,branch,type,,gender,email,mobile,rollno,pwd
									$x=1;
									while($get_recs = mysql_fetch_assoc($get_data))
										{
											$get_stud_info = mysql_query("SELECT * from `logincheck` where rollno='".$get_recs['rollno']."' AND branch='$branch' AND rollno LIKE '%$regu%' AND status=0") or die(mysql_error());
											$count = mysql_num_rows($get_stud_info);
											$get_info = mysql_fetch_assoc($get_stud_info);
											echo "
											<tr style='border:1px solid black;'>
												<td style='color:maroon;background:white;padding:10px;'> ".$x." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_info['updatedon']." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_info['rollno']." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_info['username']." </td>
												<td style='color:maroon;background:white;padding:10px;'> ".$get_info['branch']." </td>
												<td style='color:maroon;background:white;padding:10px;'>
												<form action='adminapprovestudents.php' method='post'>
													<input type='hidden' value='".$get_info['id']."' name='rec_id'/>
													<input type='hidden' value='".$get_info['rollno']."' name='htno'/>
													<input type='submit' name='accept' Value='Accept' class='btn'/>
												</form>	
												</td>
												<td style='color:maroon;background:white;padding:10px;'> 
												<form action='adminapprovestudents.php' method='post'>
													<input type='hidden' value='".$get_info['id']."' name='reject_stud'/>
													<input type='hidden' value='".$get_info['rollno']."' name='htno'/>
													<input type='submit' name='reject' Value='Reject' class='btn'/>
												</form>	
												</td>
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
					?>
					
</div>					
<br><br><br><br><br><br><br><br><br><br><br>
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
