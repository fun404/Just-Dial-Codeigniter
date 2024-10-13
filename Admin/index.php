<!DOCTYPE html>
<html lang="en">
 <head>
  <title>Login</title>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/admin_login.css">
  <!-- -----------------Validation java script---------------- -->

  <script src="js/validation.js"></script>

  <style type="text/css">
    .red-warning
    {
      color: red;
    }
  </style>
 </head>

 <body>
 <div class="container-fluid bg" >
  <div class="row">
   <div class="col-md-4 col-sm-4 col-xs-12"></div>
    <div class="col-md-4 col-sm-4 col-xs-12">


     <!--form start-->
     <form action="admin_login_process.php" method="post" name="Register" class="form-container ">
     <h1>Admin Login Here</h1>
        <div class="form-group">
       <label for="exampleInputname1">Admin Email</label>

       <input name="uname" type="name" class="form-control" onclick="validate()" onchange ="validate()" id="exampleInputname1" placeholder="name">
        <br> <span id="name-alert" class="red-warning"></span>

        </div>

        <div class="form-group">
       <label  for="exampleInputPassword1">Account Password</label>

       <input name="password" type="password" class="form-control" onclick="validate()" onchange ="validate()" id="exampleInputPassword1" placeholder="Password">
       <br> <span id="password-alert" class="red-warning"></span>

        </div>
      
        <div class="checkbox">
       <label>

         <input type="checkbox"> Remember Me
       </label>
        </div>
        <button onclick="validate()" type="submit" class="btn btn-success btn-block">Login</button><br> 
        <a style="text-decoration: none; color: white;" href="admin_register.php" class="btn  bg-primary btn-block mt-3">Sign Up</a><br> 
     </form>
     
     <!--form end-->
     
    </div>
   <div class="col-md-4 col-sm-4 col-xs-12"></div>
  </div>
 </div>
 
 </body>
</html>﻿