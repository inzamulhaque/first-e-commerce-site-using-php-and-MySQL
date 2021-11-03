<?php
    $customer_email=$_SESSION['customer_email'];
    $get_customer="select * from customers where customer_email='$customer_email'";
    $run_cust=mysqli_query($con,$get_customer);
    $row_cust=mysqli_fetch_array($run_cust);
    $costomet_id=$row_cust['customer_id'];
    $costomet_name=$row_cust['customer_name'];
    $costomet_email=$row_cust['customer_email'];
    $costomet_country=$row_cust['customer_country'];
    $costomet_city=$row_cust['customer_city'];
    $customer_contact=$row_cust['customer_contact'];
    $costomet_address=$row_cust['customer_address'];
    $costomet_img=$row_cust['customer_image'];
?>

<div class="box"> <!--box-->
    <center>
        <h1>Edit Your Account</h1>
    </center>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Coustomer Name:</label>
            <input type="text" name="c_name" class="form-control" value="<?php echo $costomet_name; ?>" required>
        </div>
        <div class="form-group">
            <label>Coustomer Email:</label>
            <input type="text" name="c_email" class="form-control" value="<?php echo $costomet_email; ?>" required>
        </div>
        <div class="form-group">
            <label>Coustomer Country:</label>
            <input type="text" name="c_country" class="form-control" value="<?php echo $costomet_country; ?>" required>
        </div>
        <div class="form-group">
            <label>Coustomer City:</label>
            <input type="text" name="c_city" class="form-control" value="<?php echo $costomet_city; ?>" required>
        </div>
        <div class="form-group">
            <label>Contact Number:</label>
            <input type="text" name="c_number" class="form-control" value="<?php echo $customer_contact; ?>" required>
        </div>
        <div class="form-group">
            <label>Coustomer Address:</label>
            <input type="text" name="c_address" class="form-control" value="<?php echo $costomet_address; ?>" required>
        </div>
        <div class="form-group">
            <label>Coustomer Image:</label>
            <input type="file" name="c_image" class="form-control" required>
            <img src="coustomer_images/<?php echo $costomet_img; ?>" class="img-responsive" height="100" width="100">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" name="update">
                Update Now
            </button>
        </div>
    </form>
</div> <!--box-->

<?php

    if (isset($_POST['update'])) {
        $update_id=$costomet_id;
        $c_name=$_POST['c_name'];
        $c_email=$_POST['c_email'];
        $c_country=$_POST['c_country'];
        $c_city=$_POST['c_city'];
        $c_number=$_POST['c_number'];
        $c_address=$_POST['c_address'];
        $c_image=$_FILES['c_image']['name'];
        $c_image_tmp=$_FILES['c_image']['tmp_name'];

        move_uploaded_file($c_image_tmp,"coustomer_images/$c_image");
        $update_customer="UPDATE `customers` SET `customer_name`='$c_name',`customer_email`='$c_email',`customer_country`='$c_country',`customer_city`='$c_city',`customer_contact`='$c_number',`customer_address`='$c_address',`customer_image`='$c_image' WHERE `customer_id`='$costomet_id'";
        $run_customer=mysqli_query($con,$update_customer);
        if ($run_customer) {
            echo "<script>alert('your details updated')</script>";
            echo "<script>window.open('../logout.php','_self')</script>";
        }
    }

?>