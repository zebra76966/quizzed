<!-- LOGIN SESSION DESTROY(PHP) START --------->
<?php
session_start();
if(isset($_SESSION["email"])){

  $localhost = "sql201.epizy.com";
  $user = "epiz_30763666";
  $database = "epiz_30763666_test";
  $password = "dmOfT2KQqsgEA";

  $conn = mysqli_connect($localhost, $user, $password);
  mysqli_select_db($conn, $database);

  date_default_timezone_set("Asia/kolkata");
  $time = date("Y/M/d h:i:sa");
  mysqli_query($conn,"UPDATE student SET timeout = '$time' WHERE email='$_SESSION[email]' and password='$_SESSION[pass]'");

  session_destroy();
  header("Location: index.php");
}



?>
