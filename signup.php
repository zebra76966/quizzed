<!---PHP SESSION trigger code START--------------->
<?php
include("regsub.php");
if(isset($_SESSION['email'])){
header("location: quizmain.php");
}
?>
<!---PHP SESSION trigger code END--------------->
<!DOCTYPE  html>
<html>
  <head>

    <title> Quizzed - SignUp </title>
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
              <a class="nav-link" href="#">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tutorials</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="quizmain.php">Quizzes</a>
            </li>

            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle p-0" href="#" id="navbardrop" data-toggle="dropdown">
                <?php
                $localhost = "sql201.epizy.com";
                $user = "epiz_30763666";
                $database = "epiz_30763666_test";
                $password = "dmOfT2KQqsgEA";

                   $result = mysqli_connect($localhost, $user, $password);
                   mysqli_select_db($result, $database) or die("could not connect to database.");

                   $query = mysqli_query($result,"SELECT * FROM student WHERE email = '$_SESSION[email]'");
                   $row = mysqli_fetch_array($query);

                   ?>
                   Hi! <?php echo $row["username"];?>
                   <img class="img-fluid ml-2 p-1" style="width:40px; height:40px; object-fit: contain; border: 2px solid white; border-radius: 100px;" src= "<?php echo $row["userimg"];?>" class="d-inline-block align-top img">
              </a>
              <div class="dropdown-menu bg-dark">
                <a class="dropdown-item bg-dark" href="logout.php">Logout</a>
                <a class="dropdown-item bg-dark" href="setting.php">Settings</a>
                <p class="dropdown-item text-white bg-dark">Last seen : <?php echo $row["timeout"]; ?></p>
              </div>
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
              <h3 class="card-img-top py-4 text-dark font-weight-bold">SIGNUP</h3>
              <div class="card-body px-3">

                <form name="reg" method="post" action="" enctype="multipart/form-data">

                  <label class="custom-file-upload d-flex justify-content-center align-items-center">
                    <img src="quizez/deskimage.jpg" class="img-fluid">
                    <div>
                      <input type="file" name="file" id="file"/>
                      <p class="text-dark">Add Profile Image <i class="fa fa-edit"></i></p>
                    </div>
                  </label>

                  <input type="text" placeholder="Enter a Username" id="user" name="t3" />
                  <p class="text-danger" id="warn"></p>
                  <p class="text-danger"> <?php if(isset($_POST["regbtn"])){echo $err;} ?> </p>

                  <input type="email" id ="email" name="t1" placeholder="Enter your email" required />
                  <p class="text-danger" id="warn3"></p>
                  <p class="text-danger"> <?php if(isset($_POST["regbtn"])){echo $error;} ?> </p>
                  <p class="text-danger"> <?php if(isset($_POST["regbtn"])){echo $err2;} ?> </p>

                    <input style="display:inline; width:80%;" type="password" id = "passn" name="t2" placeholder="Enter Password" required />
                    <button class="atab d-inline" style="display:inline; width:15%; font-size: 21px;" onclick="return vi5()"><i class="fa fa-eye"></i></button>
                    <p class="text-danger" id="warn2"></p>
                    <p class="text-danger"> <?php if(isset($_POST["regbtn"])){echo $err1;} ?> </p>

                  <div class="d-flex justify-content-center py-2">
                    <label for = "Male" class="px-3 font-weight-bold">Male
                     <input type="radio" id="Male" name="r"  value="Male">
                   </label>
                   <label for = "Male" class="px-3 font-weight-bold">Female
                     <input type="radio" id="Female" name="r" value="Female">
                    </label>
                  </div>

                  <h4 class="text-dark pt-3">Choose a security question</h4>
                  <select name="sq" class="text-dark">
                  <option>What is your nickname</option>
                  <option>Who is your favourite cricketer</option>
                  <option>What is the name of your dog</option>
                  </select>

                  <input type="text" name="t4" id="sa" placeholder="Security answer" />
                  <p class="text-danger" id="warn4"></p>
                  <p class="text-danger" > <?php if(isset($_POST["regbtn"])){echo $err3;} ?> </p>

                  <input type="submit" class="my-2" value="Register" onclick="return jvalida()" name="regbtn" />

                  <h4>Already have an account?<a href="index.php"> Login</a></h4>
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
