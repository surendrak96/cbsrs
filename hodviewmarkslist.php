<?php include("dbconnect.php")	;
	if(isset($_SESSION['rollno']) && isset($_SESSION['username']) && isset($_SESSION['mobile']) && isset($_SESSION['type']))
		{
			if($_SESSION['type']=='hod' || $_SESSION['type']=='admin')
			{
				$userid 	= $_SESSION['rollno'];
				$mobile 	= $_SESSION['mobile'];
				$type 		= $_SESSION['type'];
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
				<script>
			//apo_name,apo_phone,apo_date,message,get_appointment     
			$(document).ready(function() {
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
				<div class="wrap-col" >
				
					<p style="color:#2E80A5;">View MarksList</p><br>
				<form action='hodviewmarkslist.php' method='POST' enctype="multipart/form-data">				
				<table border="0">
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
				</tr>
				<tr>
					<td></td>
					<td align="right"><input class="btn" type="Submit" value="View Marks" name="Show_Marks" style='min-width:180px;height:34px;color:white;border-style: solid;border-width:1px;'/>
					</td>
				</tr>
				</form>
			</table>
							
				</div>
			</div>
			
		</div>
	</div>
			<?php
				//branch,sem,Show_Marks
			if(isset($_POST['sem']) && isset($_POST['regu']) && isset($_POST['Show_Marks']))
				{
						$sem 	= mysql_real_escape_string($_POST['sem']);
						$regu 	= mysql_real_escape_string($_POST['regu']);
						$x=1;
						$get_distinct_htnos = mysql_query("SELECT distinct htno from `student_marks` where htno LIKE '%$regu%' AND `branch`='$branch' AND `sem`='$sem'") or die(mysql_error());
						$ht_count = mysql_num_rows($get_distinct_htnos);
					$c=1;	
					while($get_rec = mysql_fetch_array($get_distinct_htnos))
					{
						$htno = $get_rec['htno'];
						//echo $htno."-";
						if($c==1)
							{
								$success = mysql_query("SELECT * from `student_marks` where htno='$htno' AND `branch`='$branch' AND `sem`='$sem'") or die(mysql_error());
								$subject_count = mysql_num_rows($success);
								
								$subject = Array();
								echo "
							<center>	<table algin='center' style='background:#2D2D2D;font-size:10px;color:white;text-align:center;'>
								<tr>
									<td style='border:solid black 1px;padding:3px;' valign='middle'>Sl.No</td>
									<td style='border:solid black 1px;padding:3px;' valign='middle'>H.Ticket No</td>
								";
								$i=0;
								while($get_rec = mysql_fetch_array($success))
									{
										array_push($subject,$get_rec['subject_name']);
										echo "<td style='width:100px;border:solid black 1px;padding:3px;' colspan=2 valign='middle'>".$subject[$i]."</td>";
										$i++;
										
										//<th>Name</th>   <th colspan="2">Telephone</th>
									}
								echo "
									<td style='border:solid black 1px;padding:3px;' valign='middle'>Total</td>
									<td style='border:solid black 1px;padding:3px;' valign='middle'>Percentage</td>
								</tr>
								";
							}
						$success = mysql_query("SELECT * from `student_marks` where htno='$htno' AND `branch`='$branch' AND `sem`='$sem'") or die(mysql_error());
						$htnos_count = mysql_num_rows($success);
						
						if($htnos_count==$subject_count)
							{
								$get_rec = mysql_fetch_array($success);
							
									//id,updatedon,htno,stud_name,branch,sem,subject_name,internal,external,total,avg,status/
									$internal 	= 0;
									$external 	= 0;
									$total 		= 0;
									$avg 		= 0;

									echo "
										<tr style='background:white;color:black;text-align:center;font-size:11px;'>
											<td style='border:solid black 1px;padding:3px;' valign='middle'>$c</td> 
											<td style='border:solid black 1px;padding:3px;' valign='middle'>".$get_rec['htno']."</td>";
										
										$get_marks = mysql_query("SELECT * from `student_marks` where htno='$htno' AND `branch`='$branch' AND `sem`='$sem'") or die(mysql_error());
										$count = mysql_num_rows($get_marks);	
										$c=1;
										while($get_subject_marks = mysql_fetch_array($get_marks))
											{											
												echo "<td style='border:solid black 1px;padding:3px;' valign='middle'><p style='font-size:10px;'>Internal</p>".$get_subject_marks['internal']."</td>
												<td style='border:solid black 1px;padding:3px;' valign='middle'><p style='font-size:10px;'>External</p>".$get_subject_marks['external']."</td>";
												if($c==$count)
													{
														echo "	<td style='border:solid black 1px;padding:3px;' valign='middle'>".$get_subject_marks['total']."</td>
														<td style='border:solid black 1px;padding:3px;' valign='middle'>".$get_subject_marks['avg']."</td>
														</tr>";
													}
												$c++;	
											}
										
									/*		
										//SELECT sum(internal+external) as total FROM `student_marks` where htno='13P31A0501' and sem='4-1'
										//SELECT sum(avg)/4 as percentage FROM `student_marks` where htno='13P31A0501' and sem='4-1'	
									*/
							}
					$c++;		
					}
						echo "</table>";
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