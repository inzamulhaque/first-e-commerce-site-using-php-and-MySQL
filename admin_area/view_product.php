<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>
 
<div class="row"> <!--row 1-->
    <div class="col-lg-12"> <!--col-lg-12-->
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Products
            </li>
        </ol>
    </div> <!--col-lg-12-->
</div> <!--row 1-->

<div class="row"> <!--row 2-->
    <div class="col-lg-12"> <!--col-lg-12-->
        <div class="panel panel-default"> <!--panel panel-default-->
            <div class="panel-heading"> <!--panel-heading-->
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Products
                </h3>
            </div> <!--panel-heading-->
            <div class="panel-body"> <!--panel-body-->
                <div class="table-responsive"> <!--table-responsive-->
                    <table class="table table-bordered table-hover table-striped">
                        <theade>
                            <tr>
                                <th> Product ID </th>
                                <th> Product Title </th>
                                <th> Product Image </th>
                                <th> Product Price </th>
                                <th> Product Keyword </th>
                                <th> Product Date </th>
                                <th> Product Delete </th>
                                <th> Product Edit </th>
                            </tr>
                        </theade>
                        <tbody>
                            <?php
                                $i=0;
                                $get_product="select * from products";
                                $run_p=mysqli_query($con,$get_product);
                                while ($row=mysqli_fetch_array($run_p)) {
                                    $pro_id=$row['product_id'];
                                    $product_title=$row['product_title'];
                                    $product_img1=$row['product_img1'];
                                    $product_price=$row['product_price'];
                                    $product_keyword=$row['product_keyword'];
                                    $date=$row['date'];
                                    $i++;
                                
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $product_title; ?></td>
                                <td><img src="product_images/<?php echo $product_img1; ?>" alt="" width="50" height="40"></td>
                                <td><?php echo $product_price; ?></td>
                                <td><?php echo $product_keyword; ?></td>
                                <td><?php echo $date; ?></td>
                                <td>
                                    <a href="index.php?delete_product=<?php echo $pro_id; ?>">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?edit_product=<?php echo $pro_id; ?>">
                                        <i class="fa fa-pencil"></i> Edit
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
    </div> <!--col-lg-12-->
</div> <!--row 2-->

<?php
    }
?>