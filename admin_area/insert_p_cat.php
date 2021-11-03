<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>

    <div class="row"> <!--row 1-->
        <div class="col-lg-12"> <!--col-lg-12-->
            <ol class="breadcrumb"> <!--breadcrumb-->
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Product Category
                </li>
            </ol> <!--breadcrumb-->
        </div> <!--col-lg-12-->
    </div> <!--row 1-->

    <div class="row"> <!--row 2-->
        <div class="col-lg-12"> <!--col-lg-12-->
            <div class="panel panel-default"> <!--panel panel-default-->
                <div class="panel-heading"> <!--panel-heading"-->
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Insert Product Category
                    </h3>
                </div> <!--panel-heading"-->
                <div class="panel-body"> <!--panel-body"-->
                    <form class="form-horizontal" action="" method="POST">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category Title:</label>
                            <div class="col-md-6">
                                <input type="text" name="p_cat_title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category Description:</label>
                            <div class="col-md-6">
                                <textarea name="p_cat_desc" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div> <!--panel-body"-->
            </div> <!--panel panel-default-->
        </div> <!--col-lg-12-->
    </div> <!--row 2-->

    <?php
        if (isset($_POST['submit'])) {
            $p_cat_title=$_POST['p_cat_title'];
            $p_cat_desc=$_POST['p_cat_desc'];
            $insert_p_cat="INSERT INTO `product_category` (`p_cat_title`, `p_cat_desc`) VALUES ('$p_cat_title', '$p_cat_desc');";
            $run_p_cat=mysqli_query($con,$insert_p_cat);
            if ($run_p_cat) {
                echo "<script>alert('New product category has been inserted')</script>";
                echo "<script>window.open('index.php?view_product_cat','_self')</script>";
            }
        }
    ?>

<?php
    }
?>