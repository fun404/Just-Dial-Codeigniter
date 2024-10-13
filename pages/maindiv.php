<?php 
// session_start();

$catagory_id = $_GET['val'];

$qry="";
if(isset($_SESSION["area"]))
{
  $val = $_SESSION["area"];
 // $qry = "SELECT * FROM `catagory_details` where `cata_id` = '$catagory_id' AND `area`= '$val' ";
      $qry = " SELECT a.`name`, a.`address`, b.`area`,c.`city`, a.`contact`,a.`img` FROM `catagory_details`a JOIN `area`b ON a.`area`= b.`id` JOIN `city`c ON a.`city`= c.`id`
      JOIN `product_cata`d ON a.`cata_id`= d.`cataid`
       WHERE a.`cata_id` ='".$catagory_id."' AND a.`area`= (SELECT `id` from `area` where `area`= '".$val."') GROUP BY a.`address`";
  
}

else 
{
  //$qry = "SELECT * FROM `catagory_details` where `cata_id` = '$catagory_id' GROUP BY `address`";
  // JOIN QUERY
    $qry = " SELECT a.`name`, a.`address`, b.`area`,c.`city`, a.`contact`,a.`img` FROM `catagory_details`a JOIN `area`b ON a.`area`= b.`id` JOIN `city`c ON a.`city`= c.`id`
    JOIN `product_cata`d ON a.`cata_id`= d.`cataid`
     WHERE a.`cata_id` ='".$catagory_id."' GROUP BY a.`address`";
}

 // echo "$qry";
$con = connect();

$columArray = mysqli_query($con,$qry)or die("query isn't working");

while($row_detail = mysqli_fetch_array($columArray)) 
{
    ?>

      <div class="row pt-3 table-bordered ">
        <div class="col-sm-5">
          <img src="<?php echo $row_detail[5]; ?>" class="img-fluid img-thumbnail" alt="New York">
        </div>
        <div class="col-sm-7 img-thumbnail">
          <p><strong><?php echo $row_detail[0]; ?></strong></p>
          <ul>
          <li><a href="JavaScript:Void(0);">+91 <?= $row_detail[4]; ?></a></li>
          <li><a href="JavaScript:Void(0);"><?php echo $row_detail[1]." , ".$row_detail[2]." , ".$row_detail[3]; ?></a></li>
          <li><a href="#" onclick="return false;">More...</a></li>
          </ul>
        </div>
     </div>

    <?php
}
?>




<!-- 
<div class="row jumbotron table-bordered ">
  <div class="col-sm-5">
    <img src="../images/hospital1.jpg" class="img-fluid img-thumbnail" alt="New York">
  </div>
  <div class="col-sm-7 img-caption">
    <p><strong>Dharansila Narayan Supers</strong></p>
    <ul>
    <li><a href="">+91 9999993333</a></li>
    <li><a href="">address</a></li>
    <li><a href="">speciality</a></li>
    <li><a href="">More...</a></li>
    </ul>
  </div>
</div>

<div class="row jumbotron table-bordered img-thumbnail">
  <div class="col-sm-5">
    <img src="../images/hospital1.jpg" class="img-fluid img-thumbnail" alt="New York">
  </div>
  <div class="col-sm-7 ">
    <p><strong>Dharansila Narayan Supers</strong></p>
    <ul>
    <li><a href="">+91 9999993333</a></li>
    <li><a href="">address</a></li>
    <li><a href="">speciality</a></li>
    <li><a href="">More...</a></li>
    </ul>
  </div>
</div>
 -->
