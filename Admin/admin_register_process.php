<?php 
include('../pages/process.php');
	if (isset($_POST['name'],$_POST['contact'],$_POST['email'],$_POST['pas'],$_POST['con-pas'])) 
	{
		if (connect()) 
		{
			$con = connect();
			$tbl_users = "CREATE TABLE IF NOT EXISTS admin_register (
	              id INT(11) NOT NULL AUTO_INCREMENT primary key,
				  username VARCHAR(16) NOT NULL,
				  email VARCHAR(255) NOT NULL,
				  password VARCHAR(255) NOT NULL
				  )";
			$create_table = mysqli_query($con,$tbl_users);

			$query = "insert into `admin_register` values ('','".$_POST['name']."','".$_POST['email']."','".$_POST['pas']."','".$_POST['contact']."');";
			echo "$query";
			$register_admin = mysqli_query($con,$query);

			header('location:index.php');
		}
		else echo "failed to connect with database in process.php";
	
	}
?>