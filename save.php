<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require('connection.php');
 $vote = $_REQUEST['vote'];
  $user_id=$_REQUEST['user_id'];
   $position=$_REQUEST['position'];

$sql=mysqli_query($con, "SELECT position,voter_id FROM tblvotes where position='$position' and voter_id='$user_id'");

if(mysqli_num_rows($sql))
{

   echo " <div class='row'>
            <div class='col-lg-12'>
            <div class='card m-4'>
                <div class='card-body'>
                    <h3 class='text-danger'>Oops!! You have already voted. Try again next season</h3>
                </div>

            </div>
                
            </div>
            
    </div>"
    ;
  
}
else
{
    
    $ins=mysqli_query($con,"INSERT INTO tblvotes (voter_id, position, candidateName) VALUES ('$user_id', '$position', '$vote')");
    mysqli_query($con, "UPDATE tbCandidates SET candidate_cvotes=candidate_cvotes+1 WHERE candidate_name='$vote'");
    mysqli_close($con);
 
    echo " <div class='row'>
    <div class='col-lg-12'>
    <div class='card m-4'>
        <div class='card-body'>
            <h3 class='text-success'>Congratulations! You just voted in your candidate. Wish you victory</h3>
        </div>

    </div>
        
    </div>
    
</div>"
;

}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('include/header') ?>
</head>
<body>

</body>
</html>