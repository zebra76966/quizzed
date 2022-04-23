<!---PHP SESSION trigger code START--------------->
<?php
session_start();
?>
<!---PHP SESSION trigger code END--------------->
<!DOCTYPE  html>
<html>
  <head>

    <title> Quizzed - admin </title>
    <meta charset="UTF-8">
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
        <a class="navbar-brand" href="index.php">ZC</a>
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

            <div class="card w-100 zoom">
              <h3 class="card-img-top py-4 text-dark font-weight-bold">ADD QUIZ</h3>
              <div class="card-body px-3">
                <?php
                if( isset($_POST['quesbtn']) )
                {
                    $val1 = htmlentities($_POST['count']);
                    $count = $val1;
                }
                ?>
                <form name="adder" method="post">
                  <input type="text" id ="count" name="count" placeholder="Enter number of question you want to add" required />
                  <input type="submit" class="atab mb-4 my-2" value="Add" onclick="" name="quesbtn" />
                </form>



<!-- USER FORM INPUT AREA START=============================================-->
                <form name="questions" method="post" action="adminpost.php" enctype="multipart/form-data">

                  <label class="custom-file-upload d-flex justify-content-center align-items-center">
                    <img src="quizez/deskimage.jpg" class="img-fluid">
                    <div>
                      <input type="file" name="file" id="file"/>
                      <p class="text-dark">ADD QUIZ IMAGE<i class="fa fa-edit"></i></p>
                    </div>
                  </label>
                  <input type="text" name="qname" placeholder="Enter quiz name" required/>
                  <input type="text" name="diff" placeholder="Enter quiz Difficulty" required/>
                  <input type="text" name="authors" placeholder="Enter Quiz creator name" required/>
                  <textarea class="casa" name="deon" placeholder="Add Quiz description"></textarea>

                  <?php
                  $total="";
                  if(isset($_POST['quesbtn'])){$total = $count;}
                  $qcount= 0;
                  for($i=1;$i<=$total; $i++){
                    $qcount++;
                    ?>
                  <h4>Question <?php if(isset($_POST["quesbtn"])){echo $qcount;}?></h4>
                  <input type="text" name="t<?php echo $qcount;?>" placeholder="Enter Question" class="mb-5"  required/>
                  <label for="qimg" style="cursor: pointer; font-size: 18px; font-weight: bold;" class="mb-2">
                  <div>
                    <input type="file" name="q<?php echo $qcount;?>" id="qimg"/>
                    <p class="text-dark">Add Question Image?<i class="fa fa-edit"></i></p>
                  </div>
                  </label>
                  <input type="text" name="t<?php echo $qcount;?>c1" placeholder="Choice 1" required/>
                  <input type="text" name="t<?php echo $qcount;?>c2" placeholder="Choice 2" required/>
                  <input type="text" name="t<?php echo $qcount;?>c3" placeholder="Choice 3" required/>
                  <input type="text" name="t<?php echo $qcount;?>c4" placeholder="Choice 4" required/>
                  <input type="text" name="t<?php echo $qcount;?>answer" class="my-4" placeholder="Answer" required/>
                  <h4>
                  <?php }?>
                  <input type="submit" class="my-2" value="Post Quiz"  name="pbtn" />
                  <?php if(isset($_POST['quesbtn'])){$_SESSION["totali"] = $count;}?>
                </form>
<!-- USER FORM INPUT AREA END=============================================-->
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
