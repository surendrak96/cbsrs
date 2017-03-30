<?php include("dbconnect.php")	;
	if(isset($_SESSION['rollno']) && isset($_SESSION['username']) && isset($_SESSION['mobile']) && isset($_SESSION['type']))
		{
			if($_SESSION['type']=='student' || $_SESSION['type']=='admin')
			{
				$userid 	= $_SESSION['rollno'];
				$mobile 	= $_SESSION['mobile'];
				$branch 	= $_SESSION['branch'];
		
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
				<li><a href="studenthomepage.php">Home</a></li>
				<li><a href="studentprofile.php">Profile</a></li>
				<li><a href="studentattendance.php">attendance</a></li>
				<li><a href="studentmarkslist.php">MarksList</a></li>
				<li><a href="studenttoprankers.php">Top Rankers</a></li>
				<li><a href="studentlatestresult.php">Latest Results</a></li>
				<li><a href="studentchangepassword.php">Change Password</a></li>
				<li><a href="logout.php">Logout</a></li>
				
			</ul>
		</div>
		
		<div class="minimenu"><div>MENU</div>
			<select onchange="location=this.value">
				<option></option>
				<option value="studenthomepage.php">Home</option>
				<option value="studentprofile.php">Profile</option>
				<option value="studentattendance.php">attendance</option>
				<option value="studentmarkslist.php">MarkList</option>
				<option value="studenttoprankers.php">Top Rankers</option>
				<option value="studentlatestresult.php">Latest Results</option>
				<option value="studentchangepassword.php">Change Password</option>
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
				<div class="wrap-col">
					<h2 style="color:#2E80A5;">Latest Results</h2>
					<?php
					// id,updatedon,filepath,linkname,status
							$success = mysql_query("SELECT * from `results` order by updatedon desc") or die(mysql_error());
							$count = mysql_num_rows($success);
							$x=1;
							if($count>0)
								{
									while($get_rec = mysql_fetch_array($success))		
										{
											$link = $get_rec['linkname'];
											echo "
													<p align='center' style='font-size:12px;'>".$link."
														<a href='".$get_rec['filepath']."' style='padding:5px;background:gold;color:maroon;height:30px;font-size:14px;' download><br>Download</a>
													</p><br>
												";
										$x++;
										}
								}
							else
								{
									echo "
										<table border='0' rules='all' style='text-align:center;'>
											<tr>
												<td >No Results Found..!</td>
											</tr>
										</table>
									
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