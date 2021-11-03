<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>
<div class="row"> <!--row 1-->
    <div class="col-lg-12">
        <h1 class="page-header"> Dashboard </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div> <!--row 1-->

<div class="row"> <!--row 2-->
    <div class="col-lg-3 col-md-6"> <!--col-lg-3 col-md-6-->
        <div class="panel panel-primary"> <!--panel panle-primary-->
            <div class="panel-heading"> <!--panel-heading-->
                <div class="row"> <!--panel-row-->
                    <div class="col-xs-3"> <!--col-xs-3-->
                        <i class="fa fa-tasks fa-5x"></i>
                    </div> <!--col-xs-3-->
                    <div class="col-xs-9 text-right"> <!--col-xs-9 text-right-->
                        <div class="huge"> <?php echo $count_pro; ?> </div>
                        <div>Products</div>
                    </div> <!--col-xs-9 text-right-->
                </div> <!--panel-row-->
            </div> <!--panel-heading-->
            <a href="index.php?view_product">
                <div class="panel-footer"> <!--panel-footer-->
                    <span class="puul-left"> View Details </span>
                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                    <div class="clearfix"></div>
                </div> <!--panel-footer-->
            </a>
        </div> <!--panel panle-primary-->
    </div> <!--col-lg-3 col-md-6-->

    <div class="col-lg-3 col-md-6"> <!--col-lg-3 col-md-6-->
        <div class="panel panel-green"> <!--panel panle-primary-->
            <div class="panel-heading"> <!--panel-heading-->
                <div class="row"> <!--panel-row-->
                    <div class="col-xs-3"> <!--col-xs-3-->
                        <i class="fa fa-comments fa-5x"></i>
                    </div> <!--col-xs-3-->
                    <div class="col-xs-9 text-right"> <!--col-xs-9 text-right-->
                        <div class="huge"> <?php echo $count_cust; ?> </div>
                        <div> Customer </div>
                    </div> <!--col-xs-9 text-right-->
                </div> <!--panel-row-->
            </div> <!--panel-heading-->
            <a href="index.php?view_customer">
                <div class="panel-footer"> <!--panel-footer-->
                    <span class="puul-left"> View Details </span>
                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                    <div class="clearfix"></div>
                </div> <!--panel-footer-->
            </a>
        </div> <!--panel panle-primary-->
    </div> <!--col-lg-3 col-md-6-->
    
    <div class="col-lg-3 col-md-6"> <!--col-lg-3 col-md-6-->
        <div class="panel panel-yellow"> <!--panel panle-primary-->
            <div class="panel-heading"> <!--panel-heading-->
                <div class="row"> <!--panel-row-->
                    <div class="col-xs-3"> <!--col-xs-3-->
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div> <!--col-xs-3-->
                    <div class="col-xs-9 text-right"> <!--col-xs-9 text-right-->
                        <div class="huge"> <?php echo $count_p_cat; ?> </div>
                        <div>Product categories</div>
                    </div> <!--col-xs-9 text-right-->
                </div> <!--panel-row-->
            </div> <!--panel-heading-->
            <a href="index.php?view_product_cat">
                <div class="panel-footer"> <!--panel-footer-->
                    <span class="puul-left"> View Details </span>
                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                    <div class="clearfix"></div>
                </div> <!--panel-footer-->
            </a>
        </div> <!--panel panle-primary-->
    </div> <!--col-lg-3 col-md-6-->

    <div class="col-lg-3 col-md-6"> <!--col-lg-3 col-md-6-->
        <div class="panel panel-red"> <!--panel panle-primary-->
            <div class="panel-heading"> <!--panel-heading-->
                <div class="row"> <!--panel-row-->
                    <div class="col-xs-3"> <!--col-xs-3-->
                        <i class="fa fa-support fa-5x"></i>
                    </div> <!--col-xs-3-->
                    <div class="col-xs-9 text-right"> <!--col-xs-9 text-right-->
                        <div class="huge"> <?php echo $count_order; ?> </div>
                        <div>Orsers</div>
                    </div> <!--col-xs-9 text-right-->
                </div> <!--panel-row-->
            </div> <!--panel-heading-->
            <a href="index.php?view_order">
                <div class="panel-footer"> <!--panel-footer-->
                    <span class="puul-left"> View Details </span>
                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                    <div class="clearfix"></div>
                </div> <!--panel-footer-->
            </a>
        </div> <!--panel panle-primary-->
    </div> <!--col-lg-3 col-md-6-->
