<!-- PHP LOGIN DATA VALIDATION AND FETCHING --------->
<?php
session_start();
if(isset($_POST["b1"]))
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
$time = date("Y/M/d h:i:sa");


$email=mysqli_real_escape_string($conn,$_POST['t1']);
$pass=hash('sha256',mysqli_real_escape_string($conn,$_POST['t2']));
$passd=mysqli_real_escape_string($conn,$_POST['t2']);
// ====Admin login==========>
if($email == "admin@gmail.com" && $passd == "1234admin5678")
{

    $_SESSION["email"] = $email;
    $_SESSION["pass"] = $passd;
    header("Location: admin.php");
    exit();
}
// ====Admin login End==========>
$query = mysqli_query($conn,"SELECT * FROM student WHERE email='$email' AND password='$pass'") or die("Table not selected");
$row = mysqli_fetch_array($query);

if(isset($_POST['c1']))
{
setcookie("user",$email,time()+(86400*30));
setcookie("pass",$passd,time()+(86400*30));
}
else
{
setcookie("user",$email,time()-1);
setcookie("pass",$passd,time()-1);

}


// === INVALID USER DATA ERROR HANDLING END --------->
if($_POST["t1"] == '')
{
    $err = "Please enter email.";
}
else if($_POST["t2"] == "")
{
    $err1 = "Please enter password.";
}
// === VALID LOGIN DETAILS ACTION START ----------->

else if(is_array($row))
{
    $_SESSION["email"] = $row["email"];
    $_SESSION["pass"] = $row["password"];
    header("Location: quizmain.php");

}
// === VALID LOGIN DETAILS ACTION START END ---------->

else{
    $err = "Invalid email and Password";
}
}
// === INVALID USER DATA ERROR HANDLING END --------->

?>
