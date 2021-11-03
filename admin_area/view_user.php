<?php
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        
?>
 
<div class="row"> <!--row 1-->
    <div class="col-lg-12"> <!--col-lg-12-->
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Users
            </li>
        </ol>
    </div> <!--col-lg-12-->
</div> <!--row 1-->

<div class="row"> <!--row 2-->
    <div class="col-lg-12"> <!--col-lg-12-->
        <div class="panel panel-default"> <!--panel panel-default-->
            <div class="panel-heading"> <!--panel-heading-->
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Users
                </h3>
            </div> <!--panel-heading-->
            <div class="panel-body"> <!--panel-body-->
                <div class="table-responsive"> <!--table-responsive-->
                    <table class="table table-bordered table-hover table-striped">
                        <theade>
                            <tr>
                                <th> User Name </th>
                                <th> User Email </th>
                                <th> User Image </th>
                                <th> User Country </th>
                                <th> User Job </th>
                                <th> Delete User </th>
                            </tr>
                        </theade>
                        <tbody>
                            <?php
                                $i=0;
                                $get_admin="SELECT * FROM `admins`";
                                $run_admin=mysqli_query($con,$get_admin);
                                while ($row=mysqli_fetch_array($run_admin)) {
                                    $admin_id=$row['admin_id'];
                                    $admin_name=$row['admin_name'];
                                    $admin_email=$row['admin_email'];
                                    $admin_image=$row['admin_image'];
                                    $admin_country=$row['admin_country'];
                                    $admin_job=$row['admin_job'];
                            ?>
                            <tr>
                                <td><?php echo $admin_name; ?></td>
                                <td><?php echo $admin_email; ?></td>
                                <td><img src="admin_images/<?php echo $admin_image; ?>" alt="" width="60" height="60"></td>
                                <td><?php echo $admin_country; ?></td>
                                <td><?php echo $admin_job; ?></td>
                                <td>
                                    <a href="index.php?user_delete=<?php echo $admin_id; ?>">
                                        <i class="fa fa-trash-o"></i> Delete
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