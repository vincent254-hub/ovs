<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
extract($_REQUEST);

require_once('connection.php');
$query=mysqli_query($con, "SELECT * FROM tbmembers WHERE email='$email'");
$result = mysqli_num_rows($query);
if($result == 0){
    echo"email already Registerd Please Try Another one";
}else{
    echo"registered";
}
?>