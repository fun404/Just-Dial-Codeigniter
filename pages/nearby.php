
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>citysearch</title>

    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- links for search bar -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />



<!-- font-awesome link -->
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<!-- /font-awesome link -->

      <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<!-- my css -->
  <link rel="stylesheet" type="text/css" href="../css/nearby.css">
  <link rel="stylesheet" type="text/css" href="../css/loginModel.css">
<!-- / my css -->
    <!-- select2 cdn links -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#area').select2();
    });
  </script>
 </head>
<body>

<?php 
//session_start();
require_once("process.php");
?>
<script type="text/javascript"></script>
<!-- container -->
<div class="container">
  <div class="wrapper">
    <?php include('header.php') ?>
    <!-- side-list -->
  <div class="col-sm-3 bg-warning" >
    <ul class="list-unstyled">

      <!-- side-menu-php -->
      <?php 
      $con = mysqli_connect('localhost','root','','search_nearby');
      $query = "select * from `product_cata` ";
      $excuteQuery= mysqli_query($con,$query);
      while ($catogories = mysqli_fetch_array($excuteQuery)) 
      {
        ?>
          <li>
            <a href="nearby.php?val=<?= $catogories[0] ?>"><i class="fa fa-dashboard fa-fw"></i><?php echo $catogories[1]; ?></a>
          </li>

        <?php
      }

       ?>
      
      <li>
          <a href="index.html"><i class="fa fa-hospital-o fa-fw"></i> pub</a>
      </li>
     
    </ul>
    <!-- /.navbar-static-side -->
  </div>
  <!-- /side-lisr -->
  <div class="col-lg-9 col-sm-9 light-grey">


  <!---------------- searchbar ----------->
    <script type="text/javascript">
      $(document).ready(function(){

        $("#area").change(function(){
          var a = $("#area").val();
          $.post("session.php",{"ar":a});
        });
      });
    </script>
    <div class="row text-center form-group mt-1 mb-1">
        <select class="form-control"  name="area" id="area">
          <option> Select the area</option>
          <?php 
            $query2 = "select * from `area` limit 10";
            $insert = mysqli_query($con,$query2);
            while ($row = mysqli_fetch_array($insert)) 
            {
              echo "<option>".$row[1]."</option>";
            }
          ?>
          <option value="all"> All areas</option>
        </select>
    </div>



<!--      <div class="form-group">
      <div class="input-group">
       <span class="input-group-addon">Search</span>
       <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
      </div>
       <br />
       <div id="result"></div>
     </div>
        <script type="text/javascript">
          $(document).ready(function()
          {
            $('#search_text').keyup(function()
            {
              var txt = $(this).val();
              if(txt != '')
              {
                   $.ajax(
                   {
                     url:"fetch.php",
                     method:"POST",
                     data:{search:txt},
                     dataType: "text",
                     success:function(data)
                     {
                      $('#result').html(data);
                     }
                    });
              }
            });
          });

        </script>
 -->
  <!----------------/ searchbar ----------->

