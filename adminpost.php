<?php
session_start();
if(isset($_POST["pbtn"]))
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


date_default_timezone_set("Asia/kolkata");
$tadd = date("Y/M/d h:i:sa");

$ran = mt_rand();
function ran(){
$ran = mt_rand();
}
$check=mysqli_query($conn,"SELECT * FROM quizdescription WHERE qid='$ran'");
if(mysqli_num_rows($check)>0)
{
  ran();
}

else {
  if($_SERVER['REQUEST_METHOD']=='POST')

	{
    $qname = mysqli_real_escape_string($conn,$_POST['qname']);
    $diff=mysqli_real_escape_string($conn,$_POST['diff']);
    $author=mysqli_real_escape_string($conn,$_POST['authors']);
    $qdes = mysqli_real_escape_string($conn,$_POST['deon']);

    $qtques = $_SESSION["totali"];
    echo $qtques;
      $filename = $_FILES["file"]["name"];
      $file_tmp_name = $_FILES["file"]["tmp_name"];
      $filetype = $_FILES["file"]["type"];

      $filepath = "quizez/" .$filename;
      $dgfilepath = "quizez/default.png";


      if($_FILES['file']['size'] == 0) {

        mysqli_query($conn, "INSERT INTO quizdescription(qid,quizname,quizimg,description,totalques,difficulty,author,timeadded) VALUES('$ran','$qname','$dgfilepath','$qdes','$qtques','$diff','$author','$tadd')")
        or die("could not connect to table");


        $count1= 0;
        for($k = 1;$k<= $qtques;$k++){

          $count1++;
          // ===== QUESTN IMAGE FETCH
          $qfile_tmp_name = $_FILES['q'.$count1]["tmp_name"];
          $qfilename = $_FILES['q'.$count1]["name"];
          $qfilepath = "quizez/".$qfilename;

        $t1=mysqli_real_escape_string($conn,$_POST['t'.$count1]);
        $c1=mysqli_real_escape_string($conn,$_POST['t'.$count1.'c1']);
        $c2=mysqli_real_escape_string($conn,$_POST['t'.$count1.'c2']);
        $c3=mysqli_real_escape_string($conn,$_POST['t'.$count1.'c3']);
        $c4=mysqli_real_escape_string($conn,$_POST['t'.$count1.'c4']);
        $answer=mysqli_real_escape_string($conn,$_POST['t'.$count1.'answer']);
        mysqli_query($conn, "INSERT INTO quizquestions(qid,question,quesimg,c1,c2,c3,c4,answer) VALUES('$ran','$t1','$qfilepath','$c1','$c2','$c3','$c4','$answer')");
        move_uploaded_file($_FILES['q'.$count1]["tmp_name"], $qfilepath);
        }

        header("location: quizmain.php");
        exit();

    }
    else if($filetype=="image/jpeg" || $filetype=="image/jpg" || $filetype=="image/png" || $filetype=="image/gif"){
      mysqli_query($conn, "INSERT INTO quizdescription(qid,quizname,quizimg,description,totalques,difficulty,author,timeadded) VALUES('$ran','$qname','$filepath','$qdes','$qtques','$diff','$author','$tadd')")
      or die("could not connect to table");
      move_uploaded_file($_FILES["file"]["tmp_name"], $filepath);

      $count= 0;
      for($j = 1;$j<= $qtques;$j++){
      $count++;
      $t1=mysqli_real_escape_string($conn,$_POST['t'.$count]);
      $c1=mysqli_real_escape_string($conn,$_POST['t'.$count.'c1']);
      $c2=mysqli_real_escape_string($conn,$_POST['t'.$count.'c2']);
      $c3=mysqli_real_escape_string($conn,$_POST['t'.$count.'c3']);
      $c4=mysqli_real_escape_string($conn,$_POST['t'.$count.'c4']);
      $answer=mysqli_real_escape_string($conn,$_POST['t'.$count.'answer']);
      mysqli_query($conn, "INSERT INTO quizquestions(qid,question,quesimg,c1,c2,c3,c4,answer) VALUES('$ran','$t1','$qfilepath','$c1','$c2','$c3','$c4','$answer')");
      move_uploaded_file($_FILES['q'.$count]["tmp_name"], $qfilepath);
      }
      header("location: quizmain.php");
      exit();

    }
  }
else{
  $error = "Selected file is not a Image";
}
}

}

?>
