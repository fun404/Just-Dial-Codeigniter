<?php 

function  database($db)
{
	$GLOBALS['DB'] =$db;
	return  mysqli_connect("localhost","root","","$db");
}

function connect()
{
	return  mysqli_connect("localhost","root","","search_nearby");
}

function insert_catagories_details($values)
{
	$mycon = connect();
	$add_details="INSERT INTO `catagory_details` (`cata_id`, `name`, `address`, `area`, `city`, `contact` ,`img`) VALUES ('$values[0]','$values[1]','$values[2]','$values[3]','$values[4]','$values[5]','$values[6]')";
	mysqli_query($mycon,$add_details);
	// $insert_IntoPics="INSERT into `pics` (`uid`) values ('$values[2]')";
	//   mysqli_query($mycon,$insert_IntoPics);
	return $add_details;

}

function insert_intotable($tableName,$values)
{
	$mycon = connect();
	
	$add_details="INSERT INTO `".$tableName."` VALUES ('',";
	for ($i=0; $i < count($values); $i++) 
	{ 
		$add_details .= "'$values[$i]',";
	}
	$add_details = substr_replace($add_details, "", -1);
	$add_details .= ")";
	mysqli_query($mycon,$add_details)or die("failed to insert".mysqli_error($mycon));;
	return $add_details;
}
function insert_column_value($tableName,$column,$values)
{
	$mycon = connect();
	
	$add_details="INSERT INTO `".$tableName."` (";
	for ($i=0; $i < count($values); $i++) 
	{ 
		$add_details .= "`$column[$i]`,";
	}
	$add_details = substr_replace($add_details, "", -1);
	$add_details .= ") VALUES (";
	for ($i=0; $i < count($values); $i++) 
	{ 
		$add_details .= "'$values[$i]',";
	}
	$add_details = substr_replace($add_details, "", -1);
	$add_details .= ")";
	mysqli_query($mycon,$add_details)or die("failed to insert".mysqli_error($mycon));;
	return $add_details;
}

function get_table($tblname)
{
	$mycon = connect();  
	$query="select * from `".$tblname."`";
	//echo "$query";
	$result = mysqli_query($mycon,$query);
	$column =mysqli_fetch_array($result);
	return $result;
}

function get($tblname,$condition,$value)
{
	$mycon = connect();  
	$query="select * from `".$tblname."` where `".$condition."` = '".$value."'";
	//echo "$query";
	$result = mysqli_query($mycon,$query)or die("failed to fetch object".mysqli_error("search_nearby"));
	$column =mysqli_fetch_array($result);
	return $column;
}

function getvalue($column,$tblname,$condition,$value)
{
	$mycon = connect();  
	$query="select `".$column."` from `".$tblname."` where `".$condition."` = '".$value."'";
	//echo "$query";
	$result = mysqli_query($mycon,$query)or die("failed to fetch object".mysqli_error("search_nearby"));
	$column =mysqli_fetch_array($result);
	return $query;
}

function login($email,$password)
{
	$mycon = connect();
	$query = "select * from `register` where `email` = '".$email."' && `user_password` = '".$password."'";
	$result = mysqli_query($mycon,$query);
	$rows = mysqli_fetch_array($result);
	return $rows;
}

function uploadCoverPic($img_url,$email)
{
	//$query = "update `pics` set `cover` = $img_url where `uid `= $email";
	$query = "UPDATE `pics` SET `cover`= '$img_url' WHERE `uid`= '$email'";
	$con = connect();
	$excutQuery = mysqli_query($con,$query) or die("not execute");
	if($excutQuery) 
	{
		mysqli_query(connect(),"INSERT INTO `gallary`(`uid`, `url`) VALUES ('$email','$img_url')");
		return "cover photo updated <br>";
	}
	else return "error updating cover <br>";
}

?>