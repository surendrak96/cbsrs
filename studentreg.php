<!DOCTYPE html>
<html lang="en"> 
<head>
<title>CBRS</title>
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
				
				// Your Code goes here
				$("#sregister").click(function(){
											//var x = document.getElementById("demo");   // Get the element with id="demo"
											//x.style.color = "red";
							//saca,sregulation,sbranch,ssemister,ssection,sgender,sregno,sname,datepicker,smobile,semail,spwd 
											var saca 		= document.getElementById("saca").value;
											var sregulation = document.getElementById("sregulation").value;
											var sbranch 	= document.getElementById("sbranch").value;
											var ssemister 	= document.getElementById("ssemister").value;
											var ssection 	= document.getElementById("ssection").value;
											var sgender 	= document.getElementById("sgender").value;
											var sregno 		= document.getElementById("sregno").value;
											var sname 		= document.getElementById("sname").value;
											var datepicker 	= document.getElementById("datepicker").value;
											var smobile 	= document.getElementById("smobile").value;
											var semail 		= document.getElementById("semail").value;
											var spwd 		= document.getElementById("spwd").value;
											//alert("Okay");
				user_name_pattern = /^[a-zA-Z\s.]+$/; //username with spaces and without numbers

				email_pattern = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
				mobile_pattern = /[789]\d{9}$/;  // Mobile Number
				
				if((saca<1))
					{
						alert("Incorrect Academic Year...!");exit();
					}
				if((sregulation<1))
					{
						alert("Incorrect Regulation...!");exit();
					}
				if((sbranch<1))
					{
						alert("Incorrect Branch...!");exit();
					}	
				if((ssemister<1))
					{
						alert("Incorrect Semester...!");exit();
					}
				if((ssection<1))
					{
						alert("Incorrect Section...!");exit();
					}
				if((sgender<1))
					{
						alert("Incorrect Gender...!");exit();
					}
					
				if(!isNaN(sname) || (sname.length<3) || sname=="")
					{
						alert("Incorrect User Name...!");exit();
					}
				if(!user_name_pattern.test(sname)) 
					{
						alert("Incorrect User Name...!");exit();
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
				//---------------ROLL NUMBER VERIFICATION---------------------------------99P3990599 (12-15)+P3+
				var str = sregno; //isNaN(mobile)
				//alert(str.charAt(2)+"\t"+str.charAt(3));exit();
				if(str.length==10)
					{
						//alert("1");//12P3120512
						if(!isNaN(str.charAt(0)) && !isNaN(str.charAt(1)) && (str.charAt(2)=="P" || str.charAt(2)=="p") && str.charAt(3)=="3" && !isNaN(str.charAt(4)) && isNaN(str.charAt(5)) && !isNaN(str.charAt(6)) && str.charAt(6)=="0" && !isNaN(str.charAt(7)) && (!isNaN(str.charAt(8)) || isNaN(str.charAt(8)) && !isNaN(str.charAt(9)) || isNaN(str.charAt(9))))
							{
								//alert("2");//12P3120512
							if(str.charAt(0)=="1" && (str.charAt(1)=="3" || str.charAt(1)=="4" || str.charAt(1)=="5" || str.charAt(1)=="6"))
									{
										//alert("Coorect Roll Number..!");
										Rollnumber	= $('#Rollnumber').val();
									}
								else 
									{
										alert("Invalid Roll Number..!");exit();
									}	
							}
						else 
							{
								alert("Invalid Roll Number..!");exit();
							}	
					}
				else
					{
						alert("Invalid Roll Number..!");exit();
					}
				//----------------- NEW END -------------------------------------- 
				//saca,sregulation,sbranch,ssemister,ssection,sgender,sregno,sname,datepicker,smobile,semail,spwd 
				$.ajax({
					url:'user_reg.php',
					type:'post',
					datatype:'JSON',
					data : {saca:saca,sregulation:sregulation,branch:sbranch,ssemister:ssemister,ssection:ssection,gender:sgender,Rollnumber:sregno,name:sname,sdob:datepicker,mobile:smobile,email:semail,pword:spwd,type:"student"},
					success: function(result) 
									{
										//alert(result);
										pass = $.parseJSON(result);
										if(pass.status==1)
											{
												alert("Login Creation Success..!");
												window.location = "index.php";
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
												alert("Rollno already existed..!");exit();
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
				<div class="wrap-col" align='center'>
						<h2 style="text-align:center";><b style="color:#2E80A5">New Student Registration</b></h2><br>
				
                                                    <table >
														<tr>
														<td> <p align='left' style='font-size:13px;'>Academic Year:</p></td>
														<td>
                                                                 <SELECT style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="saca" id='saca' title="* Regulation">
																	<option value='0'>-- Select Academic Year --</option>
																	<option value='1317'>2013-17</option>
																	<option value='1418'>2014-18</option>
																	<option value='1519'>2015-19</option>
																	<option value='1620'>2016-20</option>
																</select>
														</td>
														</tr>
                                                        <tr>
														<td><p align='left' style='font-size:13px;'>Regulation:</p></td>
														<td>
                                                                 <SELECT style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="sregulation" id='sregulation' title="* Regulation">
																	<option value='0'>-- Select Regulation --</option>
																	<option value='R7'>R-07</option>
																	<option value='R10'>R-10</option>
																	<option value='R13'>R-13</option>
																</select>
                                                        </td>
														</tr>
														<tr>
														<td><p align='left' style='font-size:13px;'>Branch:</p></td>
														<td>
                                                                 <SELECT style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="sbranch" id='sbranch' title="* Brnach">
																	<option value='0'>-- Select Branch --</option>
																	<option value='CSE'>CSE</option>
																	<option value='IT'>IT</option>
																	<option value='EEE'>EEE</option>
																	<option value='ECE'>ECE</option>
																</select>
                                                        </td>
														</tr>
														<tr>
														<td><p align='left' style='font-size:13px;'>Semester:</p></td>
														<td>
                                                                 <SELECT style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="ssemister" id='ssemister' title="* Semister">
																	<option value='0'>-- Select Semister --</option>
																	<option value='1 Year 1 Semester'>1 Year 1 Semister</option>
																	<option value='1 Year 2 Semister'>1 Year 2 Semister</option>
																	<option value='2 Year 1 Semister'>2 Year 1 Semister</option>
																	<option value='2 Year 2 Semister'>2 Year 2 Semister</option>
																	<option value='3 Year 1 Semister'>3 Year 1 Semister</option>
																	<option value='3 Year 2 Semister'>3 Year 2 Semister</option>
																	<option value='4 Year 1 Semister'>4 Year 1 Semister</option>
																	<option value='4 Year 2 Semister'>4 Year 2 Semister</option>
																</select>
                                                        </td>
														</tr>
														<tr>
														<td><p align='left' style='font-size:13px;'>Section:</p></td>
														<td>
                                                                 <SELECT style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="ssection" id='ssection' title="* Section">
																	<option value='0'>-- Select Section --</option>
																	<option value='A'>Section A</option>
																	<option value='B'>Section B</option>
																	<option value='C'>Section C</option>
																	<option value='D'>Section D</option>
																</select>
                                                        </td>
														</tr>
														<tr>
														<td><p align='left' style='font-size:13px;'>Gender:</p></td>
														<td>
                                                                 <SELECT style='min-width:180px;height:34px;color:grey;border-style: solid;border-width:1px;' name="sgender" id='sgender' title="* Gende">
																	<option value='0'>-- Select Gender --</option>
																	<option value='Male'>Male</option>
																	<option value='Female'>Female</option>
																</select>
                                                        </td>
														</tr>
														<tr>
														<td><p align='left' style='font-size:13px;'>User ID:</p></td>
														<td>
                                                                <input type="text" name="sregno" class="required" id="sregno" placeholder="Registration Number" title="* Registration Number" style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;' />
                                                        </td></tr>
														<tr>
														<td><p align='left' style='font-size:13px;'>User Name:</p></td>
														<td>
                                                                <input type="text" name="sname" class="required" id="sname" placeholder="Your Name" title="* Your Name" style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;'/>
                                                        </td>
														</tr>
														<tr>
														<td><p align='left' style='font-size:13px;'>Date of birth:</p></td>
														<td>
                                                                <input type="text" name="sdob" class="required" id="datepicker" placeholder="Your Date of Birth" title="* Your Date of Birth" style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;'/>
                                                        </td></tr><tr>
														<td><p align='left' style='font-size:13px;'>Mobile No:</p></td>
														<td>
                                                                
                                                                <input type="text" name="smobile" class="required" id="smobile" placeholder="Your Mobile Number" title="* Your Mobile" style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;'/>
                                                        </td></tr>
														<tr>
														<td><p align='left' style='font-size:13px;'>Email ID:</p></td>
														<td>
                                                                <input type="text" name="semail" class="required" id="semail" placeholder="Your email-ID" title="* Your email" style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;'/>
														</td>
														</tr>
														<tr>
														<td><p align='left' style='font-size:13px;'>Password:</p></td>
														<td>
														<input type="password" name="spwd" class="required" id="spwd" placeholder="Choose Your Password" title="* Your pwd" style='min-width:178px;height:34px;color:grey;border-style: solid;border-width:1px;'/>
                                                        </td></tr>
														<tr>
														<td></td>
														<td>
                                                                
                                                           <input type="button" id='sregister' value="Register" name='sregister' class="btn" align='left' style='min-width:178px;height:34px;color:white;border-style: solid;border-width:1px;'>	
                                                        </td>
														</tr>
														<tr>
														<td></td>
														<td><input type="reset" value="Reset" name='sreset' class="btn" align='right' style='min-width:178px;height:34px;color:white;border-style: solid;border-width:1px;'>    
                                                        </td>
														</tr>
														</table>
														
															<p id="apo-message-sent"></p>
                                                            <div class="error-container"></div>                            
                                                    	
				</div>
			</div>
		</div>
	</div>
</section>
<!--------------Footer--------------->
<footer style='width:100%'>
	<div class="wrap-footer">
		<div class="copyright">
			<p>Copyright © 2017  CLOUD BASED STUDENT RANKING SYSTEM </p>
		</div>
	</div>
</footer>

</body></html>