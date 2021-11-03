<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>
<?php

    if (isset($_GET['user_profile'])) {
        $edit_id=$_GET['user_profile'];
        $get_admin="SELECT * FROM `admins` WHERE admin_id='$edit_id'";
        $run_admin=mysqli_query($con,$get_admin);
        $row_admin=mysqli_fetch_array($run_admin);

        $admin_id=$row_admin['admin_id'];
        $admin_name=$row_admin['admin_name'];
        $admin_email=$row_admin['admin_email'];
        $admin_pass=$row_admin['admin_pass'];
        $admin_image=$row_admin['admin_image'];
        $admin_contact=$row_admin['admin_contact'];
        $admin_country=$row_admin['admin_country'];
        $admin_job=$row_admin['admin_job'];
        $admin_about=$row_admin['admin_about'];
    }

?>
<div class="row"> <!--row-->
    <div class="col-lg-12"> <!--col-lg-12-->
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edir Profile
            </li>
        </ol>
    </div> <!--col-lg-12-->
</div> <!--row-->

<div class="row"> <!--row 2-->
    <div class="col-lg-12"> <!--col-lg-12-->
        <div class="panel panel-default"> <!--panel panel-default-->
            <div class="panel-heading"> <!--panel-heading-->
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edir Profile
                </h3>
            </div> <!--panel-heading-->
            <div class="panel-body"> <!--panel-body-->
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Name:</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_name" class="form-control" value="<?php echo $admin_name ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Email:</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_email" class="form-control" value="<?php echo $admin_email ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Password:</label>
                        <div class="col-md-6">
                            <input type="password" name="admin_pass" class="form-control" value="<?php echo $admin_pass ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Country:</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_country" class="form-control" value="<?php echo $admin_country ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Job:</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_job" class="form-control" value="<?php echo $admin_job ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Contact:</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_contact" class="form-control" value="<?php echo $admin_contact ?>"">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User About:</label>
                        <div class="col-md-6">
                            <textarea  name="admin_about" class="form-control"><?php echo $admin_about ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Image:</label>
                        <div class="col-md-6">
                            <input type="file" name="admin_image" class="form-control" required>
                            <img src="admin_images/<?php echo $admin_image; ?>" width="70" height="70">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update User" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div> <!--panel-body-->
        </div> <!--panel panel-default-->
    </div> <!--col-lg-12-->
</div> <!--row 2-->
<?php

    if (isset($_POST['update'])) {
        $admin_name=$_POST['admin_name'];
        $admin_email=$_POST['admin_email'];
        $admin_pass=$_POST['admin_pass'];
        $admin_country=$_POST['admin_country'];
        $admin_job=$_POST['admin_job'];
        $admin_contact=$_POST['admin_contact'];
        $admin_about=$_POST['admin_about'];

        $admin_image=$_FILES['admin_image']['name'];
        $temp_admin_image=$_FILES['admin_image']['tmp_name'];

        move_uploaded_file($temp_admin_image,"admin_images/$admin_image");

        $update_admin="UPDATE `admins` SET `admin_name`='$admin_name',`admin_email`='$admin_email',`admin_pass`='$admin_pass',`admin_image`='$admin_image',`admin_contact`='$admin_contact',`admin_country`='$admin_country',`admin_job`='$admin_job',`admin_about`='$admin_about' WHERE admin_id='$edit_id'";

        $run_admin=mysqli_query($con,$update_admin);

        if ($run_admin) {
            echo "<script>alert('User has been updated successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }

?>
<?php
    }
?>