</div> <!--row 2-->

<div class="row"> <!--row 3-->
    <div class="col-lg-8"> <!--col-lg-8-->
        <div class="panel panel-primary"> <!--panel panel-primary-->
            <div class="panel-heading"> <!--panel-heading-->
                <h3 class="panel-title"> <!--panel-title-->
                    <i class="fa fa-money"></i> New Orders
                </h3> <!--panel-title-->
            </div> <!--panel-heading-->
            <div class="panel-body"> <!--panel-body-->
                <div class="table-responsive"> <!--table-responsive-->
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Customer Email</th>
                                <th>Invoice No</th>
                                <th>Product ID</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                $i=0;
                                $get_order="select * from customer_order order by 1 DESC LIMIT 0,5";
                                $run_order=mysqli_query($con,$get_order);
                                while ($row_order=mysqli_fetch_array($run_order)) {
                                    $order_id=$row_order['order_id'];
                                    $customer_id=$row_order['customer_id'];
                                    $product_id=$row_order['product_id'];
                                    $invoice_no=$row_order['invoice_no'];
                                    $qty=$row_order['qty'];
                                    $size=$row_order['size'];
                                    $status=$row_order['order_status'];
                                    $i++;
                                
                            ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td>
                                    <?php
                                        $get_cust="select * from customers where customer_id='$customer_id'";
                                        $run_cust=mysqli_query($con,$get_cust);
                                        $row_customer=mysqli_fetch_array($run_cust);
                                        $customer_email=$row_customer['customer_email'];
                                        echo $customer_email;
                                    ?>
                                </td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $product_id; ?> </td>
                                <td> <?php echo $qty; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $status; ?> </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div> <!--table-responsive-->
                <div class="text-right"> <!--text-right-->
                    <a href="index.php?view_order">
                        View All Orders <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div> <!--text-right-->
            </div> <!--panel-body-->
        </div> <!--panel panel-primary-->
    </div> <!--col-lg-8-->

    <div class="col-md-4"> <!--col-md-4-->
        <div class="panel"> <!--panel-->
            <div class="panel-body"> <!--panel-body-->
                <div class="thumb-info mb-md"> <!--thumb-info mb-md-->
                    <img src="admin_images/<?php echo $admin_image; ?>" alt="" class="img-rounded img-responsive">
                    <div class="thumb-info-title"> <!--thumb-info-title-->
                        <span class="thumb-info-inner"><?php echo $admin_name; ?></span>
                        <span class="thumb-info-type"><?php echo $admin_job; ?></span>
                    </div> <!--thumb-info-title-->
                </div> <!--thumb-info mb-md-->
                <div class="mb-md"> <!--mb-md-->
                    <div class="widget-content-expanded"> <!--widget-content-expanded-->
                        <i class="fa fa-user"></i> <span>Email:</span> <?php echo $admin_email; ?> <br>
                        <i class="fa fa-user"></i> <span>Country:</span> <?php echo $admin_country; ?> <br>
                        <i class="fa fa-user"></i> <span>Contact:</span> <?php echo $admin_contact; ?> <br>
                    </div> <!--widget-content-expanded-->
                    <hr class="dotted short">
                    <h5 class="text-muted">About</h5>
                    <p>
                    <?php echo $admin_about; ?>
                    </p>
                </div> <!--mb-md-->
            </div> <!--panel-body-->
        </div> <!--panel-->
    </div> <!--col-md-4-->
</div> <!--row 3-->


<?php
    }
?>