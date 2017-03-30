<?php include("dbconnect.php")	;
	if(isset($_SESSION['rollno']) && isset($_SESSION['username']) && isset($_SESSION['mobile']) && isset($_SESSION['type']))
		{
			if($_SESSION['type']=='principal' || $_SESSION['type']=='admin')
			{
				$userid 	= $_SESSION['rollno'];
				$username 	= $_SESSION['username'];
				$mobile 	= $_SESSION['mobile'];
				$utype 		= $_SESSION['type'];
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
				<li><a href="principalhomepage.php">Home</a></li>
				<li><a href="principalprofile.php">Profile</a></li>
				<li><a href="principalviewmarkslist.php">Department MarksList</a></li>
				<li><a href="principalviewtoprankers.php">Top Rankers</a></li>
				<li><a href="principalcompare.php">Compare</a></li>
				<li><a href="principalchangepassword.php">Change Password</a></li>
				<li><a href="index.php">Logout</a></li>
				
			</ul>
		</div>
		
		<div class="minimenu"><div>MENU</div>
			<select onchange="location=this.value">
				<option></option>
				<option value="principalhomepage.php">Home</option>
				<option value="principalprofile.php">Profile</option>
				<option value="principalviewmarkslist.php">Department MarksList</option>
				<option value="principalviewtoprankers.php">Top Rankers</option>
				<option value="principalcompare.php">Compare</option>
				<option value="principalchangepassword.php">Change Password</option>
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
					<h2 style="color:#2E80A5;">Welcome to Principal Home Page!</h2>
					
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