<?php
session_start();
if(isset($_POST["regbtn"]))
{
  $localhost = "sql201.epizy.com";
  $user = "epiz_30763666";
  $database = "epiz_30763666_test";
  $password = "dmOfT2KQqsgEA";
  $error = "";
  $err = "";
  $err1 = "";
  $err2 = "";
  $err3 = "";

$conn = mysqli_connect($localhost, $user, $password);
$db = mysqli_select_db($conn, $database);

$user=mysqli_real_escape_string($conn,$_POST['t3']);
$pass=hash('sha256',mysqli_real_escape_string($conn,$_POST['t2']));
$email=mysqli_real_escape_string($conn,$_POST['t1']);
$question=mysqli_real_escape_string($conn,$_POST['sq']);
$answer=mysqli_real_escape_string($conn,$_POST['t4']);
$gender=mysqli_real_escape_string($conn,$_POST['r']);



$check=mysqli_query($conn,"SELECT * FROM student WHERE email='$email'and question='$question' and answer='$answer'and password='$pass'and username='$user'");
if(mysqli_num_rows($check)>0)
{
  $error = "This email address already exists.";
}
// === INVALID USER DATA ERROR HANDLING END --------->
else if($_POST["t1"] == "" && $_POST["t2"] == "" && $_POST["t3"] == "" && $_POST["t4"] == "" && $_POST["r"] == ""){
    $err3 = "Please enter valid details";
}
else if($_POST["t3"] == '')
{
    $err = "Please enter user name.";
}
else if($_POST["t2"] == "")
{
    $err1 = "Please enter password.";
}

else if($_POST["r"] == "")
{
    $err1 = "Please choose a Gender";
}

else if($_POST["t1"] == ""){
    $err2 = "Please enter a email";
}
else if($_POST["t4"] == ""){
    $err3 = "Please enter a security answer.";
}
// === INVALID USER DATA ERROR HANDLING END --------->
else {
  if($_SERVER['REQUEST_METHOD']=='POST')

	{

    $user=mysqli_real_escape_string($conn,strtoupper($_POST['t3']));
    $pass=hash('sha256',mysqli_real_escape_string($conn,$_POST['t2']));
    $email=mysqli_real_escape_string($conn,$_POST['t1']);
    $question=mysqli_real_escape_string($conn,$_POST['sq']);
    $answer=mysqli_real_escape_string($conn,$_POST['t4']);
    $gender=mysqli_real_escape_string($conn,$_POST['r']);

      $filename = $_FILES["file"]["name"];
      $file_tmp_name = $_FILES["file"]["tmp_name"];
      $filetype = $_FILES["file"]["type"];

      $filepath = "quizez/userimg/" .$filename;
      $dgfilepath = "quizez/userimg/girl.png";
      $dbfilepath = "quizez/userimg/boy.png";
      $gender = $_POST['r'];


          if($_FILES['file']['size'] == 0) {

            if($gender == "Male"){
              mysqli_query($conn, "INSERT INTO student(userimg,username,gender,password,email,question,answer) VALUES('$dbfilepath','$user','$gender','$pass','$email','$question','$answer')")
              or die("could not connect to table");

              echo "New record created successfully";
              header ("location: index.php");
            }

            else if($gender == "Female"){
              mysqli_query($conn, "INSERT INTO student(userimg,username,gender,password,email,question,answer) VALUES('$dgfilepath','$user','$gender','$pass','$email','$question','$answer')")
              or die("could not connect to table");

              echo "New record created successfully";
              header ("location: index.php");
            }
            else{
                  $err1 = "Please choose a Gender";
            }

          }
          else if($filetype=="image/jpeg" || $filetype=="image/jpg" || $filetype=="image/png" || $filetype=="image/gif"){
            mysqli_query($conn, "INSERT INTO student(userimg,username,gender,password,email,question,answer) VALUES('$filepath','$user','$gender','$pass','$email','$question','$answer')")
            or die("could not connect to table");
            move_uploaded_file($file_tmp_name, $filepath);
            echo "New record created successfully";
            header ("location: index.php");

          }
        }
      else{
        $error = "Selected file is not a Image";
      }
    }

}

?>
