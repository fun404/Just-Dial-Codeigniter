<?php 
include('process.php');
		$array1=	get_table('classified_entries');
		$a = count($array[0]);
		echo '$a is equal to'.$a;
		echo "<br>";
		
		while ($row = mysqli_fetch_array($array1)) 
		{
		echo "<option value='$row[0]' > $row[1] </option>";
		}


		