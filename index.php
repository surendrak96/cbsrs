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

<div class="featured">
	<div class="wrap-featured cbsrs">
		<div class="slider">
			<img src="images/slider.jpg" />
		</div>
	</div>
</div>
<!--------------Content--------------->
<section id="content">
	<div class="wrap-content cbsrs">
		<div class="row block01">
			<div class="col-full">
				<div class="wrap-col">
					<h2 style="color:#2E80A5;">Welcome to Cloud Based Ranking System!</h2>
				</div>
			</div>
		</div>
	</div>
</section>
<!--------------Footer--------------->
<footer>
	<div class="wrap-footer">
		<div class="copyright">
			<p>Copyright © 2017  CLOUD BASED STUDENT RANKING SYSTEM </p>
		</div>
	</div>
</footer>
</body>
</html>