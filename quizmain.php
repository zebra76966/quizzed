<?php
    session_start();
    if(!isset($_SESSION["email"])){
        header("Location: index.php");
    }
?>

<!DOCTYPE  html>
<html>
  <head>

    <title> Quizzed - Quizzez </title>
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
<!-- FETCHING  DATA FROM TABLE ABOUT QUIZ DESCRIPTION START-->

                <?php
                $localhost = "sql201.epizy.com";
                $user = "epiz_30763666";
                $database = "epiz_30763666_test";
                $password = "dmOfT2KQqsgEA";

                   $result = mysqli_connect($localhost, $user, $password);
                   mysqli_select_db($result, $database) or die("could not connect to database.");
                   // QUIZDATA TABLE QUERIES START========== >
                   $query = mysqli_query($result,"SELECT * FROM quizdescription ORDER BY timeadded ASC");
                   // QUIZDATA TABLE QUERIES End========== >



                   while($row = mysqli_fetch_array($query))
                 {
                   $quizid = $row["qid"];
                   $quizname = $row["quizname"];
                   $quizimg = $row["quizimg"];
                   $description = $row["description"];
                   $tques = $row["totalques"];
                   $diff = $row["difficulty"];
                   $author = $row["author"];
                   ?>

          <div class="col-12 col-lg-6 my-5">

            <div class="card">
              <img class="card-img-top" src="<?php echo $quizimg; ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $quizname; ?></h5>
                <p class="card-text d-inline">Difficulty:<p class="d-inline text-warning"> <?php echo $diff; ?></p></p>
                <p class="card-text">Questions: <?php echo $tques; ?></p>
                <p class="card-text">Creator: <?php echo $author; ?></p>
                <p class="card-text text-strong"><?php echo $description; ?></p>
                <h5 class="card-text text-info">Do keep in mind when starting a quiz you cant leave the quiz window or it'll lead to closing up the session for this quiz. </h5>
                <a href="quiznew.php?quizid=<?php echo $quizid;?>" class="btn atab">Take Quiz</a>
              </div>
            </div>

          </div>
        <?php }?>
<!-- FETCHING  DATA FROM TABLE ABOUT QUIZ DESCRIPTION END-->

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
