<?php include("dbconnect.php")	;
	if(isset($_SESSION['rollno']) && isset($_SESSION['username']) && isset($_SESSION['mobile']) && isset($_SESSION['type']))
		{
			if($_SESSION['type']=='faculty' || $_SESSION['type']=='admin')
			{
				$userid 	= $_SESSION['rollno'];
				$mobile 	= $_SESSION['mobile'];
		
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
																	window.location = "facultyprofile.php";
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

