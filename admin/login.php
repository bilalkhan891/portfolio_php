<?php include_once  "inc/header.php"; ?>

<?php
 
session_start();
if (isset($_SESSION['u_id'])) {
    header("Location: index.php?logged_in");
    exit();
}  else {
    echo "not set";
}?>


    <div id="wrapper">

        <!-- Navigation -->
        

        <div id="page-wrapper">

            <div class="container-fluid">
            <div class="col-lg-12">
                <h1 class="page-header">Login</h1>
            </div>
            <div class="col-lg-5 center-block">
                <form class="" action="" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="login">
                    </div>
                </form>
            </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php loginScript(); ?>
    </div>
    <!-- /#wrapper -->


<?php include_once "inc/footer.php"; ?>
