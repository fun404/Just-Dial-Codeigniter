<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<!-- sb-admin-css-link -->

  <!-- Bootstrap Core CSS -->
  <!-- <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

  <!-- MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- /sb-admin-css-link -->

<!-- my css -->
  <link rel="stylesheet" type="text/css" href="../css/nearby.css">
  <link rel="stylesheet" type="text/css" href="../css/adminLogin.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap4.css">
<!-- / my css -->


<!-- font-awesome link -->
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<!-- /font-awesome link -->

      <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <!-- select2 cdn links -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#area').select2();
    });
  </script>






<!-- tab css and links -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 
<style>
.nav-tabs
 {
   border-color:#1A3E5E;
   width:100%;
 }

.nav-tabs > li a { 
    border: 1px solid #1A3E5E;
    background-color:#2F71AB; 
    color:#fff;
    }

.nav-tabs > li.active > a,
.nav-tabs > li.active > a:focus,
.nav-tabs > li.active > a:hover{
    background-color:#D6E6F3;
    color:#000;
    border: 1px solid #1A3E5E;
    border-bottom-color: transparent;
    }

.nav-tabs > li > a:hover{
  background-color: #D6E6F3 !important;
    border-radius: 5px;
    color:#000;

} 

.tab-pane {
    border:solid 1px #1A3E5E;
    border-top: 0; 
    width:100%;
    background-color:#D6E6F3;
    padding:30px;
    margin-left: 0;

}

.mg-5{
  margin: 1px;
}
</style>
</head>

<body>
  <h1 class="text-center bg-primary">CLASSIFIED ADVERTISMENTS</h1>
  <div class="container">
            <!-- <?php// include('header.php') ?> -->


      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">

        <?php 
        include('process.php')
        ?>
        <li  class="active"><a href="#hometab" role="tab" data-toggle="tab">All</a></li>
        <?php 
          $table= get_table('classified_cata');
          $row = mysqli_fetch_array($table);
          while ($row = mysqli_fetch_array($table)) 
          {
            echo "<li><a href='#$row[1]tab' role='tab' data-toggle='tab'>$row[1]</a></li>";
          }
        ?>
        <!--<li class="active"><a href="#javatab" role="tab" data-toggle="tab">Java</a></li>
         <li><a href="#csharptab" role="tab" data-toggle="tab">C#</a></li>
        <li><a href="#mysqltab" role="tab" data-toggle="tab">MySQL</a></li>
        <li><a href="#jquerytab" role="tab" data-toggle="tab">jQuery</a></li> -->
      </ul>
      </li>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="hometab">
             <h2 class="text-center bg-info text-white-50"><strong>All CLASSIFIED ADVERTISMENTS</strong></h2>

              <div class="row justify-content-center">
                  <?php 
                    // include('process.php');
                    $array= get_table('classified_entries');
                    while ($row = mysqli_fetch_array($array)) 
                      {
                  ?>
                              <?php 
                                if ($row[6] ==NULL ) 
                                {
                                  ?>
                                  <div class="col-sm-6 col-md-3 col-lg-2 border border-secondary mg-5 well well-sm text-justify">
                                    <h3><?= $row[3] ;?></h3>
                                    <p><?= $row[4] ;?></p>
                                  </div>
                                  <?php
                                }
                              ?>
                  <?php 
                      }
                  ?>
              </div>
              <div class="row justify-content-center text-justify">
                  <?php 
                    // include('process.php');
                    $array= get_table('classified_entries');
                    while ($row = mysqli_fetch_array($array)) 
                      {
                  ?>
                              <?php 
                                if (!$row[6] ==NULL ) 
                                {
                                  ?>
                                    <div class="col-sm-6 col-md-4 col-lg-2 border border-warning mg-5 well well-sm ">
                                    <h3><?= $row[3] ;?></h3>
                                    <p><?= $row[4] ;?></p>
                                    <img src="../<?= $row[6]  ;?>" class="img-fluid" height="200px" width="200px">
                                    </div>
                                  <?php
                                }
                              ?>
                  <?php 
                      }
                  ?>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-6 col-md-4 col-lg-2 bg-primary">kfg;jf;lkajfkj</div>
                <div class="col-sm-6 col-md-4 col-lg-2 bg-success">jfdlksjdlks</div>
                <div class="col-sm-6 col-md-4 col-lg-2 bg-primary">kfgl;kfjldk</div>
                <div class="col-sm-6 col-md-4 col-lg-2 bg-success">ldflsdjk</div>
                <div class="col-sm-6 col-md-4 col-lg-2 bg-primary">kfgl;kfjldk</div>
                <div class="col-sm-6 col-md-4 col-lg-2 bg-success">ldflsdjk</div>
              </div>
        </div>
        <?php 
          $table= get_table('classified_cata');
          while ($row = mysqli_fetch_array($table)) 
            {
              ?>
              <div class="tab-pane" id="<?=$row[1]?>tab">
                 <h2 class="text-center bg-info text-white-50"><strong>All CLASSIFIED ADVERTISMENTS</strong></h2>
                  <div class="row justify-content-around">
                      <?php
                        $con = connect();
                        $join = "SELECT a.`title`,a.`msg`,a.`contact`,a.`img`,b.`username`,c.`cata` from `classified_entries`a join `classified_cata`c on a.`catagory` = c.`id` join `user_register`b on a.`userid` = b.`id` where a.`catagory` = (SELECT `id` from `classified_cata` where `cata`= '".$row[1]."') ";
                        // echo "$join";
                        $dataObject =  mysqli_query($con,$join)or die("query isn't working");
                        while($row = mysqli_fetch_array($dataObject))
                        {
                          ?>
                            <div class="col-sm-6 col-md-3 col-lg-2 border border-secondary mg-5 well well-sm text-justify">
                              <h3><?= $row[0] ;?></h3>
                              <p><?= $row[1] ;?></p>
                              <p><?= $row[2] ;?></p>
                              <p><?= $row[3] ;?></p>
                              <p><?= $row[4] ;?></p>
                              <p><?= $row[5] ;?></p>
                            </div>
                          <?php
                        }
                        ?>
                    </div>
              </div>
              <?php
            }
              ?>

        <div class="tab-pane " id="javatab">The Java is an
        </div>
        <div class="tab-pane" id="csharptab">C# is also a programming language</div>
        <div class="tab-pane" id="mysqltab">MySQL is a databased mostly used for web applications.</div>
        <div class="tab-pane" id="jquerytab">jQuery content here</div>
      </div>

      <!-- tab code ends -->
  </div>



</body>
</html>