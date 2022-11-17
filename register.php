<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets1/img/favicon.png" rel="icon">
  <link href="assets1/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets1/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets1/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets1/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets1/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets1/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets1/css/style.css" rel="stylesheet">
  <script language="JavaScript" src="js/user.js"></script>


</head>

<body>

  <?php
  require_once('connection.php');
  
  if (isset($_POST['submit'])) {

    $myFirstName = addslashes($_POST['firstname']);
    $myLastName = addslashes($_POST['lastname']);
    $myEmail = $_POST['email'];
    $myPassword = $_POST['password'];

    $newpass = md5($myPassword);

    $sql = mysqli_query($con, "INSERT INTO tbMembers(first_name, last_name, email,password) 
                VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass') ");

    die("<div class='container row col-lg-12 text-center'>
    <p class='text-center'>Congrats, You have successfully registered for an account on OVS.</p><br><p clas='text-center'>Click Here </p><a href=\"login.php\">Login</a></div>");
  } ?>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center my-0">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">OVS Registration</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center my-0 pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form action="register.php" method="post" onsubmit="return registerValidate(this)" class="row g-3 needs-validation" novalidate>
                    <div class="col-12 my-1">
                      <label for="yourName" class="form-label my-1">First Name</label>
                      <input type='text' class='form-control' name='firstname' maxlength='15' value='' required>
                      <div class="invalid-feedback">Please, enter your First name!</div>
                    </div>

                    <div class="col-12 my-1">
                      <label for="yourName" class="form-label">Last Name</label>
                      <input type='text' class='form-control' name='lastname' maxlength='15' value='' required>
                      <div class="invalid-feedback">Please, enter your First name!</div>
                    </div>

                    <div class="col-12 my-1">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type='email' class='form-control' name='email' maxlength='100' id='email' value='' required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <!-- <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div> -->

                    <div class="col-12 my-1">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type='password' class='form-control' name='password' maxlength='15' value='' required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12 my-1">
                      <label for="yourPassword" class="form-label">Confirm Password</label>
                      <input type='password' class='form-control' name='ConfirmPassword' maxlength='15' value='' required>
                      <div class="invalid-feedback">Please confirm your password!</div>
                    </div>

                    <div class="col-12 my-1">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12 my-1">
                      <input class="btn btn-primary w-100" type='submit' name='submit' value='Register Account'></input>
                    </div>
                    <div class="col-12 my-1">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>              

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets1/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets1/vendor/chart.js/chart.min.js"></script>
  <script src="assets1/vendor/echarts/echarts.min.js"></script>
  <script src="assets1/vendor/quill/quill.min.js"></script>
  <script src="assets1/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets1/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets1/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets1/js/main.js"></script>

  <script>
    $(document).ready(function() {

      $('#email').blur(function(event) {

        event.preventDefault();
        var emailId = $('#email').val();
        $.ajax({
          url: 'checkuser.php',
          method: 'post',
          data: {
            email: emailId
          },
          dataType: 'html',
          success: function(message) {
            $('#result').html(message);
          }
        });



      });

    });
  </script>

</body>

</html>