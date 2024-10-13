<?php 
session_start();
	$email = $_POST['email'];
	$password = $_POST['password'];
	include('process.php');
	$con = connect();
	$query = "SELECT `id`, `username`, `email`, `password` FROM `user_register` WHERE `email` = '$email' && `password` = '$password'";
	//echo "$query";
	$excute_query = mysqli_query($con,$query);
	if ($rows = mysqli_fetch_array($excute_query)) 
	{
	$_SESSION["userID"] = $rows[0];
	$_SESSION["userName"] = $rows[1];
	$_SESSION["email"] = $rows[2];
	header('location:nearby.php');
	}
	else
	header('location:nearby.php?lf');
	if (isset($_REQUEST['lo'])) 
	{
		session_destroy();
		header('location:nearby.php');
	}
?>