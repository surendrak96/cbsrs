<?php include("dbconnect.php")	;
	if(isset($_SESSION['rollno']) && isset($_SESSION['username']) && isset($_SESSION['mobile']) && isset($_SESSION['type']))
		{
			if($_SESSION['type']=='hod' || $_SESSION['type']=='admin')
			{
				$userid 	= $_SESSION['rollno'];
				$mobile 	= $_SESSION['mobile'];
				$type 		= $_SESSION['type'];
		
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
			//apo_name,apo_phone,apo_date,message,get_appointment     
			$(document).ready(function() {
				 $(function() {
								$( "#datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
							  });
			$("#profile_update").click(function(){
											//uid,uname,gender,sdob,uemail,umobile,profile_update
											var suid 		= document.getElementById("uid").value;
											var suname 		= document.getElementById("uname").value;
											var sgender 		= document.getElementById("gender").value;
											var ssdob 		= document.getElementById("sdob").value;
											var suemail 		= document.getElementById("uemail").value;
											var sumobile 	= document.getElementById("umobile").value;
											
										$.ajax({
										url:'user_reg.php',
										type:'post',
										datatype:'JSON',
										data : {suid:suid,suname:suname,sgender:sgender,ssdob:ssdob,suemail:suemail,sumobile:sumobile},
										success: function(result) 
														{
															//alert(result);
															
															pass = $.parseJSON(result);
															if(pass.status==1)
																{
																	alert("Updation Success..!");
																	window.location = "hodprofile.php";
																}
															
														}
											});
															
											});				  
					  	
			});
	</script>
<script type='text/javascript'>
function edit_profile() {
							//uid,uname,gender,sdob,uemail,umobile,profile_update
							document.getElementById("uname").disabled = false;
							document.getElementById("gender").disabled = false;
							document.getElementById("uemail").disabled = false;
							document.getElementById("umobile").disabled = false;
							document.getElementById("sdob").disabled = false;
						}
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
				<div class="wrap-col" align='center'>
					<h2 style="color:#2E80A5;">Faculty Profile Page!</h2>
					<table border="0">
								<tr>
					<td >UserId:</td><td><input type="text" value='<?=$get_rec['rollno']?>' name='uid' id='uid' style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;'   disabled /></td>
				</tr>
				<tr>
					<td >Name:</td><td><input type="text" value='<?=$get_rec['username']?>' id='uname' name='uname' style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;'  disabled /></td>
				</tr>
				<tr>
					<td >Gender:</td>
					<td>
						<input type="text" value='<?=$get_rec['gender']?>' name='gender' id='gender' style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;'  disabled />
					</td>
				</tr>
				<tr>
					<td >Date of Birth:</td>
					<td><input type="text" value='<?=$get_rec['dob']?>' name="sdob" id='sdob' class="required" id="datepicker" placeholder="Your Date of Birth" title="* Your Date of Birth" style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' onKeypress='return false;' disabled /></td>	
				</tr>
				
				<tr>
					<td >Email:</td><td><input type="text" value='<?=$get_rec['email']?>' id='uemail' name='uemail' style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;'  disabled /></td>
				</tr>
				<tr>
					<td >MobileNo:</td><td><input type="text" value='<?=$get_rec['mobile']?>' id='umobile' name='umobile' style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;'  disabled /></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="button" value='Edit Profile' id='profile_edit' class='btn' style='min-width:180px;height:34px;color:white;border-style: solid;border-width:1px;' onClick='edit_profile();'></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value='Update Profile' name='profile_update' id='profile_update' class='btn' style='min-width:180px;height:34px;color:white;border-style: solid;border-width:1px;' ></td>
				</tr>
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
	

<?php  // ******************** PROFILE UPDATE ***************************
//uid,uname,gender,uemail,umobile
if(isset($_POST['uid']) && isset($_POST['uname']) && isset($_POST['gender']) && isset($_POST['uemail']) && isset($_POST['umobile']) && isset($_POST['sdob']))
	{
		
		$uid 		= mysql_real_escape_string($_POST['uid']);
		$uname 		= mysql_real_escape_string($_POST['uname']);
		$gender		= mysql_real_escape_string($_POST['gender']);
		$uemail 	= mysql_real_escape_string($_POST['uemail']);
		$umobile 	= mysql_real_escape_string($_POST['umobile']);
		$dob 	= mysql_real_escape_string($_POST['sdob']);
				
		$user_name_pattern = '/^[a-zA-Z\s.]+$/';
		$mobile_pattern = '/[789]\d{9}$/';
		
		//------------------------------------------------- USER NAME CHECK --------------------------------------------
		if ( !preg_match($user_name_pattern, $uname) )
			{
				echo "<script language='javascript'>alert('Invalid Name..!');window.location = 'hodprofile.php';</script>";exit();
			}
		//------------------------------------------------- MOBILE NUMBER CHECK ----------------------------------------
		if ( !preg_match($mobile_pattern, $umobile) )
			{
				echo "<script language='javascript'>alert('Invalid mobile number..!');window.location = 'hodprofile.php';</script>";exit();
			}
		//------------------------------------------------- EMAIL ID CHECK ---------------------------------------------	
		if (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) 
			{
				echo "<script language='javascript'>alert('Invalid Email ID..!');window.location = 'hodprofile.php';</script>";exit();
			}		
				
		$rollno 		= $_SESSION['rollno'];
		$pwd 			= $_SESSION['pwd'];
	//id,picture,academicyear,regulation,sem,section,dob,username,branch,type,gender,email,mobile,rollno,pwd,address	
	$updation = mysql_query("UPDATE `logincheck` SET `username`='$uname',`gender`='$gender' ,`email`='$uemail' ,`mobile`='$umobile', dob='$dob' WHERE `rollno`='$rollno' AND pwd='$pwd'") or die(mysql_error());
	
	$check_updation = mysql_query("SELECT * from `logincheck` where `username`='$uname' AND `gender`='$gender' AND `email`='$uemail' AND `mobile`='$umobile' AND rollno='$rollno' AND pwd='$pwd'") or die(mysql_error());
				$count = mysql_num_rows($check_updation);
				if($count==1)
					{
						echo "<script language='javascript'>alert('Profile Updated..!');window.location = 'hodprofile.php';</script>";exit();
					}
	
	
	}

?>