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
				$(function() {
								$( "#datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
							  });
				// Your Code goes here
				$("#sregister").click(function(){
											//var x = document.getElementById("demo");   // Get the element with id="demo"
											//x.style.color = "red";
											//sbranch,sgender,fid,sname,smobile,semail,spwd1,spwd2 
											var sbranch = document.getElementById("sbranch").value;
											var sgender = document.getElementById("sgender").value;
											var fid 	= document.getElementById("fid").value;
											var sname 	= document.getElementById("sname").value;
											var dob 	= document.getElementById("datepicker").value;
											var smobile = document.getElementById("smobile").value;
											var semail 	= document.getElementById("semail").value;
											var spwd 	= document.getElementById("spwd").value;
											var utype 	= document.getElementById("utype").value;
											//alert(sbranch);
											//alert(sgender);
											//alert(sregno);
											//alert(sname);
											//alert(smobile);
											//alert(semail);
											//alert(spwd1);
											//alert(spwd2);
				
				user_name_pattern = /^[a-zA-Z\s.]+$/; //username with spaces and without numbers

				email_pattern = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
				mobile_pattern = /[789]\d{9}$/;  // Mobile Number
				
				
				
				if(!isNaN(sname) || (sname.length<3) || sname=="")
					{
						alert("Incorrect User Name...!");exit();
					}
				if(!user_name_pattern.test(sname)) 
					{
						alert("Incorrect User Name...!");exit();
					}
				if(fid=="" || fid.length==0)
					{
						alert("Incorrect Faculty ID...!");exit();
					}	
				if(!email_pattern.test(semail)) 
					{
						alert("Incorrect Email ID...!");exit();
					}		
				if(!mobile_pattern.test(smobile)) 
					{
						alert("Incorrect Mobile Number...!");exit();
					}
				if(isNaN(smobile) || (smobile.length!=10))
					{
						alert("Invalid Mobile Number..!");exit();
					}
				//----------------- NEW END -------------------------------------- 
				$.ajax({
					url:'user_reg.php',
					type:'post',
					datatype:'JSON',
					data : {dob:dob,fname:sname,fgender:sgender,femail:semail,fmobile:smobile,fRollnumber:fid,fpword:spwd,fbranch:sbranch,ftype:utype},
					success: function(result) 
									{
										//alert(result);
										pass = $.parseJSON(result);
										if(pass.status==1)
											{
												alert("Login Creation Success..!");
												window.location = "adminregistrations.php";
											}
										if(pass.status==4)
											{
												alert("Mobile number already existed..!");exit();
											}	
										if(pass.status==5)
											{
												alert("e-mail ID already existed..!");exit();
											}
										if(pass.status==6)
											{
												alert("Faculty ID already existed..!");exit();
											}
										if(pass.status==0)
											{
												alert("Login Creation Failed..!");exit();
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
				<li><a href="adminhomepage.php">Home</a></li>
				<li><a href="adminregistrations.php">Registrations</a></li>
				<li><a href="adminviewusers.php">View Users</a></li>
				<li><a href="adminapprovestudents.php">Approve Students</a></li>
				<li><a href="adminuploaddata.php">Upload Data</a></li>
				<li><a href="adminchangepassword.php">Change Password</a></li>
				<li><a href="index.php">Logout</a></li>
				
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
<section id="content" align='center'>
	<div class="wrap-content cbsrs">
		<div class="row block01" >
			<div class="col-full" >
				<div class="wrap-col" align='center'>
				<h2><b style='color:#2E80A5;'>New User Registration</b></h2><br>
               
				<form>
                                        <table  width='device-width'><tr>
														<td style='font-size:13px;'>User Type:</td>
														<td>
                                                                 <SELECT style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="sbranch" id='utype' title="* User Type">
																	<option value='0'>-- Select User Type --</option>
																	<option value='faculty'>Faculty</option>
																	<option value='hod'>HOD</option>
																	<option value='principal'>Principal</option>
																</select></td>
															</tr>	
                                                           
															<tr>
														<td>Branch:</td>
														<td>
                                                               
                                                                 <SELECT style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="sbranch" id='sbranch' title="* Branch">
																	<option value='0'>-- Select Branch --</option>
																	<option value='CSE'>CSE</option>
																	<option value='IT'>IT</option>
																	<option value='EEE'>EEE</option>
																	<option value='ECE'>ECE</option>
																	<option value=''>No Branch</option>
																</select>
                                                            </p>
															<tr>
														<td>Gender:</td>
														<td>
                                                               
                                                                 <SELECT style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;'' name="sgender" id='sgender' title="* Gender">
																	<option value='0'>-- Select Gender --</option>
																	<option value='Male'>Male</option>
																	<option value='Female'>Female</option>
																</select>
                                                            </p>
														<tr>
														<td>User ID:</td>
														<td>
                                                               
                                                                <input type="text" name="fid" class="required" id="fid" title="*User  ID" style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;' />
                                                            </p>
                                                        <tr>
														<td>User Name:</td>
														<td>    
                                                                <input type="text" name="sname" class="required" id="sname" title="* User Name" style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;'/>
                                                        <tr>
														<td>Date of birth:</td>
														<td>
                                                                <input type="text" name="sdob" class="required" id="datepicker"  title="* Faculty Date of Birth" style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;'/>
                                                        <tr>
														<td>Mobile No:</td>
														<td>
                                                                <input type="text" name="smobile" class="required" id="smobile"  title="* Faculty Mobile" style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;'/>
                                                        <tr>
														<td>Email ID:</td>
														<td>
                                                                <input type="text" name="semail" class="required" id="semail"  title="* Faculty email" style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;'/>
                                                        <tr>
														<td>Password:</td>
														<td>
                                                                <input type="password" name="spwd" class="required" id="spwd"  title="* Faculty pwd" style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;'/>
                                                         <tr>
														<td></td>
														<td>														
                                                                <input type="button" id='sregister' value="Register" name='sregister' class="btn" style='min-width:180px;height:34px;color:white;border-style: solid;border-width:1px;' />
														<tr>
														<td></td>
														<td>														
																<input type="reset" value="Reset" name='sreset' class="btn" style='min-width:180px;height:34px;color:white;border-style: solid;border-width:1px;' />
                                                        </td></tr>
</table>														
                                                    </form>
					
				</div>
			</div>
		</div>
	</div>
</section><br><br><br><br><br>
<!--------------Footer--------------->
<footer>
	<div class="wrap-footer">
		<div class="copyright">
			<p>Copyright © 2017  CLOUD BASED STUDENT RANKING SYSTEM </p>
		</div>
	</div>
</footer>

</body></html>