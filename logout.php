<?php
include("dbconnect.php")	;	
?>
<?php
session_destroy();
echo "<script language='javascript'>alert(' You have Loggout Succefully..!');window.location = 'index.php';</script>";
?>