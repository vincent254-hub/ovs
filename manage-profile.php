 <?php
session_start();
require('connection.php');


if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
} 

$result=mysqli_query($con, "SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {

 $stdId = $row['member_id'];
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
 $email = $row['email'];
 }
?>
<?php

if (isset($_POST['update'])){
$myId = addslashes( $_GET['id']);
$myFirstName = addslashes( $_POST['firstname'] ); 
$myLastName = addslashes( $_POST['lastname'] ); 
$myEmail = $_POST['email'];

$sql = mysqli_query($con,"UPDATE tbMembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail' WHERE member_id = '$myId'" );

// redirect back to profile
 header("Location: manage-profile.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <?php include('./include/header.php')?>
 <script language="JavaScript" src="js/admin.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
  <a class="nav-link " href="index.php">
    <i class="bi bi-grid"></i>
    <span>Profile</span>
  </a>
</li><!-- End Dashboard Nav -->
  <?php include('./include/components.php') ?>
<!-- End Components Nav -->
  <?php include('./include/forms.php')?>
<!-- End Forms Nav -->
  <?php include('./include/tables.php')?>
<!-- End Tables Nav -->
      <?php include('./include/charts.php')?>
<!-- End Charts Nav -->
      <?php include('./include/icons.php')?>
<!-- End Icons Nav -->
      <?php include('./include/pages.php') ?>
<!-- End Pages Nav -->

</ul>

  </aside><!-- End Sidebar-->


<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card m-2">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="./admin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
          <h2 class="d-flex"><?php echo $firstName ?></p> &nbsp;<p><?php echo $lastName ?>
                </h2>
          <h3>Voter</h3>
          <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item ">
              <button class="nav-link disabled" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="card-title">About</h5>
              <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8 d-flex">
                    <p><?php echo $firstName ?></p> &nbsp;<p><?php echo $lastName ?></p>
                </div>
              </div>

              

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8"><?php echo $email?></div>
              </div>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form action="manage-admins.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <img src="./admin/assets/img/profile-img.jpg" alt="Profile">
                    <div class="pt-2">
                      <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                      <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="firstName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" class="form-control"  name="firstname" maxlength="15" value="<?php echo $firstName ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="lastname" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" class="form-control" name="lastname" maxlength="15" value="<?php echo $lastName ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" class="form-control" name="email" maxlength="100" value="<?php echo $email?>">
                  </div>
                </div>

                
                <div class="text-center">
                  <input class="btn btn-warning" type="submit" name="update" value="Update Account">
                </div>
              </form><!-- End Profile Edit Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-settings">

              <!-- Settings Form -->
              <!-- <form>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="changesMade" checked>
                      <label class="form-check-label" for="changesMade">
                        Changes made to your account
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newProducts" checked>
                      <label class="form-check-label" for="newProducts">
                        Information on new products and services
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="proOffers">
                      <label class="form-check-label" for="proOffers">
                        Marketing and promo offers
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                      <label class="form-check-label" for="securityNotify">
                        Security alerts
                      </label>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form>End settings Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form action="changepass.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onSubmit="return updateProfile(this)">

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input class="form-control" type="password"  name="oldpass" maxlength="15" value="">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="password"  name="newpass" maxlength="15" value="" class="form-control" id="newPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="password" class="form-control" name="confpass" maxlength="15" value="">
                  </div>
                </div>

                <div class="text-center">
                <input class="btn btn-primary" type="submit" name="update" value="Update Account">
                </div>
              </form><!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->

<?php include('include/footer.php')?>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.min.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>