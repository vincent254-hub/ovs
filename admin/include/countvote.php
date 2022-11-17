
<?php
require('../connection.php');

if (isset($_POST['Submit'])){   

  $position = addslashes( $_POST['position'] );
  
    $results = mysqli_query($con, "SELECT * FROM tbCandidates where candidate_position='$position'");

    $row1 = mysqli_fetch_array($results); 
    $row2 = mysqli_fetch_array($results); 
      if ($row1){
      $candidate_name_1=$row1['candidate_name']; 
      $candidate_1=$row1['candidate_cvotes']; 
      }

      if ($row2){
      $candidate_name_2=$row2['candidate_name']; 
      $candidate_2=$row2['candidate_cvotes']; 
      }
}
    else
        
?> 
<?php

$positions=mysqli_query($con, "SELECT * FROM tbPositions");
?>
<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
 
}
?>

<?php if(isset($_POST['Submit'])){$totalvotes=$candidate_1+$candidate_2;
 header("Location: index.php");
} ?>

<html>
    <head>

    <script language="JavaScript" src="js/admin.js">
    </script>
</head>
<body>
<div class="row">
    <div class="col-lg-2">

    </div>

    <div class="col-lg-10 ">
    <div class="row">
    <div class="col-lg-10">



    <div id="card ">
        <div class="card-body ">
            <h5 class="card-title text-center mt-5">Vote Results</h5>    
                <form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return positionValidate(this)">
                    <div class="row mb-3">
                        <label>Choose Position</label>
                        <SELECT class="form-control" NAME="position" id="position">
                        <OPTION VALUE="select">select
                            <?php 
                                while ($row=mysqli_fetch_array($positions)){
                                echo "<OPTION VALUE=$row[position_name]>$row[position_name]";     
                                }
                            ?>
                        </SELECT>
                        <div class="container text-center">
                        <input class="btn btn-primary m-2" type="submit" name="Submit" value="See Results" />
                        </div>
                    </div>
                </form> 
        </div>

        <div class="container row">
            <div class="col-sm-12 d-flex">

            <!-- card -->
            <!-- loop through each card -->            
            
               <div class="card border-success mb-3 m-2 col-sm-6 " style="max-width: 80%;">
                    <div class="card-header bg-transparent border-success"><?php if(isset($_POST['Submit'])){echo $candidate_name_1;} ?></div>
                        <div class="card-body text-success container">
                            <h5 class="card-title"></h5>
                            <img src="images/candidate-1.gif"
                            width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>'
                            height='20'>
                        </div>
                        <div class="card-footer bg-transparent border-success">
                            <?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
                        <p>votes <?php if(isset($_POST['Submit'])){ echo $candidate_1;} ?></p>
                    </div>
            </div> 
            
            
            <!-- card ends
            <-- card2 -->
            <div class="card border-success mb-3 m-2 col-sm-6" style="max-width: 80%;">
            <div class="card-header bg-transparent border-success"><?php if(isset($_POST['Submit'])){ echo $candidate_name_2;} ?></div>
            <div class="card-body text-success container">
                <h5 class="card-title"></h5>
                <img src="images/candidate-2.gif"
                width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>'
                height='20'>
            </div>
            <div class="card-footer bg-transparent border-success">
                 <?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
                <p>votes <?php if(isset($_POST['Submit'])){ echo $candidate_2;} ?></p>
            </div>
            </div>
            <!-- card2 ends -->             
         </div>

                <!-- <div class="col-sm-2">
                        <p> total votes</p>
                        
                </div> -->
        </div>

    </div>
    </div>
    </div>
    </div>
</div>
</body></html>
