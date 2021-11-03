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
                            <li class="active">
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
        <div class="container" id="slider">
            <div class="col-md-12">
                <div class="carousel slide" id="myCarousel" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner"> <!--carousel-inner-->
                        <?php
                            $get_slider= "select * from slider LIMIT 0,1";
                            $run_slider= mysqli_query($con,$get_slider);
                            while ($row=mysqli_fetch_array($run_slider)) {
                                $slider_name=$row['slider_name'];
                                $slider_image=$row['slider_image'];
                                echo "
                                    <div class='item active'>
                                        <img src='admin_area/sliders_images/$slider_image'  width='1200px' height='563px'>
                                    </div>
                                ";
                            }
                        ?>
                        <?php
                            $get_slider="select * from slider LIMIT 1,3";
                            $run_slider= mysqli_query($con,$get_slider);
                            while ($row=mysqli_fetch_array($run_slider)) {
                                $slider_name=$row['slider_name'];
                                $slider_image=$row['slider_image'];
                                echo "
                                    <div class='item'>
                                        <img src='admin_area/sliders_images/$slider_image'  width='1200px' height='563px'>
                                    </div>
                                ";
                            }
                        ?>
                    </div> <!--carousel-inner-->
                    <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#myCarousel" class="right carousel-control" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div id="advantage"> <!-- advantage-->
            <div class="container">
                <div class="some-height-row">
                    <div class="col-sm-4">
                        <div class="box some-height">
                            <div class="icon">
                                <i class="fa fa-heart"></i>
                            </div>
                            <h3> <a href="#">BEST PRICES</a> </h3>
                            <p>You can check on all others sites about the prices and than compare with us.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box some-height">
                            <div class="icon">
                                <i class="fa fa-heart"></i>
                            </div>
                            <h3> <a href="#">100% SATISFACTION QUANTEED FROM US</a> </h3>
                            <p>Free returns on everything for 3 months.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box some-height">
                            <div class="icon">
                                <i class="fa fa-heart"></i>
                            </div>
                            <h3> <a href="#">WE LOVE OUR CUSTOMERS</a> </h3>
                            <p>We are known to provide best possible service ever</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- advantage-->
        <div id="hot"> <!-- Latest this week -->
            <div class="box">
                <div class="container">
                    <div class="col-md-12">
                        <h2>Latest this week</h2>
                    </div>
                </div>
            </div>
        </div> <!-- Latest this week -->
        <div id="content" class="container">
            <div class="row">
                <?php
                    getPro();
                ?>
            </div>
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