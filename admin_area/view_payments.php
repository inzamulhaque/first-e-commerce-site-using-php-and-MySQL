<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>
    <div class="row"> <!--row-->
        <div class="col-lg-12">
            <ol class="breadcrumb"> <!--breadcrumb-->
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / View Payments
                </li>
            </ol> <!--breadcrumb-->
        </div>
    </div> <!--row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default"> <!--panel panel-default-->
                <div class="panel-heading"> <!--panel-heading-->
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Payments
                    </h3>
                </div> <!--panel-heading-->
                <div class="panel-body"> <!--panel-body-->
                    <div class="table-responsive"> <!--table-responsive-->
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Payment No</th>
                                    <th>Invoice No</th>
                                    <th>Amount Paid</th>
                                    <th>Payment Method</th>
                                    <th>Reference No</th>
                                    <th>Payment Date</th>
                                    <th>Delete Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=0;
                                    $get_payment="SELECT * FROM `payments`";
                                    $run_payment=mysqli_query($con,$get_payment);
                                    while ($row_c=mysqli_fetch_array($run_payment)) {
                                        $payment_id=$row_c['payment_id'];
                                        $invoice_id=$row_c['invoice_id'];
                                        $amount=$row_c['amount'];
                                        $payment_mode=$row_c['payment_mode'];
                                        $ref_no=$row_c['ref_no'];
                                        $payment_date=$row_c['payment_date'];
                                        $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $invoice_id; ?></td>
                                    <td>BDT <?php echo $amount; ?></td>
                                    <td><?php echo $payment_mode; ?></td>
                                    <td><?php echo $ref_no; ?></td>
                                    <td><?php echo $payment_date; ?></td>
                                    <td>
                                        <a href="index.php?payment_delete=<?php echo $payment_id; ?>">
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