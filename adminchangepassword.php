<?php include("dbconnect.php")	;
	if(isset($_SESSION['rollno']) && isset($_SESSION['username']) && isset($_SESSION['mobile']) && isset($_SESSION['type']))
		{
			if($_SESSION['type']=='admin')
			{
				$userid 	= $_SESSION['rollno'];
				$mobile 	= $_SESSION['mobile'];
				$branch 	= $_SESSION['branch'];
				$type 	= $_SESSION['type'];
		
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
	<script>
			$(document).ready(function() {
				// Your Code goes here
				$("#regme").click(function(){
											window.location = 'register.php';
											});
				$("#update").click(function(){
											var oldpwd 	= document.getElementById("oldpwd").value;
											var newpwd 	= document.getElementById("newpwd").value;login_type
											var login_type 	= document.getElementById("login_type").value;
											
											
										//alert(oldpwd+"-"+newpwd+"-"+login_type);

										$.ajax({
										url:'user_reg.php',
										type:'post',
										datatype:'JSON',
										data : {oldpwd:oldpwd,newpwd:newpwd,login_type:login_type},
										success: function(result) 
														{
															//alert(result);
															pass = $.parseJSON(result);
															if(pass.status==1)
																{
																	alert("Updation Success..!");
																	window.location = "index.php";
																}
															if(pass.status==0)
																{
																	alert("Update Failed..!");
																	window.location = "adminhomepage.php";
																}
														}
											});
															
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
				<div class="table-responsive" align='center'> <br>         
									  <table class="table">
											<tr>
												<td>Old Password</td>
												<td><input type='password' id='oldpwd' style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;'/></td>
											</tr>
											<tr>
												<td>New Password</td>
												<td><input type='password' id='newpwd' style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;'/>
												<input type='hidden' value='<?=$type?>' id='login_type'/>
												</td>
											</tr>
											<tr align='center'>
												<td ></td>
												<td><input type='submit' value='Change Password' id='update' class='btn' style='min-width:180px;height:34px;color:white;border-style: solid;border-width:1px;'/></td>
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
