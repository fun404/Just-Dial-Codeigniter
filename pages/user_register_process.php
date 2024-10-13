<?php 
session_start();
include('process.php');
	if (isset($_POST['name'],$_POST['contact'],$_POST['email'],$_POST['pas'],$_POST['con-pas'])) 
	{
		if (connect()) 
		{
			$con = connect();
			$tbl_users = "CREATE TABLE IF NOT EXISTS user_register (
	              id INT(11) NOT NULL AUTO_INCREMENT primary key,
				  username VARCHAR(16) NOT NULL,
				  email VARCHAR(255) NOT NULL,
				  password VARCHAR(255) NOT NULL,
				  contact VARCHAR(255) NOT NULL
				  )";
			$create_table = mysqli_query($con,$tbl_users);

			$query = "insert into `user_register` values ('','".$_POST['name']."','".$_POST['email']."','".$_POST['pas']."','".$_POST['contact']."');";
			echo "$query";
			$register_admin = mysqli_query($con,$query);

			$con = connect();
			$query = "SELECT `id`, `username`, `email`, `password` FROM `user_register` WHERE `email` = '".$_POST['email']."' && `password` = '".$_POST['pas']."'";
			//echo "$query";
			$excute_query = mysqli_query($con,$query);
			if ($rows = mysqli_fetch_array($excute_query)) 
			{
				$_SESSION["userID"] = $rows[0];
				$_SESSION["userName"] = $rows[1];
				$_SESSION["email"] = $rows[2];

				header('location:nearby.php');
			}
		}
		else echo "failed to connect with database in process.php";
	
	}
?>