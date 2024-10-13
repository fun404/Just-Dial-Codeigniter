     <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand " href="index.php">CitySearch</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" data-target="dropdown-menu" href="#">Language <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">English</a></li>
                  <li><a href="#">Hindi</a></li>
                </ul>
              </li>
                <?php if(isset($_SESSION["email"] ))
                        { 
                          if ($_SESSION["userID"])
                           {
                         
                              $vaar = $_SESSION["email"];
                              $vaar1 = $_SESSION["userID"];

                              // echo "<script> alert('once you are logged in      email=$vaar userid=$vaar1 session has been created     Now you\'ve enabled classified section ');  </script>";


                          ?>
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" data-target="dropdown-menu" href="#">Manage classified ads<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="classified_entries.php">Add new classified ads</a></li>
                                <li><a href="#">Customise ads</a></li>
                                <li><a href="#">Show all</a></li>
                              </ul>
                            </li>
                          <?php
                        } }
                        // else  echo "<script> alert('Login to your account to enable classified section and many more.');  </script>";
                ?>
              <li>
                <a href="classified_ad.php">
                  Clasified Ads
                </a>
              </li>


              <?php if(isset($_SESSION["email"] ))
                      { 
                        if ($_SESSION["userID"])
                         {
                       
                            $vaar = $_SESSION["email"];
                            $vaar1 = $_SESSION["userID"];

                            // echo "<script> alert('once you are logged in      email=$vaar userid=$vaar1 session has been created     Now you\'ve enabled classified section ');  </script>";


                           ?>
                            <li class="dropdown" style="margin-right: 30px;">
                              <a class="dropdown-toggle" data-toggle="dropdown" data-target="dropdown-menu" href="#"><strong>Your Account</strong><span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li class="text-uppercase"><a href="JavaScript:Void(0);"><strong><?=$_SESSION["userName"] ;?></strong></a></li>
                                <li><a href="JavaScript:Void(0);">Edit Account Info</a></li>
                                <li><a href="user_login_process.php?lo">Log Out</a></li>
                              </ul>
                            </li>
                          <?php
                        } 
                      }
                      else  
                      {
                        ?>


              
                          <li>
                            <a href="user_register.php">
                              Sign Up
                            </a>
                          </li>

                        
                          <li>
                            <a href="#"  onclick="document.getElementById('id01').style.display='block'">
                              <span class="glyphicon glyphicon-log-in"></span>
                              <!-- Button to open the modal login form -->
                              <span><button class="no-m-p">Login</button></span>
                            </a>
                          </li>
                        <?php 
                      }
                        ?>
                      </ul>
                            <!-- The Modal -->
                <div id="id01" class="modal login-modal">
                  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                  <!-- Modal Content -->
                  <form class="modal-content animate model-form" action="user_login_process.php" method="post">
                    <div class="imgcontainer">
                      <img src="../images/img_avatar2.png" alt="Avatar" class="avatar">
                    </div>

                    <div class="m-2">
                      <label for="email"><b> Email </b></label>
                      <input type="email" placeholder="Enter Email" name="email" required>

                      <label for="password"><b>Password</b></label>
                      <input type="password" placeholder="Enter Password" name="password" required>

                      <button type="submit">Login</button>
                      <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                      </label>
                    </div>

                    <div class="m-2" style="background-color:#f1f1f1">
                      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                      <span class="psw">Forgot <a href="#">password?</a></span>
                    </div>
                  </form>
                </div>
                <script>
                  // Get the modal
                  var modal = document.getElementById('id01');

                  // When the user clicks anywhere outside of the modal, close it
                  window.onclick = function(event) {
                    if (event.target == modal) {
                      modal.style.display = "none";
                    }
                  }
                </script>

        </div>
      </div>
                <!-- /.navbar-static-side -->
    </nav>
  </div>
