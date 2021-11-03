<?php
    session_start();
    if (!isset($_SESSION['customer_email'])) {
        echo "<script>window.open('../checkout.php','_self')</script>";
    } else {
    include("includes/db.php");
    include("functions/functions.php");
    if (isset($_GET['order_id'])) {
        $order_id=$_GET['order_id'];
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
                                <a href="../about.php">About Us</a>
                            </li>
                            <li>
                                <a href="../services.php">Services</a>
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
                    <div class="box"> <!--box-->
                        <h1 align="center">Please confirm your payment</h1>
                        <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Invoice Number:</label>
                                <input type="text" name="invoice_number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Amount:</label>
                                <input type="text" name="amount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>select Payment Mode:</label>
                                <select name="payment_mode" class="form-control">
                                    <option value="Bank transfer">Bank transfer</option>
                                    <option value="Paypal">Paypal</option>
                                    <option value="PayuMoney">PayuMoney</option>
                                    <option value="PayTM">PayTM</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Transection Number:</label>
                                <input type="text" name="trfr_number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>payment Date:</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                                    Confirm Payment
                                </button>
                            </div>
                        </form>
                        <?php
                        
                            if (isset($_POST['confirm_payment'])) {
                                $update_id=$_GET['update_id'];
                                $invoice_number=$_POST['invoice_number'];
                                $amount=$_POST['amount'];
                                $payment_mode=$_POST['payment_mode'];
                                $trfr_number=$_POST['trfr_number'];
                                $date=$_POST['date'];
                                $complete="Complete";

                                $insert="insert into payments (invoice_id,amount,payment_mode,ref_no,payment_date) values ('$invoice_number','$amount','$payment_mode','$trfr_number','$date')";
                                $run_insert=mysqli_query($con,$insert);

                                $update_q="update customer_order set order_status ='$complete' where order_id='$update_id'";
                                $run_cust_order=mysqli_query($con,$update_q);

                                // $update_p="update pending_order set order_status ='$complete' where order_id='$update_id'";
                                // $run_p=mysqli_query($con,$update_p);

                                echo "<script>alert('Your order has been received')</script>";
                                echo "<script>window.open('my_account.php?my_order','_self')</script>";
                            }

                        ?>
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
    }
?>