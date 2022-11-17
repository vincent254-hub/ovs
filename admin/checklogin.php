<!DOCTYPE html >
<html >
<head>
<?php include('../include/header.php') ?>
</head>
<body>

<body>
<div class="row">
  <div class="col-lg-12">
    <div class="container">
    <h1 class="text-center">Invalid Credentials Provided </h1>

</div>
</div>
<div class="container text-center">
<?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);

ob_start();
session_start();
require('../connection.php');

$tbl_name="tbAdministrators"; 



$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$encrypted_mypassword=md5($mypassword);


$myusername = stripslashes($myusername);
$mypassword = stripslashes($encrypted_mypassword);



$sql=mysqli_query($con, "SELECT * FROM tbadministrators WHERE email='$myusername' and password='$mypassword'");

$count = mysqli_num_rows($sql);


if($count)
{


  $user=mysqli_fetch_assoc($sql); 
  $_SESSION['admin_id'] = $user['admin_id'];
  header("location:index.php");
}

else {
  echo "<p class='text-danger'>Wrong Username or Password </p><br><br>Return to <a href=\"login.php\">login</a>";

  header("location:login.php");
  }
  
ob_end_flush();
?> 
</div>

</div>
</body>
</html>