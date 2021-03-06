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
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li class="active">
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
                        <li>Shop</li>
                    </ul>
                </div> <!--col-md-12-->
                <div class="col-md-3"> <!--sidebar/col-md-3-->
                    <?php
                        include("includes/sidebar.php");
                    ?>
                </div> <!--sidebar/col-md-3-->
                <div class="col-md-9"> <!--col-md-9-->
                    <?php
                        if (!isset($_GET['p_cat'])) {

                            if (!isset($_GET['cat_id'])) {
                                echo "<div class='box'>
                                    <h1>Shop</h1>
                                    <p>This theme is created by MD IH Alif, Who is the instructor if innstitute of computer scince & research sohawal, Ayodhya</p>
                                </div>";
                            }

                        }
                    ?>
                    <div class="row"> <!--row-->
                        <?php
                            if (!isset($_GET['p_cat'])) {
                                
                                if (!isset($_GET['cat_id'])) {
                                    $per_page=6;
                                    if (isset($_GET['page'])) {
                                        $page=$_GET['page'];
                                    } else {
                                        $page=1;
                                    }
                                    $start_from=($page-1) * $per_page;
                                    $get_product="select * from products order by 1 DESC LIMIT $start_from, $per_page";
                                    $run_pro=mysqli_query($con,$get_product);
                                    while ($row=mysqli_fetch_array($run_pro)) {
                                        $pro_id=$row['product_id'];
                                        $pro_title=$row['product_title'];
                                        $pro_price=$row['product_price'];
                                        $pro_img1=$row['product_img1'];

                                        echo "<div class='col-md-4 col-sm-6 center-responsive'>
                                                <div class='product'>
                                                    <a href='details.php?pro_id=$pro_id'>
                                                        <img src='admin_area/product_images/$pro_img1' class='img-responsive' id='pro_img'>
                                                    </a>
                                                    <div class='text'>
                                                        <h3><a href='details.php?pro_id=$pro_id'> $pro_title </a></h3>
                                                        <p class='price'> BDT $pro_price </p>
                                                        <p class='buttons'>
                                                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'> View Details </a>
                                                            <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                                                <i class='fa fa-shopping-cart'></i> Add To Cart
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>";
                                    }
                                
                        ?>
                    </div> <!--row-->
                    <center>
                        <ul class="pagination">
                            <?php
                                    $query="select * from products";
                                    $result=mysqli_query($con,$query);
                                    $total_record=mysqli_num_rows($result);
                                    $total_pages=ceil($total_record / $per_page);
                                    echo "
                                        <li> <a href='shop.php?page=1'> ".'First Page'." </a> </li>
                                    ";
                                    for ($i=1; $i <= $total_pages; $i++) { 
                                        echo "
                                            <li> <a href='shop.php?page=".$i."'> ".$i." </a> </li>
                                        ";
                                    };
                                    echo "
                                        <li> <a href='shop.php?page=$total_pages'> ".'Last Page'." </a> </li>
                                    ";
                                }

                            }
                            ?>
                        </ul>
                    </center>
                    
                        <?php
                            getPcatPro();
                            getCatPro();
                        ?>
                    
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