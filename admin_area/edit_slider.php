<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>

<?php
    if (isset($_GET['edit_slide'])) {
        $edit_id=$_GET['edit_slide'];
        $edit_slide="SELECT * FROM `slider` WHERE id='$edit_id'";
        $run_slide=mysqli_query($con,$edit_slide);
        $row_edit=mysqli_fetch_array($run_slide);
        $slide_id=$row_edit['id'];
        $slide_name=$row_edit['slider_name'];
        $slide_image=$row_edit['slider_image'];
    }
?>
<div class="row"> <!--row-->
    <div class="col-lg-12"> <!--col-lg-12-->
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Slider
            </li>
        </ol>
    </div> <!--col-lg-12-->
</div> <!--row-->

<div class="row"> <!--row 2-->
    <div class="col-lg-12"> <!--col-lg-12-->
        <div class="panel panel-default"> <!--panel panel-default-->
            <div class="panel-heading"> <!--panel-heading-->
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit Slider
                </h3>
            </div> <!--panel-heading-->
            <div class="panel-body"> <!--panel-body-->
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Slider Name:</label>
                        <div class="col-md-6">
                            <input type="text" name="slider_name" class="form-control" value="<?php echo $slide_name ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Slider Image:</label>
                        <div class="col-md-6">
                            <input type="file" name="slider_image" class="form-control" required>
                            <br>
                            <img src="sliders_images/<?php echo $slide_image ?>" width="70" height="70">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div> <!--panel-body-->
        </div> <!--panel panel-default-->
    </div> <!--col-lg-12-->
</div> <!--row 2-->

<?php
    if (isset($_POST['update'])) {
        $slide_name=$_POST['slider_name'];
        $slide_image=$_FILES['slider_image']['name'];
        $temp_name=$_FILES['slider_image']['tmp_name'];

        move_uploaded_file($temp_name,"sliders_images/$slide_image");

        $update_slide="UPDATE `slider` SET `slider_name`='$slide_name',`slider_image`='$slide_image' WHERE id='$slide_id'";
        $run_slide=mysqli_query($con,$update_slide);

        if ($run_slide) {
            echo "<script>alert('One slider has been updated')</script>";
            echo "<script>window.open('index.php?view_slider','_self')</script>";
        }
    }
?>

<?php
    }
?>