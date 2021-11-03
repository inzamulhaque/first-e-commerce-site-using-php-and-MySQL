<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>
<div class="row"> <!--row-->
    <div class="col-lg-12"> <!--col-lg-12-->
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert User
            </li>
        </ol>
    </div> <!--col-lg-12-->
</div> <!--row-->

<div class="row"> <!--row 2-->
    <div class="col-lg-12"> <!--col-lg-12-->
        <div class="panel panel-default"> <!--panel panel-default-->
            <div class="panel-heading"> <!--panel-heading-->
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Insert User
                </h3>
            </div> <!--panel-heading-->
            <div class="panel-body"> <!--panel-body-->
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Name:</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Email:</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Password:</label>
                        <div class="col-md-6">
                            <input type="password" name="admin_pass" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Country:</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_country" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Job:</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_job" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Contact:</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_contact" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User About:</label>
                        <div class="col-md-6">
                            <textarea  name="admin_about" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Image:</label>
                        <div class="col-md-6">
                            <input type="file" name="admin_image" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Insert User" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div> <!--panel-body-->
        </div> <!--panel panel-default-->
    </div> <!--col-lg-12-->
</div> <!--row 2-->
<?php

    if (isset($_POST['submit'])) {
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

        $insert_admin="INSERT INTO `admins`(`admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES ('$admin_name','$admin_email','$admin_pass','$admin_image','$admin_contact','$admin_country','$admin_job','$admin_about')";

        $run_admin=mysqli_query($con,$insert_admin);

        if ($run_admin) {
            echo "<script>alert('One user has been inserted successfully')</script>";
            echo "<script>window.open('index.php?view_user','_self')</script>";
        }
    }

?>
<?php
    }
?>