<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>

    <div class="row"> <!--row-->
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / View Product Categories
                </li>
            </ol>
        </div>
    </div> <!--row-->

    <div class="row"> <!--row 2-->
        <div class="col-lg-12"> <!--col-lg-12-->
            <div class="panel panel-defafult"> <!--panel panel-defafult-->
                <div class="panel-heading"> <!--panel-heading-->
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Product Categories
                    </h3>
                </div> <!--panel-heading-->
                <div class="panel-body"> <!--panel-body-->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Product Category ID</th>
                                    <th>Product Category Title</th>
                                    <th>Product Category Description</th>
                                    <th>Delete Product Category</th>
                                    <th>Edit Product Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=0;
                                    $get_p_cats="SELECT * FROM `product_category`";
                                    $run_p_cats=mysqli_query($con,$get_p_cats);

                                    while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
                                        $p_cat_id=$row_p_cats['p_cat_id'];
                                        $p_cat_title=$row_p_cats['p_cat_title'];
                                        $p_cat_desc=$row_p_cats['p_cat_desc'];
                                        $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $p_cat_title; ?></td>
                                        <td width="300"><?php echo $p_cat_desc; ?></td>
                                        <td>
                                            <a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </a>
                                        </td>
                                        <td>
                                            <a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
                                                <i class="fa fa-pencil"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div> <!--panel-body-->
            </div> <!--panel panel-defafult-->
        </div> <!--col-lg-12-->
    </div> <!--row 2-->

<?php
    }
?>