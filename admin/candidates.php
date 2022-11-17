<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("include/header.php") ?>
</head>

<body>
  <div class="col-12">
    <div class="card recent-sales overflow-auto">

      <form name="fmCandidates" id="fmCandidates" enctype="multipart/form-data" action="candidates.php" method="post"
        onsubmit="return candidateValidate(this)" class="card-body">
        <h5 class="card-title">Manage <span>| Candidates</span></h5>

        <table class="table table-borderless datatable">
          <div class="container d-flex">
            <div class="m-2">
              <label>Candidate Name</label>
              <input class="form-control" type="text" name="name" />
            </div>
            <div class="m-2 d-flex">
              <label>Candidate Position</label>
              <?php include('include/candidates.php') ?>
              <SELECT class="form-control" NAME="position" id="position">select
                <OPTION VALUE="select">select
                  <?php

                  while ($row = mysqli_fetch_array($positions_retrieved)) {
                    echo "<OPTION VALUE=$row[position_name]>$row[position_name]";

                  }
                  ?>
              </SELECT>
            </div>
            <!-- <div class="row mb-3">
              <label for="photo">Image </label>
              <div class="col-md-8 col-lg-9">
                <?php if ($row['photo'] == "") { ?>
                <img src="candidate_img/av.jpg" width="200" height="200">
                <?php } else { ?>
                <img src="candidate_img/<?php echo($row['photo']); ?>" width="200" height="200">
                <?php } ?>
              </div>
            </div> -->
            <div class="row mb-3">
              <label for="photo">Image Upload </label>
              <div class="col-md-8 col-lg-9">
                <input type="file" class="form-control" id="photo" name="photo"
                  value="<?php echo($row['photo']); ?>" />
              </div>
            </div>




          </div>
          <div class="container text-center">
            <input class="btn btn-primary" type="submit" name="Submit" value="Add" />
          </div>
    </div>

    <thead>
      <tr>
        <th scope="col">Candidate ID</th>
        <th scope="col">Candidate Name</th>
        <th scope="col">Candidate Position</th>
        <th scope="col">Candidate image</th>
        <th scope="col">Action</th>
      </tr>
      <?php
        
        $inc = 0;
        while ($row = mysqli_fetch_array($result)) {
          echo '</thead>';
          echo '<tbody>';
          echo '<tr>';
          echo "<td>" . $row['candidate_id'] . "</td>";
          echo "<td>" . $row['candidate_name'] . "</td>";
          echo "<td>" . $row['candidate_position'] . "</td>";
          echo "<td>" . $row['photo'] . "</td>";
          echo '<td><a class="text-danger" href="candidates.php?id=' . $row['candidate_id'] . '">Delete Candidate</a></td>';
          echo '</tr>';

          $inc++;
        }

        mysqli_free_result($result);
        mysqli_close($con);
        ?>

      </tbody>
      </table>

      </form>

  </div>
  </div>


  <?php include("include/scripts.php") ?>
</body>

</html>