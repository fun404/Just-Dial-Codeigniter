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
	<link rel="stylesheet" type="text/css" href="../css/user_register.css">
	<!-- jquerycdn link -->
		<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>
 	<!-- select2 cdn links -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
		<!--  -->
  	<!-- /////select2 cdn links -->
  	<!-- latest jqery link -->
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<!-- /////latest jqery link -->

</head>
<body>

<?php 
include('dbconnection.php');
?>


<div class="shade">
		<div class="blackboard">
				<div class="form">
					<form method="post" action="user_register_process.php" class="registerform" >
						<p class="">
							<div class="row">
								<div class="col-sm-4">
								<label>Name : </label>
								</div>
								<div class="col-sm-6">
									<input type="text" name ="name" required>
								</div>
							</div>
						</p>
						<p class="">
							<div class="row">
								<div class="col-sm-4">
								<label>Contact : </label>
								</div>
								<div class="col-sm-6">
									<input type="number" name="contact" required>
								</div>
							</div>
						</p>
						<p class="">
							<div class="row">
								<div class="col-sm-4">
								<label>Email : </label>
								</div>
								<div class="col-sm-6">
									<input type="Email" name="email" required>
								</div>
							</div>
						</p>
						<p class="">
							<div class="row">
								<div class="col-sm-4">
								<label>Password : </label>
								</div>
								<div class="col-sm-6">
									<input type="text" name="pas" required>
								</div>
							</div>
						</p>
						<p class="">
							<div class="row">
								<div class="col-sm-4">
								<label>Conform Password : </label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="con-pas">
								</div>
							</div>
						</p>
						<p class="wipeout text-center">
								<!-- <input type="submit" value="Sign Up" /> -->
								<button type="submit" class="btn-block">Sign Up</button>
								<button type="reset" class="btn btn-success btn-block mt-3">Reset Form</button>
								<a href="nearby.php"><button type="button" class="btn btn-danger btn-block mt-3">Cancel</button></a>
						</p>
					</form>
				</div>
		</div>
</div>
</body>
</html>
<script type="text/javascript">
	$('form.registerform').on('submit',function()
	{
		var that = $(this),
			url = that.attr('action'),
			type = that.attr('method'),
			data = {};
			that.find('[name]').each(function(index,value)
			{
				var that = $(this),
				name = that.attr('name'),
				value = that.val();

				data[name] = value;
			});
			// console.log(data);
			$.ajax(
			{
				url = url,
				type = type,
				data = data,
				success: function(response){
					console.log(response);
				}
			});
			return false;
	});
	</script>
