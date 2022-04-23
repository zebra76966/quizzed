<!---PHP SESSION trigger code START--------------->
<?php
include("process.php");
if(isset($_SESSION['email'])){
header("location: quizmain.php");
}
?>
<!---PHP SESSION trigger code END--------------->
<!DOCTYPE  html>
<html>
  <head>

    <title> ZEBCORP </title>
    <meta charset="UTF-8">
     <meta name="description" content="How to fix buzzing or grinding sound coming from the computer power supply unit PSU ">
     <meta name="keywords" content="HTML, CSS, JavaScript">
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
                <a class="nav-link" href="quizmain.html">Quizzes</a>
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
              <h3 class="card-img-top py-4 text-dark font-weight-bold">LOGIN</h3>
              <div class="card-body px-3">

                <form name="login" method="post" action="" enctype="multipart/form-data">
                  <input type="email" id ="user" name="t1" placeholder="Enter your email" value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user']; }?>" required>
                  <p class="text-danger" id="warn"></p>
                  <p class="text-danger"> <?php if(isset($_POST["b1"])){echo $err;} ?> </p>

                    <input style="display:inline; width:80%;" type="password" id = "pass" name="t2" placeholder="Enter Password"  value="<?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass']; }?>" required>
                    <button class="atab d-inline" style="display:inline; width:15%; font-size: 21px;" onclick="return vi()"><i class="fa fa-eye"></i></button>
                    <p class="text-danger" id="warn2"></p>
                    <p class="text-danger"> <?php if(isset($_POST["b1"])){echo $err1;} ?> </p>

                  <h4 class="text-dark text-center py-2">Remember me <input type="checkbox" name="c1" <?php if(isset($_COOKIE['user'])){echo "checked='checked'";}?> /></h4>
                  <input type="submit" value="Login" onclick="return jvalid()" name="b1" />

                  <h5 class="text-dark py-3">Don't have an account? <a href="signup.php">Sign Up</a></h4>
                  <h5><a href="forgot.php">Forgot Password?</a></h3>
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
