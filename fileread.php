<?php include("dbconnect.php")	;?>
<?php
	
	if( isset($_POST['submit']) ){
		$csvname = $_FILES['csv']['name'];
		$csvtype = $_FILES['csv']['type'];
		$csvtemp = $_FILES['csv']['tmp_name'];
		
		if( $csvtype == "application/vnd.ms-excel" )
			{
				
				$fileopen = fopen($csvtemp, 'r');
				$i=0;
				while( !feof($fileopen) )
					{
						$record = fgetcsv($fileopen);
						
						$htno 		= $record[0];
						$branch 	= $record[1];
						$stud_name 	= $record[2];
								
						$jan 		= $record[3];
						$feb 		= $record[4];
						$mar 		= $record[5];
						$apr 		= $record[6];
						$may		= $record[7];
						$jun 		= $record[8];
						$jul 		= $record[9];
						$aug 		= $record[10];
						$sep 		= $record[11];
						$oct 		= $record[12];
						$nov 		= $record[13];
						$dec 		= $record[14];

						$perc 		= $record[15];
						
						$i++;
					}
						
						
			fclose($fileopen);
			}
		else
			{
				echo "Please provide .csv extention file only!";	
			}
		}			
			
			
		
	
	

?>

<form action="fileread.php" method="post" enctype="multipart/form-data">
	<input type="file" name="csv" />
    <input type="submit" name="submit" value="Upload" />
</form>