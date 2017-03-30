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
				$("#reset").click(function(){
											window.location = 'login.php';
											});
				$("#logmein").click(function(){
											//userid,pwd,logtype
											var userid 		= document.getElementById("userid").value;
											var pwd 		= document.getElementById("pwd").value;
											var logtype 	= document.getElementById("logtype").value;
											
											//alert(userid+"-"+pwd+"-"+logtype);
									
										$.ajax({
										url:'user_reg.php',
										type:'post',
										datatype:'JSON',
										data : {rollno:userid,pwd:pwd,types:logtype},
										success: function(result) 
														{
															//alert(result);
															
															pass = $.parseJSON(result);
															if(pass.status==1 && pass.type=='admin')
																{
																	alert("Login Success..!");
																	window.location = "adminhomepage.php";
																}
															if(pass.status==1 && pass.type=='faculty')
																{
																	alert("Login Success..!");
																	window.location = "facultyhomepage.php";
																}
															if(pass.status==1 && pass.type=='student')
																{
																	alert("Login Success..!");
																	window.location = "studenthomepage.php";
																}
															if(pass.status==1 && pass.type=='hod')
																{
																	alert("Login Success..!");
																	window.location = "hodhomepage.php";
																}
															if(pass.status==1 && pass.type=='principal')
																{
																	alert("Login Success..!");
																	window.location = "principalhomepage.php";
																}			
															if(pass.status==0)
																{
																	alert("Login Failed..!");exit();
																}
														}
											});
															
											});							
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
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="studentreg.php">Student Registration</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</div>
		
		<div class="minimenu"><div>MENU</div>
			<select onchange="location=this.value">
				<option></option>
				<option value="index.php">Home</option>
				<option value="login.php">Login</option>
				<option value="studentreg.php">Student Registration</option>
				<option value="contact.php">Contact</option>
			</select>
		</div>		
	</div>
</nav>
<!--------------Content--------------->
<section id="content">
	<div class="wrap-content cbsrs">
		<div class="row block01">
			<div class="col-full">
				<div class="wrap-col`" align='center'>
						<h2 style="text-align:center";><b style="color:#2E80A5">Login Page</b></h2><br>
						<table>
						<tr>
														<td><p align='left' style='font-size:13px;'>User ID:</p></td>
														<td>
                                                                <input type="text" name="userid" class="required" id="userid" title="* Please enter your User ID" style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;' />
                                                        </td>
														</tr>
														<tr>
														<td><p align='left' style='font-size:13px;'>Password:</p></td>
														<td>
                                                               <input type="text" name="pwd" class="required" id="pwd"  title="* Please enter your Password" style='min-width:177px;height:34px;color:grey;border-style: solid;border-width:1px;' />
                                                        </td></tr>
														<tr>
															<td><p align='center' style='font-size:14px;'>User Type:</p>
															</td>
															<td>
																 <SELECT style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;' name="logtype" id='logtype' title="* Please enter your message">
																	<option value='0'>-- Select Type --</option>
																	<option value='admin'>Admin</option>
																	<option value='student'>Student</option>
																	<option value='faculty'>Faculty</option>
																	<option value='hod'>HOD</option>
																	<option value='principal'>Principal</option>
																</select>
															</td>
														</tr>
														<tr>
															<td></td>
															<td>
															<input type="submit" value="Log me in" name='logmein' class="btn" id='logmein' style='min-width:178px;height:34px;color:white;'/>
															</td>
														</tr>
														<tr>
															<td></td>
															<td>
															<input type="reset" value="Cancel" id='reset' class="btn" style='min-width:178px;height:34px;color:white;'/>
															</td>
														</tr>
														</table>
                                                            <p id="apo-message-sent"></p>
                                                            <div class="error-container"></div>
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