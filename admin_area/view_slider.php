<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>
    <div class="row"> <!--row-->
        <div class="col-lg-12">
            <ol class="breadcrumb"> <!--breadcrumb-->
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / View Slider
                </li>
            </ol> <!--breadcrumb-->
        </div>
    </div> <!--row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default"> <!--panel panel-default-->
                <div class="panel-heading"> <!--panel-heading-->
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Sliders
                    </h3>
                </div> <!--panel-heading-->
                <div class="panel-body"> <!--panel-body-->
                    <?php
                        $get_slides="SELECT * FROM `slider`";
                        $run_slides=mysqli_query($con,$get_slides);
                        while ($row_slides=mysqli_fetch_array($run_slides)) {
                            $slide_id=$row_slides['id'];
                            $slide_name=$row_slides['slider_name'];$slide_image=$row_slides['slider_image'];
                    ?>
                        <div class="col-lg-3 col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title" align="center">
                                        <?php echo $slide_name ?>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <img src="sliders_images/<?php echo $slide_image ?>" alt="" class="img-responsive">
                                </div>
                                <div class="panel-footer">
                                    <center>
                                        <a href="index.php?delete_slide=<?php echo $slide_id ?>" class="pull-left">
                                            <i class="fa fa-trash-o"></i> Delete
                                        </a>
                                        <a href="index.php?edit_slide=<?php echo $slide_id ?>" class="pull-right">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <div class="clearfix">
                                            
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div> <!--panel-body-->
            </div> <!--panel panel-default-->
        </div>
    </div>
<?php
    }
?>