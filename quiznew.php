<?php
include("qnewdata.php");
?>

<!DOCTYPE  html>
<html>
  <head>

    <title> Quizzed </title>
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
    <script src="quiz.js"></script>


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

      <div class="container">
        <h3 class="text-danger mt-5"><?php if(isset($_POST["subbtn"])){echo $error;} else{ echo "";} ?></h3>
        <h4 class="text-white my-5"><?php if(isset($_POST["subbtn"])){echo "Your score this time: $score/$tques";} else{ echo "";} ?></h4>
        <form name="f1" method="POST" action="" enctype="multipart/form-data">

              <div class="card a1 an my-5">


<!--FETCHING FROM TABLE VIA QUIZ ID START -->
        <?php

        $localhost = "sql201.epizy.com";
        $user = "epiz_30763666";
        $database = "epiz_30763666_test";
        $password = "dmOfT2KQqsgEA";
            $qqid = $_GET['quizid'];
            $_SESSION['qid'] = $qqid;

               $result = mysqli_connect($localhost, $user, $password);

               mysqli_select_db($result, $database) or die("could not connect to database.");
               // QUIZDATA TABLE QUERIES START========== >
               $query = mysqli_query($result,"SELECT * FROM quizquestions WHERE qid = '$qqid'")or die("could not connect to database.");
               // QUIZDATA TABLE QUERIES End========== >


               $count = 0;
               while($row = mysqli_fetch_array($query))
             {
               $quizid = $row["qid"];
               $ques = $row["question"];
               $c1 = $row["c1"];
               $c2 = $row["c2"];
               $c3 = $row["c3"];
               $c4 = $row["c4"];
               $answer = $row["answer"];
               $count++;

        ?>
                <div class="card-header quest">

                  <h4> <?php echo $ques; ?></h4>
                  <img src="<?php echo $img;?>" class="img-fluid" style="width:30%">
                  <label class="cont my-4">
                    <input type="radio" name="t<?php echo$count;?>" value="<?php echo$c1; ?>">
                    <span class="checkmark"> <?php echo $c1; ?></span>
                  </label>

                  <label class="cont my-4">
                    <input type="radio" name="t<?php echo$count;?>" value="<?php echo$c2; ?>">
                    <span class="checkmark">  <?php echo $c2; ?></span>
                  </label>

                  <label class="cont my-4">
                    <input type="radio" name="t<?php echo$count;?>" value="<?php echo$c3; ?>">
                    <span class="checkmark">  <?php echo $c3; ?></span>
                  </label>

                  <label class="cont my-4">
                    <input type="radio" name="t<?php echo$count;?>"  value="<?php echo$c4; ?>">
                    <span class="checkmark">  <?php echo $c4; ?></span>
                  </label>

                </div>

      <?php }?>
<!--FETCHING FROM TABLE VIA QUIZ ID START -->

              <div class="card a1 an ">
                <div class="card-header quest">

                  <input type="submit" value="Submit Answers" name="subbtn" />

                </div>
              </div>
            </div>

        </form>
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
