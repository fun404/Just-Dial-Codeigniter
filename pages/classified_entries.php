<!DOCTYPE html>
<?php 
session_start();
require("process.php");

?>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/classified_entries.css">
</head>
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,800,700,900,300,100' rel='stylesheet' type='text/css'>
<body  class="overlay">
       
  <div class="wrap">
   <h1>Publish Classified Advertisement</h1>
   <form method="post" enctype="multipart/form-data">
    <select name="catagory" required >
              <?php 
                $table= get_table('classified_cata');
                while ($row = mysqli_fetch_array($table)) 
                {
                  echo "<option value='$row[0]'>  $row[1] </option>";
                }
              ?>
    </select>
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="msg" placeholder="Message" required>
    <input type="text" name="contact" placeholder="Contact" required>
    <input type="file" name="image" placeholder="Image">
    <input type="submit" name="submit" value="Publish">
   </form>
  </div>
  <?php
   // if(isset($_SESSION["userID"]))
   //      { 
   //        $vaar = $_SESSION["userID"];
   //            echo "<script> alert('$vaar');  </script>";
   //      }
   //      else echo "<script> alert('couldn\'t find the userID session');  </script>";
  ?>
<?php 
  if (isset($_REQUEST['submit'])) 
  {

    $catagory = $_REQUEST['catagory'];
    $title = $_REQUEST['title'];
    $msg = $_REQUEST['msg'];
    $contact = $_REQUEST['contact'];
    $userid = $_SESSION["userID"];
      // echo $area_id[0].$area_id[1]."<br>".$city_id[0].$city_id[1];
    $con = connect();
      $tbl = "CREATE TABLE IF NOT EXISTS classified_entries (
                id INT(11) NOT NULL AUTO_INCREMENT primary key,
          catagory VARCHAR(16) NOT NULL,
          title VARCHAR(255) NOT NULL,
          msg VARCHAR(255) NOT NULL,
          contact VARCHAR(255) ,
          img VARCHAR(255) 
          )";
      $create_table = mysqli_query($con,$tbl);

    $image_name = $_FILES["image"]["name"];

    if(!empty($image_name))
    {
        $image_url = 'images/classified_ad/'.$catagory."_".$image_name;
        $target= 'C:\\xampp\\htdocs\\ALL PROJECTS\\Just Dial\\'.$image_url;
        move_uploaded_file($_FILES["image"]["tmp_name"],$target);
        $values = array($catagory,$userid,$title,$msg,$contact,$image_url);
        echo insert_intotable('classified_entries',$values)."<br>";
    }

    else
    {
        $columns = array('catagory','title','msg','contact','userid');
        $values = array($catagory,$title,$msg,$contact,$userid);
        echo insert_column_value('classified_entries',$columns,$values)."<br>";
    }


      // $query = "insert into `classified_entries` values ('','".$_POST['name']."','".$_POST['email']."','".$_POST['pas']."');";
      // echo "$query";
      // $register_admin = mysqli_query($con,$query);
    print_r($values);
    $src= getvalue('img','classified_entries','catagory',$catagory);
    //mysqli_fetch_array($src);
    echo "<br><br><br>";
    echo $src;
    // echo print_r($src);
    echo "<br><br><br>";
    echo "<img src='../$src[0]' alt='not found' >";
  }  
?>
</body>
</html>