<?php
session_start();
require('../connection.php');

if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}

$result=mysqli_query($con, "SELECT * FROM tbPositions");
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php

if (isset($_POST['Submit']))
{

$newPosition = addslashes( $_POST['position'] );

$sql = mysqli_query($con, "INSERT INTO tbpositions (position_name) VALUES ('$newPosition')");


 header("Location: positions.php");
}
?>
<?php

 if (isset($_GET['id']))
 {
 
 $id = $_GET['id'];
 
 
 $result = mysqli_query($con, "DELETE FROM tbPositions WHERE position_id='$id'");
 
 
 
 }
 else
 
    
?>