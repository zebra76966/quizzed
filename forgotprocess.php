<?php
session_start();
if(isset($_POST["resbtn"]))

{
	$localhost = "sql201.epizy.com";
	$user = "epiz_30763666";
	$database = "epiz_30763666_test";
	$password = "dmOfT2KQqsgEA";
	$succ = "";
  $error = "";
  $err2 = "";
	$error3 = "";
  $err3 = "";

	$conn = mysqli_connect($localhost, $user, $password);
  mysqli_select_db($conn, $database);

$email=mysqli_real_escape_string($conn,$_POST['t3']);
$question=mysqli_real_escape_string($conn,$_POST['sq']);
$answer=mysqli_real_escape_string($conn,$_POST['t4']);
$newpass=hash('sha256',mysqli_real_escape_string($conn,$_POST['newp']));
$conpass=hash('sha256',mysqli_real_escape_string($conn,$_POST['conp']));

$n=mysqli_real_escape_string($conn,$_POST['newp']);
$c=mysqli_real_escape_string($conn,$_POST['conp']);

$check=mysqli_query($conn,"SELECT * FROM student WHERE email='$email'and question='$question' and answer='$answer'");
// === INVALID USER DATA ERROR HANDLING END --------->
if($newpass !== $conpass) {
	$error3 = "New Password and Confirm passwords do not Match";
}

else if(strlen($n) < 8){
	$error3 = "Password should be atleast 8 Characters";
}
else if(strlen($c) < 8){
	$error3 = "Password should be atleast 8 Characters";
}

else if($_POST["t3"] == "" && $_POST["sq"] == "default" && $_POST["t4"] == ""){
    $error = "Details didn't match";
}
else if($_POST["t3"] == '')
{
    $error = "Please enter your registered email.";
}
else if($_POST["sq"] == "default")
{
    $err2 = "Please choose your security answer.";
}

else if($_POST["t4"] == ""){
    $err3 = "Please enter a security answer.";
}
// === INVALID USER DATA ERROR HANDLING END --------->
else if(mysqli_num_rows($check)==0)
{
 $error = "Info provided doesn't exist or wrong";
}

else
{
	if($_SERVER['REQUEST_METHOD']=='POST'){
		mysqli_query($conn, "UPDATE student SET password='$newpass' WHERE email='$email'")
		or die("could not connect to table");

		$succ =  "Password was reseted successfully";
				}

			else{
			$error = "invalid email or question and answer";
			}


	}



}
?>
