<?php
session_start();
if(isset($_POST["upbtn"]))

{

  $localhost = "sql201.epizy.com";
  $user = "epiz_30763666";
  $database = "epiz_30763666_test";
  $password = "dmOfT2KQqsgEA";
  $error="";
  $error1="";
  $error2="";
  $succ="";
  $success="";
  $suc="";

  $filename = $_FILES["file"]["name"];
  $file_tmp_name = $_FILES["file"]["tmp_name"];
  $filetype = $_FILES["file"]["type"];

  $filepath = "quizez/userimg/" .$filename;
  $dgfilepath = "quizez/userimg/girl.png";
  $dbfilepath = "quizez/userimg/boy.png";
  $userfilepath = "quizez/userimg/user.png";
  $conn = mysqli_connect($localhost, $user, $password);
  mysqli_select_db($conn, $database);


  $oldpass=hash('sha256',mysqli_real_escape_string($conn,$_POST['oldp']));
  $newpass=hash('sha256',mysqli_real_escape_string($conn,$_POST['newp']));
  $conpass=hash('sha256',mysqli_real_escape_string($conn,$_POST['conp']));

  $o=mysqli_real_escape_string($conn,$_POST['oldp']);
  $n=mysqli_real_escape_string($conn,$_POST['newp']);
  $c=mysqli_real_escape_string($conn,$_POST['conp']);


  $query= mysqli_query($conn,"SELECT* FROM student WHERE email='$_SESSION[email]'");
  $row = mysqli_fetch_array($query);
  $check=mysqli_query($conn,"SELECT password FROM student WHERE password='$oldpass' and email='$_SESSION[email]'");

if($_POST['oldp'] !== ""){
  if(mysqli_num_rows($check)>0){
    if($newpass !== $conpass && !$oldpass){
        $error1 = "Please enter old Password";
        $error2 = "New Password and Confirm passwords do not Match";
    }
    else if($newpass !== $conpass) {
      $error2 = "New Password and Confirm passwords do not Match";
    }
    else if($newpass === $conpass && !$oldpass){
        $error1 = "Please enter old Password";
    }

    else if(strlen($n) < 8){
      $error2 = "Password should be atleast 8 Characters";
    }
    else if(strlen($c) < 8){

      $error2 = "Password should be atleast 8 Characters";

    }
    else if(strlen($o) < 8){
      $error1 = "Password should be atleast 8 Characters";
    }

    else{

      mysqli_query($conn, "UPDATE student SET password='$newpass' WHERE email='$_SESSION[email]' && password='$oldpass'")
      or die("could not connect to table");

      $succ = "Password updated successfully";

      // ======= PASSWORD UPDATE ALONG IMAGE UPDATE START===>

      if(isset($_POST['dbtn'])) {

        if($row['gender'] == "Male"){

          mysqli_query($conn, "UPDATE student SET userimg='$dbfilepath' WHERE email='$_SESSION[email]'")
          or die("could not connect to table");

          $suc = "Profile image removed successfully";
        }
        else{
          mysqli_query($conn, "UPDATE student SET userimg='$dgfilepath' WHERE email='$_SESSION[email]'")
          or die("could not connect to table");

          $success = "Profile image removed successfully";
        }

        }

      else if( $filetype == 'image/jpeg'||$filetype == 'image/jpg'||$filetype == 'image/png'||$filetype == 'image/gif'){
        $update=mysqli_query($conn,"UPDATE student SET userimg='$filepath' WHERE email='$_SESSION[email]'");
        move_uploaded_file($file_tmp_name, $filepath);

        $success = "Profile Pic updated successfully";

        }

       // PASSWORD UPDATE ALONG WITH IMAGE UPDATE END =====>
      }
    }

  else{
    $error1 = "Old Password is wrong";
  }
}
else{
if($_SERVER['REQUEST_METHOD']=='POST')

      {
          if(isset($_POST["dbtn"])) {
            if($row['gender'] == "Male"){

              mysqli_query($conn, "UPDATE student SET userimg='$dbfilepath' WHERE email='$_SESSION[email]'")
              or die("could not connect to table");

              $succ = "New record created successfully";
            }
            else{
              mysqli_query($conn, "UPDATE student SET userimg='$dgfilepath' WHERE email='$_SESSION[email]'")
              or die("could not connect to table");

              $succ = "New record created successfully";
            }

          }

          else if( $filetype == 'image/jpeg'||$filetype == 'image/jpg'||$filetype == 'image/png'||$filetype == 'image/gif'){
            $update=mysqli_query($conn,"UPDATE student SET userimg='$filepath' WHERE email='$_SESSION[email]'");
            move_uploaded_file($file_tmp_name, $filepath);

            $success = "Profile image updated successfully";
            }

          else{
            $error = "Selected file is not an Image";
          }

      }
      else{
        echo "error";
      }
    }
}
?>
