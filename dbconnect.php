<?php
	$user = "root";	$password = "";				
	$database = "cloud";	
	mysql_connect("localhost",$user,$password)  or  die("Unable to connect the server..!");	
	mysql_select_db($database) or die("Unable to Connect The Database...!");
session_start();
?>
<?php
function get_db_format($dob)
	{
		$explode = explode('/', $dob);
		
		$dd = $explode[0];
		$mm = $explode[1];
		$yy = $explode[2];
		
		return($yy."-".$mm."-".$dd); 
	}
?>
<?php
function dd_mm_yy($cdate)
	{
		$explode = explode('-', $cdate);
		
		$yy = $explode[0];
		$mm = $explode[1];
		$dd = $explode[2];
		
		return($dd."-".$mm."-".$yy); 
	}
?>
