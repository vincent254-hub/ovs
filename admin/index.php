<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('include/header.php')?>
</head>

<body>

  <!-- ======= Header ======= -->
  

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
    

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Links</h6>
                    </li>

                    <li><a class="dropdown-item" href="index.php">Dashboard</a></li>
                    <li><a class="dropdown-item" href="positions.php">Candidate positions</a></li>
                    <li><a class="dropdown-item" href="candidates.php">Manage CAndidates</a></li>
                    <li><a class="dropdown-item" href="refresh.php">Tally results</a></li>
                    <li><a class="dropdown-item" href="manage-admins.php">Account</a></li>
                    <li><a class="dropdown-item" href="change-pass.php">Account</a></li>
                    <?php
                        if(!empty($_SESSION['member_id'])){
                        echo'<li><a href="logout.php">Logout</a></li> ';
                            } 
      
                            ?>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Important<span>| Links</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box-arrow-up-right"></i>
                    </div>
                    <div class="ps-3">
                      <!-- <h6>145</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Votes results</h6>
                    </li>                    
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Votes <span>| Results</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div>
                    <div class="ps-3">
                        <p class="m-1">Votes Count</p>
                      <div class="container">

                         <?php include('include/countfile.php') ?>


                      <span><h3><?php echo($totalvotes)?></h3></span>
                      </div>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

               </div>
            </div>
            <!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <!-- <div class="filter">
                  
                </div> -->

                <div class="card-body">
                  <h5 class="card-title"><span>| KWUST Comrades Decide</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo(date('Y'))?></h6>
                      <span class="text-danger small pt-1 fw-bold">100%</span> <span class="text-muted small pt-2 ps-1">Turnout</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  
                </div>

                <div class="card-body">
                  <h5 class="card-title">Updates <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <?php include('refresh.php')?>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->
          
         <div class="">
         <div>
            <!-- manage candidates -->
                      <?php include('candidates.php') ?>
                    <!-- End candidates -->
          </div>
          <div>
            <!-- positions -->
                      <?php include('positions.php') ?>
                    <!-- End positions -->
          </div>
         </div>

        </div>
        </div>
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <!-- End Website Traffic -->

          <!-- News & Updates Traffic -->
          <!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <div class="">
  <?php include('include/footer.php') ?>
  </div>
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