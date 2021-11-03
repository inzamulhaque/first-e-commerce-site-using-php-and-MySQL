<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>
    <div class="row"> <!--row-->
        <div class="col-lg-12">
            <ol class="breadcrumb"> <!--breadcrumb-->
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / View Customers
                </li>
            </ol> <!--breadcrumb-->
        </div>
    </div> <!--row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default"> <!--panel panel-default-->
                <div class="panel-heading"> <!--panel-heading-->
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Customers
                    </h3>
                </div> <!--panel-heading-->
                <div class="panel-body"> <!--panel-body-->
                    <div class="table-responsive"> <!--table-responsive-->
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Customer No</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Customer Image</th>
                                    <th>Customer Country</th>
                                    <th>Customer City</th>
                                    <th>Customer Phone Number</th>
                                    <th>Customer Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=0;
                                    $get_C="SELECT * FROM `customers`";
                                    $run_c=mysqli_query($con,$get_C);
                                    while ($row_c=mysqli_fetch_array($run_c)) {
                                        $c_id=$row_c['customer_id'];
                                        $c_name=$row_c['customer_name'];
                                        $c_email=$row_c['customer_email'];
                                        $c_image=$row_c['customer_image'];
                                        $c_country=$row_c['customer_country'];
                                        $c_city=$row_c['customer_city'];
                                        $c_contact=$row_c['customer_contact'];
                                        $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $c_name; ?></td>
                                    <td><?php echo $c_email; ?></td>
                                    <td>
                                        <img src="../coustomer/coustomer_images/<?php echo $c_image; ?>" width="60" height="60">
                                    </td>
                                    <td><?php echo $c_country; ?></td>
                                    <td><?php echo $c_city; ?></td>
                                    <td><?php echo $c_contact; ?></td>
                                    <td>
                                        <a href="index.php?customer_delete=<?php echo $c_id; ?>">
                                            <i class="fa fa-trash-o"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div> <!--table-responsive-->
                </div> <!--panel-body-->
            </div> <!--panel panel-default-->
        </div>
    </div>
<?php
    }
?>