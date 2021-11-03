<?php
    session_start();
    include("includes/db.php");
    include("functions/functions.php");
?>
<?php
    if (isset($_GET['pro_id'])) {
        $pro_id=$_GET['pro_id'];
        $get_product="select * from products where product_id='$pro_id'";
        $run_product=mysqli_query($con,$get_product);
        $row_product=mysqli_fetch_array($run_product);

        $p_cat_id=$row_product['p_cat_id'];
        $p_title=$row_product['product_title'];
        $p_price=$row_product['product_price'];
        $p_desc=$row_product['product_desc'];
        $p_img1=$row_product['product_img1'];
        $p_img2=$row_product['product_img2'];
        $p_img3=$row_product['product_img3'];

        $get_p_cat="select * from product_category where p_cat_id='$p_cat_id'";
        $run_p_cat=mysqli_query($con,$get_p_cat);
        $row_p_cat=mysqli_fetch_array($run_p_cat);
        $p_cat_id=$row_p_cat['p_cat_id'];
        $p_cat_title=$row_p_cat['p_cat_title'];
    }
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
                        <li><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>">
                            <?php echo $p_cat_title; ?>
                        </a></li>
                        <li> <?php echo $p_title; ?> </li>
                    </ul>
                </div> <!--col-md-12-->
                <div class="col-md-3"> <!--sidebar/col-md-3-->
                    <?php
                        include("includes/sidebar.php");
                    ?>
                </div> <!--sidebar/col-md-3-->
                <div class="col-md-9"> <!--col-md-9-->
                    <div class="row" id="productmain"> <!--row-->
                        <div class="col-sm-6"> <!--col-sm-6|slider-->
                            <div id="mainimage"> <!--mainimage-->
                                <div id="mycarousel" class="carousel slide" data-ride="carousel"> <!--carousel-->
                                    <ol class="carousel-indicators">
                                        <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#mycarousel" data-slide-to="1"></li>
                                        <li data-target="#mycarousel" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner"> <!--carousel-inner-->
                                        <div class="item active">
                                            <center>
                                                <img src="admin_area/product_images/<?php echo $p_img1; ?>" alt="" style="width: 397.5px; height: 550px" class="img-responsive">
                                            </center>               
                                        </div>
                                        <div class="item">
                                            <center>
                                                <img src="admin_area/product_images/<?php echo $p_img2; ?>" alt="" style="width: 397.5px; height: 550px" class="img-responsive">
                                            </center>
                                        </div>
                                        <div class="item">
                                            <center>
                                                <img src="admin_area/product_images/<?php echo $p_img3; ?>" alt="" style="width: 397.5px; height: 550px" class="img-responsive">
                                            </center>
                                        </div>
                                    </div> <!--carousel-inner-->
                                    <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a href="#mycarousel" class="right carousel-control" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div> <!--carousel-->
                            </div> <!--mainimage-->
                        </div> <!--col-sm-6|slider-->
                        <div class="col-md-6"> <!--col-sm-6-->
                            <div class="box"> <!--box-->
                                <h1 class="text-center"><?php echo $p_title; ?></h1>
                                <?php
                                    addCart();
                                ?>
                                <form action="details.php?add_cart=<?php echo $pro_id; ?>" method="post" class="form-horizontal">
                                    <div class="form-group"> <!--form-group-->
                                        <label class="col-md-5 control-lebel">Product Quantity:</label>
                                        <div class="col-md-7"> <!--col-md-7-->
                                            <select name="product_qty" class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                 <option>5</option>
                                            </select>
                                        </div> <!--col-md-7-->
                                    </div> <!--form-group-->
                                    <div class="form-group"> <!--form-group-->
                                        <label class="col-md-5 control-lebel">Product Size:</label>
                                        <div class="col-md-7"> <!--col-md-7-->
                                            <select name="product_size" class="form-control">
                                                <option>Select a size</option>
                                                <option>Smail</option>
                                                <option>Medium</option>
                                                <option>Large</option>
                                                <option>Extra Large</option>
                                            </select>
                                        </div> <!--col-md-7-->
                                    </div> <!--form-group-->
                                    <p class="price">BDT <?php echo $p_price; ?></p>
                                    <p class="text-center buttons">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-shopping-cart"></i>Add To Cart
                                        </button>
                                    </p>
                                </form>
                            </div> <!--box-->
                            <div class="col-xs-4"> <!--col-xs-4-->
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $p_img1; ?>" alt="" class="img-responsive" id="d_t_img">
                                </a>
                            </div> <!--col-xs-4-->
                            <div class="col-xs-4"> <!--col-xs-4-->
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $p_img2; ?>" alt="" class="img-responsive" id="d_t_img">
                                </a>
                            </div> <!--col-xs-4-->
                            <div class="col-xs-4"> <!--col-xs-4-->
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $p_img3; ?>" alt="" class="img-responsive" id="d_t_img">
                                </a>
                            </div> <!--col-xs-4-->
                        </div> <!--col-sm-6-->
                    </div> <!--row-->
                    <div class="box" id="details"> <!--box|detais-->
                        <h4>Product details</h4>
                        <p><?php echo $p_desc; ?></p>
                        <h4>size</h4>
                        <ul>
                            <li>Smail</li>
                            <li>Medium</li>
                            <li>Large</li>
                            <li>Extra Large</li>
                        </ul>
                    </div> <!--box|details-->
                    <div id="row same-height-row"> <!--row same-height-row-->
                        <div class="col-md-3 col-sm-6"> <!--col-md-3 col-sm-6-->
                            <div class="box same-height headline"> <!--box same-height headline-->
                                <h3 class="text-center">You also like these Products</h3>
                            </div> <!--box same-height headline-->
                        </div> <!--col-md-3 col-sm-6-->
                        <?php
                            $get_product="select * from products order by 1 LIMIT 0,3";
                            $run_product=mysqli_query($con,$get_product);
                            while ($row=mysqli_fetch_array($run_product)) {
                                $pro_id=$row['product_id'];
                                $product_title=$row['product_title'];
                                $product_price=$row['product_price'];
                                $product_img1=$row['product_img1'];
                                echo "
                                    <div class='center-responsive col-md-3 col-sm-6'>
                                        <div class='product same-height'>
                                            <a href='details.php?pro_id=$pro_id'>
                                                <img src='admin_area/product_images/$product_img1' class='img-responsive' id='d_bottom_img'>
                                            </a>
                                            <div class='text'>
                                                <h3> <a href='details.php?pro_id=$pro_id'> $product_title </a> </h3>
                                                <p class='price'> BDT $product_price </p>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                        ?>
                    </div> <!--row same-height-row-->
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