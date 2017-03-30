<?php include("dbconnect.php")	;
	if(isset($_SESSION['rollno']) && isset($_SESSION['username']) && isset($_SESSION['mobile']) && isset($_SESSION['type']))
		{
			if($_SESSION['type']=='faculty' || $_SESSION['type']=='admin')
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
					<h2 style="color:#2E80A5;font-size:19px;">Subject Pass Percent</h2>
					<?php
				//branch,sem,Show_Marks
			//id,updatedon,fac_id,fac_name,dept,sub_dealing,avg,status
			
					$success = mysql_query("SELECT * from `fac_pass_perc` where fac_id='$userid'") or die(mysql_error());
					$subject_count = mysql_num_rows($success);
					if($subject_count>0)			
						{
							
							echo "
							<center>	
							<table algin='left'>
								<tr style='background:#2D2D2D;font-size:10px;color:white;text-align:center;'>
									<td style='border:solid black 1px;padding:3px;' valign='middle'>Branch</td>
									<td style='border:solid black 1px;padding:3px;' valign='middle'>Subject Name</td>
									<td style='width:100px;border:solid black 1px;padding:3px;' colspan=2 valign='middle'>Percentage</td>
								</tr>
								";
							while($get_rec = mysql_fetch_array($success))
									{
									echo "<tr>
											<td style='border:solid black 1px;padding:3px;' valign='middle'>".$get_rec['dept']."</td>
											<td style='border:solid black 1px;padding:3px;' valign='middle'>".$get_rec['sub_dealing']."</td>
											<td style='width:100px;border:solid black 1px;padding:3px;' colspan=2 valign='middle'>".$get_rec['avg']."</td>
										</tr>";
									}
							echo "</table>";
						}
					else
						{
							echo "<center>
								<table border='0' rules='all' style='border:solid black 1px' align='center'>
									<tr>
										<td style='border:solid black 1px'>No Records Found..!</td>
									</tr>
								</table></center>
									
							";
						}
				?>	
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