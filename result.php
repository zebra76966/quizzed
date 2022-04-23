<?php
// header("Location: moz.php", TRUE, 302);
include("qnewdata.php");
?>

<!DOCTYPE  html>
<html>
  <head>

    <title> Quizzed - Leaderboards </title>
    <meta charset="UTF-8">

    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel = "stylesheet" href = "new.css">
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


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

      <div class="container py-5">
        <div class="row  d-flex justify-content-center align-items-center">
          <div class="col-12  d-flex justify-content-center">
              <h1 class="text-white my-2">
                <?php
                $localhost = "sql201.epizy.com";
                $user = "epiz_30763666";
                $database = "epiz_30763666_test";
                $password = "dmOfT2KQqsgEA";

                  $result = mysqli_connect($localhost, $user, $password);
              			mysqli_select_db($result, $database) or die("could not connect to database.");

                    $query = mysqli_query($result,"SELECT * FROM quizdata WHERE email = '$_SESSION[email]' and quiz = '$_SESSION[qname]'");
                    $row = mysqli_fetch_array($query);

                  ?>Your Score: <?php echo "$row[score]/"; echo $row['totalques']; ?>

              </h1>
          </div>
          <div class="col-12 d-flex justify-content-center">
                <h2 class="text-white strong mb-5"><?php if($row['score'] == $row['totalques']){echo "You Aced it!";}
                          else if($row['score'] > 80/100*$row['totalques'] and $row['score'] <= 99/100*$row['totalques']){echo "Awesome!";}
                          else if($row['score'] > 60/100*$row['totalques'] and $row['score'] <= 80/100*$row['totalques']){echo "Great!";}
                          else if($row['score'] > 40/100*$row['totalques'] and $row['score'] <= 60/100*$row['totalques']){echo "Good!";}
                          else if($row['score'] >= 33/100*$row['totalques'] and $row['score'] <= 40/100*$row['totalques']){echo "Work harder!";}
                          else if($row['score'] < 33/100*$row['totalques']){echo "You need to work really really hard";}

                    ?></h2>
          </div>
          <div class="col-12 d-flex justify-content-center mb-5">
                <a href="quizmain.php" class="btn atab w-40">Back to Quizzes</a>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <table class="table table-dark table-responsive-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col" class="text-center">Badge</th>
                  <th scope="col"></th>
                  <th scope="col">Name</th>
                  <th scope="col">Score</th>
                  <th scope="col" class="text-center">
                    <div class="dropdown">
                      <button class="btn bg-dark text-white dropdown-toggle" type="button" data-toggle="dropdown">Quiz
                          <span class="caret"></span></button>
                            <ul class="dropdown-menu bg-dark p-2">
                              <input class="form-control" id="myInput" type="text" placeholder="Search..">
                            </ul>
                      </div>
                  </th>
                </tr>
              </thead>
              <tbody id="myTable">

                <?php
                $localhost = "sql201.epizy.com";
                $user = "epiz_30763666";
                $database = "epiz_30763666_test";
                $password = "dmOfT2KQqsgEA";
                $ai=1;
                   $result = mysqli_connect($localhost, $user, $password);
                   mysqli_select_db($result, $database) or die("could not connect to database.");
                   // QUIZDATA TABLE QUERIES START========== >
                   $query = mysqli_query($result,"SELECT * FROM quizdata ORDER BY percent DESC");
                   // QUIZDATA TABLE QUERIES End========== >



                   while($row = mysqli_fetch_array($query))
                 {
                   $quiz = $row["quiz"];
                   $scr = $row["score"];
                   $tques = $row["totalques"];
                   $email = $row["email"];

                   // FETCHUNG DATA FROM TABLE1 USING TABLE2 QUERIES START========== >
                   $query1 = mysqli_query($result,"SELECT * FROM student WHERE email = '$email'");
                   $row1 = mysqli_fetch_array($query1);
                     $name = $row1["username"];
                     $img = $row1["userimg"];
                   // FETCHUNG DATA FROM TABLE1 USING TABLE2 QUERIES END========== >

                   // RANKING system START==========>
                   $rank = $ai++;
                   if($rank == 1){
                     $badge = "quizez/best.png";
                   }
                   else if($rank == 2){
                     $badge = "quizez/top.png";
                   }
                   else if($rank == 3){
                     $badge = "quizez/second.png";
                   }
                   else if ($rank == 4){
                     $badge = "quizez/third.png";
                   }
                   else{
                     $badge = "quizez/vet.png";
                   }
                    // RANKING system END==========>
                   ?>

                <tr>
                  <th scope="row"><?php echo $rank;?></th>
                  <td class="text-center" style="vertical-align:middle;"><img class="img-fluid" style="width: 25px; height: auto;" src="<?php echo $badge;?>"></td>

                    <td style="vertical-align:middle;"><img class="img-fluid" style="max-width:40px;  height: auto; object-fit: contain; border: 2px solid white; border-radius: 100px;" src="<?php echo $img;?>"></td>
                    <td style="vertical-align:middle;"><?php echo $name;?></td>
                    <td style="vertical-align:middle;"><?php echo $scr;?> / <?php echo $tques;?></td>
                    <td class="text-center" style="vertical-align:middle;"><?php echo $quiz;?></td>

                </tr>

              <?php } ?>

              </tbody>

            </table>
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
      <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
      </script>

  </body>
</html>
