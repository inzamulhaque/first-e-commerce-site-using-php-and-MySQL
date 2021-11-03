<?php
    session_start();
    include("includes/db.php");
    include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>E Commerce Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- my style -->
        <link rel="stylesheet" href="styles/style.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <!-- Top Bar Start -->
        <div id="top">
            <div class="container"> <!-- Container Start -->
                <div class="col-md-6 offer"> <!-- col-md-6 offer Start -->
                    <a href="#" class="btn btn-success btn-sm">
                        <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "Welcome Guest";
                            } else {
                                echo "Welcome: " .$_SESSION['customer_email']."";
                            }
                        ?>
                    </a>
                    <a href="#">Shopping Cart Total Price: BDT <?php totalPrice(); ?>, Total Items <?php item(); ?></a>
                </div> <!-- col-md-6 offer End -->
                <div class="col-md-6">
                    <ul class="menu">
                        <li>
                            <a href="coustomer_registration.php"> Registrer </a>
                        </li>
                        <li>
                                <?php
                                    if (!isset($_SESSION['customer_email'])) {
                                        echo "<a href='checkout.php'> My Account </a>";
                                    } else {
                                        echo "<a href='coustomer/my_account.php?my_order'> My Account </a>";
                                    }
                                ?>
                        </li>
                        <li>
                            <a href="cart.php"> Goto cart </a>
                        </li>
                        <li>
                            <?php
                                if (!isset($_SESSION['customer_email'])) {
                                    echo "<a href='checkout.php'> Login </a>";
                                } else {
                                    echo "<a href='logout.php'> Logout </a>";
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div> <!-- Container End -->
        </div>
        <!-- Top Bar End -->

        <!-- Navbar Strat -->
        <div class="navbar navbar-default" id="navbar">
             <div class="container">
                <div class="navabr-hrader"> <!-- Navbar Header -->
                    <a href="index.php" class="navbar-brand home">
                        <img height="30px" width="40px" src="images/flooop.png" alt="" class="hidden-xs">
                        <img height="30px" width="40px" src="images/download.png" alt="" class="visible-xs">
                    </a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle Navgationi</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only"></span>
                        <i class="fa fa-search"></i>
                    </button>
                </div> <!-- Navbar Header -->
                <div class="navbar-collapse collapse" id="navigation"> <!-- Navbar Collapse -->
                    <div class="padding-nav">
                        <ul class="nav navbar-nav navbar-lrft">
                            <li  class="active">
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="shop.php">Shop</a>
                            </li>
                            <li>
                                <?php
                                    if (!isset($_SESSION['customer_email'])) {
                                        echo "<a href='checkout.php'> My Account </a>";
                                    } else {
                                        echo "<a href='coustomer/my_account.php?my_order'> My Account </a>";
                                    }
                                ?>
                            </li>
                            <li>
                                <a href="cart.php"> Shopping Cart </a>
                            </li>
                            <li>
                                <a href="contactus.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <a href="cart.php" class="btn btn-primary navbar-btn right">
                        <i class="fa fa-shopping-cart"></i>
                        <span><?php item(); ?> Items In Cart</span>
                    </a>
                    <div class="navbar-collapse collapse right">
                        <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                            <span class="sr-only">Toggle Search</span>
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <div class="collapse clearfix" id="search">
                        <form action="result.php" class="navbar-form" method="GET">
                            <div class="input-group">
                                <input type="text" name="user_query"  placeholder="Search" class="form-control" require>
                                <span class="input-group-btn">
                                    <button type="submit" value="Search" name="search" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div> <!-- Navbar Collapse -->
             </div>
        </div>

        <div id="content">
            <div class="container"> <!--container-->
                <div class="col-md-12"> <!--col-md-12-->
                    <ul class="breadcrumb">
                        <li><a href="home.php">Home</a></li>
                        <li>Registration</li>
                    </ul>
                </div> <!--col-md-12-->
                <div class="col-md-3"> <!--sidebar/col-md-3-->
                    <?php
                        include("includes/sidebar.php");
                    ?>
                </div> <!--sidebar/col-md-3-->
                <div class="col-md-9"> <!--col-md-9-->
                    <div class="box"> <!--box-->
                        <div class="box-header"> <!--box-header-->
                            <center>
                                <h2>Coustomer Registration</h2>
                            </center>
                        </div> <!--box-header-->
                        <form action="coustomer_registration.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Coustomer Name:</label>
                                <input type="text" name="c_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Coustomer Email:</label>
                                <input type="text" name="c_email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Coustomer Password:</label>
                                <input type="password" name="c_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Country:</label>
                                <input type="text" name="c_country" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>City:</label>
                                <input type="text" name="c_city" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Contact Number:</label>
                                <input type="text" name="c_contact" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <input type="text" name="c_address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Image:</label>
                                <input type="file" name="c_image" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    <i class="fa fa-user-md"></i> Register
                                </button>
                            </div>
                        </form>
                    </div> <!--box-->
                </div> <!--col-md-9-->
            </div> <!--container-->
        </div>

        <!-- Footer Start -->
        <?php
            include("includes/footer.php");
        ?>
        <!-- Footer end -->

        <!-- Navbar End -->
        <!-- JS -->
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>

<?php

    if (isset($_POST['submit'])) {
        $c_name=$_POST['c_name'];
        $c_email=$_POST['c_email'];
        $c_password=$_POST['c_password'];
        $c_country=$_POST['c_country'];
        $c_city=$_POST['c_city'];
        $c_contact=$_POST['c_contact'];
        $c_address=$_POST['c_address'];
        $c_image=$_FILES['c_image']['name'];
        $c_tmp_image=$_FILES['c_image']['tmp_name'];
        $c_ip=getUserIp();

        move_uploaded_file($c_tmp_image,"coustomer/coustomer_images/$c_image");
        $insert_customer="insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
        $run_customer=mysqli_query($con,$insert_customer);

        $sel_cart="select * from cart where ip_add='$c_ip'";
        $run_cart=mysqli_query($con,$sel_cart);
        $check_cart=mysqli_num_rows($run_cart);
        if ($check_cart>0) {
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('You have been registred successfully')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        } else {
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('You have been registred successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }

?>