<?php
session_start();
require('../connection.php');

if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
} 

$result=mysqli_query($con,"SELECT * FROM tbCandidates");
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php

$positions_retrieved=mysqli_query($con, "SELECT * FROM tbPositions");

?>
<?php

if (isset($_POST['Submit']))
{

$newCandidateName = addslashes( $_POST['name'] ); 
$newCandidatePosition = addslashes( $_POST['position'] );
$photo=$_FILES["photo"]["name"];
move_uploaded_file($_FILES["photo"]["tmp_name"],"candidate_img/".$_FILES["photo"]["name"]);
$sql = mysqli_query($con, "INSERT INTO tbCandidates(candidate_name,candidate_position, photo) VALUES ('$newCandidateName','$newCandidatePosition', '$photo')" );


 header("Location: index.php");
}
?>
<?php

 if (isset($_GET['id']))
 {
 
 $id = $_GET['id'];
 
 
 $result = mysqli_query($con, "DELETE FROM tbCandidates WHERE candidate_id='$id'"); 
 header("Location: candidates.php");
 }
 else
   
?>