<!DOCTYPE html>
<html>
<head>
	<title></title>

	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- bootstrap4 link -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap4.css">


	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="../css/busroute.css">


	<!-- jquerycdn link -->
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  	<!-- select2 cdn links -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#from').select2();
		    $('#to').select2();
		});
	</script>

</head>
<body>

<?php 
include('dbconnection.php');
?>



<div class="shade">
		<div class="blackboard">
				<div class="form">
					<form method="post" action="">
						<p class="form-inline">
								<label>From:
									<select name="from" id="from">
										<option> Select your Initial location</option>
										<?php 
											$query = "select distinct(`stop`) from `stops` `stop` ";
											$insert = mysqli_query($con,$query);
											while ($row = mysqli_fetch_array($insert)) 
											{
												echo "<option>$row[0]</option>";
											}
										?>
									</select>
									<div class="div"></div>
								</label>


						</p>
						<p class="form-inline">
								<label>To: 
									<select name="to" id="to">
										<option>Select destination</option>
										<?php 
											$query = "select distinct(`stop`) from `stops` `stop` ";
											$insert = mysqli_query($con,$query);
											while ($row = mysqli_fetch_array($insert)) 
											{
												echo "<option>$row[0]</option>";
											}
										?>
									</select>
								</label>
						</p>
						<p class="wipeout text-center">
								<input type="submit" name="show" value="Show Route" />
						</p>
						<p class="wipeout text-center">
								<a href="Index.php">back</a>
						</p>
					</form>
				</div>
		</div>
</div>
<!-------------------------------- ajex and jquery for search select --------------------------- -->







<!--------------------------------result --------------------------- -->
<?php 
	if (isset($_REQUEST["show"])) 
	{

		$from = $_REQUEST["from"];
		$to= $_REQUEST["to"];
		?>
			<div class=" fixed-bottom h-100">
					<div class="row "  style="margin-top: 120px;background: rgba(200,30,30, 0.3); min-height: 700px;">
						<div class="col-sm-6 " style="background-color: rgba(30,200,30, 0.3); height: auto; width: 200px;">
							<?php 
								// $query = "select `t1`.`routeno` from `stops` t1 inner join `stops` t2 on `t1`.`routeno` = `t2`.`routeno` where `t1`.`stop` = '$from' and `t2`.`stop` = '$to'";
								$query = "SELECT `routeno` from `routeno` where `routeid` in(select `t1`.`routeno` from `stops` t1 inner join `stops` t2 on `t1`.`routeno`=`t2`.`routeno` where `t1`.`stop` = '$from' and `t2`.`stop` = '$to') ";
								$insert = mysqli_query($con,$query);

								$counter=0;
								while ($s = mysqli_fetch_array($insert))
								{
									
										echo "$s[0] <br>";
										$counter++;
									
								}
								if($counter==0)echo "<script language='javascript'>alert('not found')</script>";
							?>
						</div>
						<div class="col-sm-6" style="background-color: rgba(30,30,200, 0.3); height: auto; width: 200px;">
							
						</div>
					</div>
			</div>
		<?php
	}
?>
</body>
</html>