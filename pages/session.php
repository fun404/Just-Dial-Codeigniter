<?php 
	session_start();
	$val= $_POST["ar"];
	if (isset($_POST['ar'])) {
		if($val != "all")
		{
			$_SESSION["area"]= $val;
			//echo "<script>alert('ksjhdfkjsh')</script>";
		}
		
	}
	// if(isset($val = "all"))
		// {
			// unset($_SESSION["area"]);
			//echo "<script>alert('ksjhdfkjsh')</script>";
		// }
?>