<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background: black;">
    <div class="navbar-header"> <!--navbar-header-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php?dashboard" class="navbar-brand"> Admin Panel </a>
    </div> <!--navbar-header-->
    <ul class="nav navbar-right top-nav"> <!--nav navbar-right top-nav-->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> 
                <?php echo $admin_name; ?>
            </a>
            <ul class="dropdown-menu"> <!--dropdown-menu-->
                <li>
                    <a href="index.php?user_profile?id=<?php echo $admin_id; ?>">
                        <i class="fa fa-user"></i> Profile
                    </a>
                </li>
                <li>
                    <a href="index.php?view_product">
                        <i class="fa fa-envelope"></i> Products
                        <span class="badge"><?php echo $count_pro; ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customer">
                        <i class="fa fa-users"></i> Customer
                        <span class="badge"><?php echo $count_cust; ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?pro_cat">
                        <i class="fa fa-gear"></i> Product Categories
                        <span class="badge"><?php echo $count_p_cat; ?></span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">Logout
                        <i class="fa fa-power-off"></i>
                    </a> 
                </li>
            </ul> <!--dropdown-menu-->
        </li>
    </ul> <!--nav navbar-right top-nav-->
    <div class="collapse navbar-collapse navbar-ex1-collapse"> <!--collapse navbar-ex1-collapse navbar-collapse-->
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-dashboard"></i> Dashboard
                </a>
            </li>
            <li> <!--Product dropdown-->
                <a href="#" data-toggle="collapse" data-target="#products">
                    <i class="fa fa-table"></i> Product <i class="fa fa-caret-down"></i>
                </a>
                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_product">Insert Product</a>
                    </li>
                    <li>
                        <a href="index.php?view_product">View Product</a>
                    </li>
                </ul>
            </li> <!--Product dropdown-->

            <li> <!--Product dropdown-->
                <a href="#" data-toggle="collapse" data-target="#product_cat">
                    <i class="fa fa-table"></i> Product Categories <i class="fa fa-caret-down"></i>
                </a>
                <ul id="product_cat" class="collapse">
                    <li>
                        <a href="index.php?insert_product_cat">Insert Product Categories</a>
                    </li>
                    <li>
                        <a href="index.php?view_product_cat">View Product Categories</a>
                    </li>
                </ul>
            </li> <!--Product dropdown-->

            <li> <!--Product dropdown-->
                <a href="#" data-toggle="collapse" data-target="#category">
                    <i class="fa fa-table"></i> Categories <i class="fa fa-caret-down"></i>
                </a>
                <ul id="category" class="collapse">
                    <li>
                        <a href="index.php?insert_categories">Insert Categories</a>
                    </li>
                    <li>
                        <a href="index.php?view_categories">View Categories</a>
                    </li>
                </ul>
            </li> <!--Product dropdown-->

            <li> <!--Product dropdown-->
                <a href="#" data-toggle="collapse" data-target="#slider">
                    <i class="fa fa-table"></i> Slider <i class="fa fa-caret-down"></i>
                </a>
                <ul id="slider" class="collapse">
                    <li>
                        <a href="index.php?insert_slider">Insert Slider</a>
                    </li>
                    <li>
                        <a href="index.php?view_slider">View Slider</a>
                    </li>
                </ul>
            </li> <!--Product dropdown-->

            <li>
                <a href="index.php?view_customer">
                    <i class="fa fa-edit"></i> View Customer
                </a>
            </li>
            <li>
                <a href="index.php?view_order">
                    <i class="fa fa-list"></i> View Order
                </a>
            </li>
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-pencil"></i> View Payments
                </a>
            </li>

            <li> <!--Product dropdown-->
                <a href="#" data-toggle="collapse" data-target="#users">
                    <i class="fa fa-table"></i> Users <i class="fa fa-caret-down"></i>
                </a>
                <ul id="users" class="collapse">
                    <li>
                        <a href="index.php?insert_user">Insert User</a>
                    </li>
                    <li>
                        <a href="index.php?view_user">View User</a>
                    </li>
                    <li>
                        <a href="index.php?user_profile=<?php echo $admin_id; ?>">Edit Profile</a>
                    </li>
                </ul>
            </li> <!--Product dropdown-->
        </ul>
    </div> <!--collapse navbar-ex1-collapse navbar-collapse-->
</nav>
<?php
    }
?>