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
					<h2 style="color:#2E80A5;">Welcome to Faculty Home Page!</h2>
					
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