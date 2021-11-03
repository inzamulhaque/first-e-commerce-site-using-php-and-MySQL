<?php
    session_start();
    if (!isset($_SESSION['customer_email'])) {
        echo "<script>window.open('../checkout.php','_self')</script>";
    } else {
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
                    <a href="#" class="btn btn-success btn-sm">Welcome Guest</a>
                    <a href="#">Shopping Cart Total Price: BDT 100, Total Items 2</a>
                </div> <!-- col-md-6 offer End -->
                <div class="col-md-6">
                    <ul class="menu">
                        <li>
                            <a href="../coustomer_registration.php"> Registrer </a>
                        </li>
                        <li>
                            <a href="my_account.php"> My Account </a>
                        </li>
                        <li>
                            <a href="../cart.php"> Goto cart </a>
                        </li>
                        <li>
                            <?php
                                if (!isset($_SESSION['customer_email'])) {
                                    echo "<a href='../checkout.php'> Login </a>";
                                } else {
                                    echo "<a href='../logout.php'> Logout </a>";
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
                    <a href="../index.php" class="navbar-brand home">
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
                            <li>
                                <a href="../index.php">Home</a>
                            </li>
                            <li>
                                <a href="../shop.php">Shop</a>
                            </li>
                            <li  class="active">
                                <a href="my_account.php">My Account</a>
                            </li>
                            <li>
                                <a href="../cart.php"> Shopping Cart </a>
                            </li>
                            <li>
                                <a href="../contactus.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <a href="cart.php" class="btn btn-primary navbar-btn right">
                        <i class="fa fa-shopping-cart"></i>
                        <span>4 Items In Cart</span>
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
                        <li>My Account</li>
                    </ul>
                </div> <!--col-md-12-->
                <div class="col-md-3"> <!--sidebar/col-md-3-->
                    <?php
                        include("includes/sidebar.php");
                    ?>
                </div> <!--sidebar/col-md-3-->
                <div class="col-md-9"> <!--col-md-9-->
                    <!--including My Order Page-->
                    <?php
                        if(isset($_GET['my_order'])){
                            include("my_order.php");
                        }
                    ?>
                    <!--including My Order Page-->

                    <!--including Payoffline Page-->
                    <?php
                        if(isset($_GET['pay_offline'])){
                            include("pay_offline.php");
                        }
                    ?>
                    <!--including Payoffline Page-->

                    <!--including Edit Account Page-->
                    <?php
                        if(isset($_GET['edit_act'])){
                            include("edit_act.php");
                        }
                    ?>
                    <!--including Edit Account Page-->

                    <!--including Change Password Page-->
                    <?php
                        if(isset($_GET['change_pass'])){
                            include("change_password.php");
                        }
                    ?>
                    <!--including Change Password Page-->

                    <!--including delete Account Page-->
                    <?php
                        if(isset($_GET['delete_ac'])){
                            include("delete_ac.php");
                        }
                    ?>
                    <!--including Delete Account Page-->
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
    }
?>