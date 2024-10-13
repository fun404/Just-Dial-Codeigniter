<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/add_catagory_details.css">
</head>
<body  class="overlay">
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,800,700,900,300,100' rel='stylesheet' type='text/css'>
<div>
  <div class="wrap">
   <h1>Add Catagories Detailes</h1>
   <form method="post" enctype="multipart/form-data">
    <input list="catagory" name="catagory" type="text" placeholder="Select Catagory" required>
    <datalist id="catagory" >
      <option>
      <?php 
        $con = mysqli_connect('localhost','root','','search_nearby');
        $query = "select * from `product_cata` ";
        $excuteQuery= mysqli_query($con,$query);
        while ($catogories = mysqli_fetch_array($excuteQuery)) 
        {
          ?>
            <option>
              <?php echo $catogories[1]; ?>
            </option>

          <?php
        }
      ?>  
    </option>
    </datalist>
    <input type="text" name="cata_name" placeholder="Name" required>
    <input type="text" name="address" placeholder="Address" required>
    <input type="text" name="area" placeholder="Area" required>
    <input type="text" name="city" placeholder="city" required>
    <input type="text" name="contact" placeholder="Contact" required>
    <label> Select an image : 
    <input type="file" name="image" placeholder="Image" required>
    </label>
    <input type="submit" name="submit" value="ADD RECORD">
   </form>
  </div>
</div>
<?php 
  if (isset($_REQUEST['submit'])) 
  {
    require("process.php");
    $cata_name = $_REQUEST['cata_name'];
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $contact = $_REQUEST['contact'];
    $catagory = $_REQUEST['catagory'];
    $catagory = get('product_cata','cata_name',$catagory);
    $catagory = $catagory[0];
    $area = $_REQUEST['area'];
    $area_id = get("area","area",$area);
    if (!$area_id) 
    {
      $insert_area = "INSERT INTO `area`(`area`) VALUES ('".$area."')";
      $insert_area_query_excution = mysqli_query($con,$insert_area);
      $area_id = get("area","area",$area);
          echo "<br>".$area_id[0]."22222" ;

      $area_id = $area_id[0];
          echo "<br>".$area_id."33333<br><br>" ;

    }
    else
    {
      $area_id = $area_id[0];
    }
    $city_id = get("city","city",$city);
    if (!$city_id) 
    {
      $insert_city = "INSERT INTO `city`(`city`) VALUES ('".$city."')";
      $insert_area_query_excution = mysqli_query($con,$insert_city);
      $city_id = get("city","city",$city);
      $city_id = $city_id[0];
    }
    else
    {
      $city_id = $city_id[0];
    }
  // echo $area_id[0].$area_id[1]."<br>".$city_id[0].$city_id[1];

    $image_name = $_FILES["image"]["name"];
    // $image_size = $_FILES["image"]["size"];
    // $image_type = $_FILES["image"]["type"];
    $image_url = 'images/catagories images/'.$cata_name."_".$image_name;
    $target= 'C:\\xampp\\htdocs\\ALL PROJECTS\\Just Dial\\'.$image_url;
    $image_url = "../".$image_url;
    if(!empty($image_name))
    {
        move_uploaded_file($_FILES["image"]["tmp_name"],$target);
    }

    $values = array($catagory,$cata_name,$address,$area_id,$city_id,$contact,$image_url);
    // print_r($values);
    // echo insert_catagories_details($values);
    // $src= getvalue('img','catagory_details','address',$address);
    // echo "<img src='$src[0]' alt='not found' >";
  }  
?>
</body>
</html>