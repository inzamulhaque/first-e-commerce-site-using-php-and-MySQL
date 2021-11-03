<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>
<div class="row"> <!--row-->
    <div class="col-lg-12"> <!--col-lg-12-->
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Slider
            </li>
        </ol>
    </div> <!--col-lg-12-->
</div> <!--row-->

<div class="row"> <!--row 2-->
    <div class="col-lg-12"> <!--col-lg-12-->
        <div class="panel panel-default"> <!--panel panel-default-->
            <div class="panel-heading"> <!--panel-heading-->
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Insert Slider
                </h3>
            </div> <!--panel-heading-->
            <div class="panel-body"> <!--panel-body-->
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Slider Name:</label>
                        <div class="col-md-6">
                            <input type="text" name="slider_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Slider Image:</label>
                        <div class="col-md-6">
                            <input type="file" name="slider_image" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div> <!--panel-body-->
        </div> <!--panel panel-default-->
    </div> <!--col-lg-12-->
</div> <!--row 2-->
<?php

    if (isset($_POST['submit'])) {
        $slider_name=$_POST['slider_name'];
        $slider_image=$_FILES['slider_image']['name'];
        $temp_name=$_FILES['slider_image']['tmp_name'];

        $view_sliders="SELECT * FROM `slider`";
        $view_run_sliders=mysqli_query($con,$view_sliders);
        $count=mysqli_num_rows($view_run_sliders);
        if ($count<4) {
            move_uploaded_file($temp_name,"sliders_images/$slider_image");
            $insert_slider="INSERT INTO `slider`(`slider_name`, `slider_image`) VALUES ('$slider_name','$slider_image')";
            $run_slider=mysqli_query($con,$insert_slider);
            echo "<script>alert('New sllider has been inserted')</script>";
            echo "<script>window.open('index.php?view_slider','_self')</script>";
        } else {
            echo "<script>alert('You have already inserted 4 slides')</script>";
        }
    }

?>
<?php
    }
?>