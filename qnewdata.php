<?php
session_start();
if(isset($_POST["subbtn"]))
{
  $localhost = "sql201.epizy.com";
  $user = "epiz_30763666";
  $database = "epiz_30763666_test";
  $password = "dmOfT2KQqsgEA";
  $error = "";
  $err = "";
  $err1 = "";
  $err2 = "";

$conn = mysqli_connect($localhost, $user, $password);
$db = mysqli_select_db($conn, $database);

date_default_timezone_set("Asia/kolkata");
$qqid = $_SESSION['qid'];
 $query = mysqli_query($conn,"SELECT * FROM quizdescription WHERE qid = '$qqid'")or die("could not connect to database.");
 $row = mysqli_fetch_array($query);
 $quizname = $row['quizname'];
 $_SESSION['qname'] = $quizname;
  if($_SERVER['REQUEST_METHOD']=='POST'){
    if(!empty($_POST)){

      $qqid = $_SESSION['qid'];
      $query = mysqli_query($conn,"SELECT * FROM quizquestions WHERE qid = '$qqid'")or die("could not connect to database.");

      $score = 0;
      $count=0;
      $count1=0;
      while($row = mysqli_fetch_array($query))
    {
      $ques = $row["question"];
      $count++;

      $count1++;
      $t1=mysqli_real_escape_string($conn,$_POST['t'.$count1]);
      $chkans=mysqli_query($conn, "SELECT * FROM quizquestions WHERE question = '$ques' and answer ='$t1'");
      if(mysqli_num_rows($chkans)>0){
        $score++;
      }
      }
      $tques = $count;
      $percent = $score/$tques*100;


    // SCORE INSERION IN DATABASE
    $check=mysqli_query($conn,"SELECT * FROM quizdata WHERE email='$_SESSION[email]' and quiz ='$quizname'");
    if(mysqli_num_rows($check)>0)
    {
      $error = "You have already submmited your answers for this quiz";
    }

    else{
      mysqli_query($conn, "INSERT INTO quizdata(email, quiz, score, totalques, percent) VALUES('$_SESSION[email]', '$quizname', '$score', '$tques', '$percent')")
      or die("could not connect to table");

      header("location: result.php");
    }




  }
  else{
    $error = "Please take the quiz";
  }
}
      else{
        $error = "something went wrong";
      }
    }

    // function inside($scr){
    //   $points = $scr;
    //   header("location: result.php");
    // }

?>
