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
                            <li class="active">
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
                        <li>Cart</li>
                    </ul>
                </div> <!--col-md-12-->
                <div class="col-md-9" id="cart"> <!--col-md-9-->
                    <div class="box"> <!--box-->
                        <form action="cart.php" method="post" enctype="multipart/form-data">
                            <h1>Shopping Cart</h1>
                            <?php
                                $ip_add=getUserIp();
                                $select_cart="select * from cart where ip_add='$ip_add'";
                                $run_cart=mysqli_query($con,$select_cart);
                                $count=mysqli_num_rows($run_cart);
                            ?>
                            <p class="text-muted">Currently You have <?php echo $count; ?> item(s) in your cart</p>
                            <div class="table-responsive"> <!--table-responsive-->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Size</th>
                                            <th colspan="1">Delete</th>
                                            <th colspan="1">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $total=0;
                                            while ($row=mysqli_fetch_array($run_cart)) {
                                                $pro_id=$row['p_id'];
                                                $pro_size=$row['size'];
                                                $pro_qty=$row['qty'];

                                                $get_product="select * from products where product_id='$pro_id'";
                                                $run_pro=mysqli_query($con,$get_product);
                                                while ($row=mysqli_fetch_array($run_pro)) {
                                                    $p_title=$row['product_title'];
                                                    $p_img1=$row['product_img1'];
                                                    $p_price=$row['product_price'];
                                                    $sub_total=$row['product_price'] * $pro_qty;
                                                    $total += $sub_total;
                                                
                                        ?>
                                        <tr>
                                            <td><img src="admin_area/product_images/<?php echo $p_img1; ?>" alt=""></td>
                                            <td><?php echo $p_title; ?></td>
                                            <td><?php echo $pro_qty; ?></td>
                                            <td>BDT <?php echo $p_price; ?></td>
                                            <td><?php echo $pro_size; ?></td>
                                            <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                            <td>BDT <?php echo $sub_total; ?></td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">BDT <?php echo $total; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div> <!--table-responsive-->
                            <div class="box-footer"> <!--box-footer-->
                                <div class="pull-left"> <!--pull-left-->
                                    <a href="index.php" class="btn btn-default">
                                        <i class="fa fa-chevron-left"></i>Continue Shopping
                                    </a>
                                </div> <!--pull-left-->
                                <div class="pull-right"> <!--pull-right-->
                                    <button type="submit" class="btn btn-default" name="update" value="Update Cart">
                                        <i class="fa fa-refresh">Update Cart</i>
                                    </button>
                                    <a href="checkout.php" class="btn btn-primary">
                                        Procced to Checkout<i class="fa fa-chevron-right"></i>
                                    </a>
                                </div> <!--pull-right-->
                            </div> <!--box-footer-->
                        </form>
                    </div> <!--box-->
                    <?php
                        function update_cart(){
                            global $con;
                            if(isset($_POST['update'])){
                                foreach ($_POST['remove'] as $remove_id) {
                                    $delete_product="delete from cart where p_id='$remove_id'";
                                    $run_del=mysqli_query($con,$delete_product);
                                    if ($run_del) {
                                        echo "<script>window.open('cart.php','_self')</script>";
                                    }
                                }
                            }
                        }
                        echo @$up_cart=update_cart();
                    ?>
                    <div id="row same-height-row"> <!--row same-height-row-->
                        <div class="col-md-3 col-sm-6"> <!--col-md-3 col-sm-6-->
                            <div class="box same-height headline"> <!--box same-height headline-->
                                <h3 class="text-center">You also like these Products</h3>
                            </div> <!--box same-height headline-->
                        </div> <!--col-md-3 col-sm-6-->
                        <div class="center-responsive col-md-3"> <!--center-responsive col-md-3-->
                            <div class="product same-height"> <!--product same-height-->
                                <a href="">
                                <img src="admin_area/product_images/t-shirt.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="details.php">T-Shirts for Men</a></h3>
                                    <p class="price">BDT 250</p>
                                </div>
                            </div> <!--product same-height-->
                        </div> <!--center-responsive col-md-3-->
                        <div class="center-responsive col-md-3"> <!--center-responsive col-md-3-->
                            <div class="product same-height"> <!--product same-height-->
                                <a href="">
                                <img src="admin_area/product_images/t-shirt.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="details.php">T-Shirts for Men</a></h3>
                                    <p class="price">BDT 250</p>
                                </div>
                            </div> <!--product same-height-->
                        </div> <!--center-responsive col-md-3-->
                        <div class="center-responsive col-md-3"> <!--center-responsive col-md-3-->
                            <div class="product same-height"> <!--product same-height-->
                                <a href="">
                                <img src="admin_area/product_images/t-shirt.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="details.php">T-Shirts for Men</a></h3>
                                    <p class="price">BDT 250</p>
                                </div>
                            </div> <!--product same-height-->
                        </div> <!--center-responsive col-md-3-->
                    </div> <!--row same-height-row-->
                </div> <!--col-md-9-->
                <div class="col-md-3"> <!--col-md-3-->
                    <div class="box" id="order-summary"> <!--box|order-summary-->
                        <div class="box-header"> <!--box-header-->
                            <h3>Order Summary</h3>
                        </div> <!--box-header-->
                        <p class="text-muted">
                            Shipping and additional costs are calculated based on you have entered
                        </p>
                        <div class="table-responsive"> <!--table-responsive-->
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order Subtotal</td>
                                        <th>BDT <?php echo $total; ?></th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handiling</td>
                                        <td>BTD 0</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td>BDT 0</td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>BDT <?php echo $total; ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!--table-responsive-->
                    </div> <!--box|order-summary-->
                </div> <!--col-md-3-->
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