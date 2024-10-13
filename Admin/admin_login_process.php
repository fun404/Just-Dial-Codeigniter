<?php 
	$name = $_POST['uname'];
	$password = $_POST['password'];
	include('../pages/process.php');
	$con = connect();
	$query = "SELECT `id`, `username`, `email`, `password` FROM `admin_register` WHERE `email` = '$name' && `password` = '$password'";
	//echo "$query";
	$excute_query = mysqli_query($con,$query);
	if ($rows = mysqli_fetch_array($excute_query)) 
	{
	header('location:add_catagory_details.php');
	}
	else
	header('location:index.php');
	?>