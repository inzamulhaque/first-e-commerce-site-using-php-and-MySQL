<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>
<?php

    if (isset($_GET['edit_cat'])) {
        $edit_id=$_GET['edit_cat'];
        $edit_cat="SELECT * FROM `categories` WHERE cat_id='$edit_id'";
        $run_edit=mysqli_query($con,$edit_cat);
        $row_edit=mysqli_fetch_array($run_edit);
        $c_id=$row_edit['cat_id'];
        $c_title=$row_edit['cat_title'];
        $c_desc=$row_edit['cat_desc'];
    }

?>

    <div class="row"> <!--row 1-->
        <div class="col-lg-12"> <!--col-lg-12-->
            <ol class="breadcrumb"> <!--breadcrumb-->
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Category
                </li>
            </ol> <!--breadcrumb-->
        </div> <!--col-lg-12-->
    </div> <!--row 1-->

    <div class="row"> <!--row 2-->
        <div class="col-lg-12"> <!--col-lg-12-->
            <div class="panel panel-default"> <!--panel panel-default-->
                <div class="panel-heading"> <!--panel-heading"-->
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Insert Category
                    </h3>
                </div> <!--panel-heading"-->
                <div class="panel-body"> <!--panel-body"-->
                    <form class="form-horizontal" action="" method="POST">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Category Title:</label>
                            <div class="col-md-6">
                                <input type="text" value="<?php echo $c_title ?>" name="cat_title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Category Description:</label>
                            <div class="col-md-6">
                                <textarea name="cat_desc" class="form-control"><?php echo $c_desc ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="update" value="Insert Category" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div> <!--panel-body"-->
            </div> <!--panel panel-default-->
        </div> <!--col-lg-12-->
    </div> <!--row 2-->

    <?php
        if (isset($_POST['update'])) {
            $cat_title=$_POST['cat_title'];
            $cat_desc=$_POST['cat_desc'];
            $update_cat="UPDATE `categories` SET `cat_title`='$cat_title',`cat_desc`='$cat_desc' WHERE cat_id='$c_id'";
            $run_cat=mysqli_query($con,$update_cat);
            if ($run_cat) {
                echo "<script>alert('One category has been Updated')</script>";
                echo "<script>window.open('index.php?view_categories','_self')</script>";
            }
        }
    ?>

<?php
    }
?>