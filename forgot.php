<!---PHP SESSION trigger code START--------------->
<?php
include("forgotprocess.php");
if(isset($_SESSION['email'])){
header("location: quizmain.php");
}
?>
<!---PHP SESSION trigger code END--------------->
<!DOCTYPE  html>
<html>
  <head>

    <title> Quizzed - Reset </title>
    <meta charset="UTF-8">
     <meta name="author" content="zebcorp aka rohit sharma">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "new.css">
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="mai.js"></script>


  </head>
    <body>
      <!-- BACKGROUND CODE START-->
      <div id="bg">
        </div>
        <!-- BACKGROUND CODE END -->

        <!-- NAVBAR CODE START -->
        <div class="wrapper">
      <nav class="navbar navbar-expand-lg navbar-dark bg-none">
        <a class="navbar-brand" href="index.html">ZC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="quizmain.php">Quizzes</a>
            </li>

            <li class="nav-item">
              <div class="nav-link dm" >Dark Mode
              <label class="switch">
                <input type="checkbox" name="dmode" onclick="darkmode()">
                <span class="slider"></span>
              </label>
            </div>
            </li>

          </ul>
        </div>
      </nav>
    </div>
      <!-- NAVBAR CODE END -->

      <div class="container my-2">
        <!-- ROLL NO. Generator Start 12/4/20-->
        <div class="row">

          <div class="col-12 my-5 d-flex justify-content-center">

            <div class="card zoom">
              <h3 class="card-img-top py-4 text-dark font-weight-bold">RESET PASSWORD</h3>
              <div class="card-body px-3">

                <form name="reset" method="post" action="" enctype="multipart/form-data">
                  <p class="text-success"> <?php if(isset($_POST["resbtn"])){echo $succ;} ?> </p>

                    <input type="email" placeholder="Enter your email add." id="t3" name="t3" required/>
                    <p class="text-danger" id="warn3"></p>
                    <p class="text-danger"> <?php if(isset($_POST["resbtn"])){echo $error;} ?> </p>
                    <p class="text-danger"> <?php if(isset($_POST["resbtn"])){echo $err2;} ?> </p>

                    <h3>Choose a security question</h3>
                    <select name="sq" required/>
                    <option value="default">-Choose-</option>
                    <option>What is your nickname</option>
                    <option>Who is your favourite cricketer</option>
                    <option>What is the name of your dog</option>
                    </select>
                    <p class="text-danger" id="warn"></p>
                    <input type="text" name="t4" id="t4" placeholder="Security answer" required//>
                    <p class="text-danger" id="warn4"></p>
                    <p> <?php if(isset($_POST["resbtn"])){echo $err3;} ?> </p>

                    <h3>Change Password</h3>
                      <input style="display:inline; width:80%;" type="password" placeholder="Enter New Password" id="newp" name="newp" required/>
                      <button class="atab d-inline" style="display:inline; width:15%; font-size: 21px;" onclick="return vi3()"><i class="fa fa-eye"></i></button>
                      <p class="text-danger" id="warn1"></p>
                      <p class="text-danger"> <?php if(isset($_POST["resbtn"])){echo $error3;} ?> </p>
                      <input type="password" placeholder="Confirm new password" id="conp" name="conp" required/>

                    <input type="submit" value="Reset" onclick="return check()" name="resbtn" />

                    <h4>Return to login?<a href="index.php"> Login</a></h4>

                  </form>
                </div>
              </div>

            </div>

          </div>
        </div>





        <!-- FOOTER CODE START -->
        <footer>
          <h1>Let's get Connected</h1>
          <ul>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Gmail</a></li>
          </ul>
        </footer>
        <!-- FOOTER CODE END -->
    </body>
  </html>