<?php 
    if (isset($_REQUEST['classified_ad'])) 
    {
      include("classified_ad.php");
    }


   
    elseif (isset($_GET['val'])) 
    {
      ?>

        <div class="wrapper">
          <div class="jumbotron jumbo-img">
            <h1>Make your journey easy</h1>
             <p>find the ideal place to visit</p>
          </div>
        </div>
      <?php
      include("maindiv.php");

    }
    else
    {
      ?>
        <div class="wrapper">
          <div class="jumbotron jumbo-img">
            <h1>Make your journey easy</h1>
             <p>find the ideal place to visit</p>
          </div>
        </div>
        <div class="maindiv">
          <div class="row text-center">
           <h3 class="page-header">Popular Services</h3>
              <div class="col-sm-3">
                <!-- <a href="nearby.php?val=55"> -->
                  <div class="thumbnail img-fluid">
                    <img src="../images/res.jpg" alt="New York" >
                    <p><strong>RESTAURANT</strong></p>
                    <p><a href="JavaScript:Void(0);">Order Online</a></p>
                    <p><a href="JavaScript:Void(0);">Book Table</a></p>
                    <p><a href="JavaScript:Void(0);">Trending </a></p>
                    <p><a href="JavaScript:Void(0);">More...</a></p>
                    </div>
                <!-- </a> -->
              </div>
              
              <div class="col-sm-3">
                <!-- <a href="nearby.php?val=5"> -->
                  <div class="thumbnail img-fluid">
                    <img src="../images/hospital1.jpg" class="img-fluid" alt="New York">
                    <p><strong>DOCTORS</strong></p>
                    <p><a href="JavaScript:Void(0);">Dentist</a></p>
                    <p><a href="JavaScript:Void(0);">Dermatologist</a></p>
                    <p><a href="JavaScript:Void(0);">ENT</a></p>
                    <p><a href="JavaScript:Void(0);">More...</a></p>
                  </div>
                <!-- </a> -->
              </div>
          </div>




          <div class="row  justify-content-center text-center">
            <h3 class="page-header">Whats Trending?</h3>
            <div class="justify-content-center">
              <div class="col-sm-4">
                <!-- <a href="nearby.php?val=63"> -->
                  <div class="thumbnail img-fluid">
                    <img src="../images/travel.jpg" alt="Paris">
                    <p><strong>TRAVEL</strong></p>
                    <p><a href="JavaScript:Void(0);">Bus</a></p>
                    <p><a href="JavaScript:Void(0);">Hotel</a></p>
                    <p><a href="JavaScript:Void(0);">More...</a></p>
                  </div>
                <!-- </a> -->
              </div>
              <div class="col-sm-4">
                <!-- <a href="nearby.php?val=2"> -->
                  <div class="thumbnail img-fluid">
                    <img src="../images/grocery.jpg" alt="New York" style="background: red;">
                    <p><strong>DAILY NEEDS</strong></p>
                    <p><a href="JavaScript:Void(0);">Grocery</a></p>
                    <p><a href="JavaScript:Void(0);">Chemist </a></p>
                    <p><a href="JavaScript:Void(0);">More...</a></p>
                  </div>
                <!-- </a> -->
              </div>
              <div class="col-sm-4">
                <!-- <a href="nearby.php?val=10"> -->
                  <div class="thumbnail img-fluid">
                    <img src="../images/event1.jpg" alt="San Francisco">
                    <p><strong>ENTERTAINTMENT</strong></p>
                    <p><a href="JavaScript:Void(0);">Movies</a></p>
                    <p><a href="JavaScript:Void(0);">Events</a></p>
                    <p><a href="JavaScript:Void(0);">More...</a></p>
                  </div>
                <!-- </a> -->
              </div>
            </div>
          </div>




          <div class="row  justify-content-center text-center">
            <h3 class="page-header">Business & Services</h3>
            <div class="justify-content-center">
              <div class="col-sm-6">
              <!-- <a href="nearby.php?val=5"> -->
                <div class="thumbnail img-fluid">
                  <img src="../images/personalcare.jpg" alt="New York">
                  <p><strong>PERSONAL CARE</strong></p>
                  <p><a href="JavaScript:Void(0);">Beauty Parlours</a></p>
                  <p><a href="JavaScript:Void(0);">Hair Salon</a></p>
                  <p><a href="JavaScript:Void(0);">More...</a></p>
                </div>
              <!-- </a> -->
              </div>
              <div class="col-sm-6">
              <!-- <a href="nearby.php?val=33"> -->
                <div class="thumbnail img-fluid">
                  <img src="../images/electoAppliances.jpg" alt="New York">
                  <p><strong>HOUSEHOLD GOODS</strong></p>
                  <p><a href="JavaScript:Void(0);">Electronic Appliances</a></p>
                  <p><a href="JavaScript:Void(0);">Kitchen Appliances </a></p>
                  <p><a href="JavaScript:Void(0);">More...</a></p>
                </div>
              <!-- </a> -->
              </div>
            </div>
          </div>
        </div>
      <?php
    }
    ?>
  </div>
    <!-- /page-container -->
</div>
<!-- /container -->

<?php 
  if (isset($_REQUEST['r'])) {
    echo "<script> alert('You are registered to this site /n Log In to your account'); </script>";

  }

  if (isset($_REQUEST['lf'])) {
    echo "<script> alert('Login Failed'); </script>";

  }

  // else
        // echo "<script> alert('else is working user not registered yet')  </script>";
?>

</body>
</html>