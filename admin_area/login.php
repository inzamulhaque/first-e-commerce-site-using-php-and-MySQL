<?php
    session_start();
    include("includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
    <div class="container"> <!--container-->
        <form class="form-login" action="" method="post">
            <h2 class="form-login-heading">Admin Login</h2>
            <input type="text" name="admin_email" class="form-control" placeholder="Enter Your Email" required>
            <input type="password" name="admin_pass" class="form-control" placeholder="Enter Your Password" required>
            <button type="submit" name="admin_login" class="btn btn-primary btn-lg btn-block">
                Login
            </button>
            <h4 class="forgot-password">
                <a href="forgot_password.php"> Lost your password? Forgot Password </a>
            </h4>
        </form>
    </div> <!--container-->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php

    if (isset($_POST['admin_login'])) {
        $admin_email=mysqli_real_escape_string($con,$_POST['admin_email']);
        $admin_pass=mysqli_real_escape_string($con,$_POST['admin_pass']);
        $get_admin="select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
        $run_admin=mysqli_query($con,$get_admin);
        $count=mysqli_num_rows($run_admin);
        if ($count==1) {
            $_SESSION['admin_email']=$admin_email;
            echo "<script>alert('You are Logged')</script>";
            echo "<script>window.open('index.php?dashboard','_self')</script>";
        } else {
            echo "<script>alert('Your Email/Password Wrong')</script>";
        }
    }

?>