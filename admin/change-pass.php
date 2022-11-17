<?php
session_start();
require('../connection.php');
?>
<html>

<head>

    <?php include('include/header.php') ?>

    <script language="JavaScript" src="js/admin.js">
    </script>
</head>

<body>

    <div id="container">
        <?php

        if (empty($_SESSION['admin_id'])) {
            header("location:access-denied.php");
        }


        $result = mysqli_query($con, "SELECT * FROM tbadministrators WHERE admin_id = '$_SESSION[admin_id]'");
        if (mysqli_num_rows($result) < 1) {
            $result = null;
        }
        $row = mysqli_fetch_array($result);
        if ($row) {

            $encPass = $row['password'];
        }


        if (isset($_GET['id']) && isset($_POST['update'])) {
            $myId = addslashes($_GET['id']);
            $mypassword = md5($_POST['oldpass']);
            $newpass = $_POST['newpass'];
            $confpass = $_POST['confpass'];
            if ($encPass == $mypassword) {
                if ($newpass == $confpass) {
                    $newpass = md5($newpass);
                    $sql = mysqli_query($con, "UPDATE tbadministrators SET password='$newpass' WHERE admin_id = '$myId'");
                    echo "<script>alert('Your passwords have been updated Successfully');</script>";
                } else {
                    echo "<script>alert('Your new password and confirm password didnt match');</script>";
                }
            } else {
                echo "<script>alert('Your passwords  didnt match');</script>";
            }

        }
        ?>
        <div class="container mt-4 text-center">
            <div class="row">
                <div class="col-lg-12">
                    <form action="change-pass.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post"
                        onSubmit="return updateProfile(this)">
                        <label class="text-center" style="margin-top: 50px;" for="">Change Your Passwords</label>

                        <div class="col-12 my-3">
                            <label for="" card="form-label">Enter Previous Password</label>
                            <div class="form-control">
                                <input type="password" class="form-control" name="oldpass" value="">
                            </div>
                        </div>

                   

                        <div class="col-12 my-3">
                            <label for="">Enter New password</label>
                            <div class="form-control">
                                <input type="password" class="form-control" name="newpass" value="">
                            </div>
                        </div>

                        <div class="col-12 my-3">
                            <label for="">Confirm password</label>
                            <div class="form-control">
                                <input type="password" class="form-control" name="confpass" value="">
                            </div>
                        </div>

                        <div class="container my-3">
                            <input type="submit" name="update" value="Update Password">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
</body>

</html>