<?php include_once  "inc/header.php"; ?>



    <div id="wrapper">

        <!-- Navigation -->
        
        <?php include_once "inc/navbar.php"; ?>
<?php deleteInfo("about", "about.php?successfullyDeleted") ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="page-header">
                            About Us
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" type="file" name="file">
                            </div>
                            <div class="form-group">
                                <label>Experties</label>
                                <input class="form-control" type="text" name="experties">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" type="text" name="description">
                            </div>
                            <div class="form-group">
                                <label>phone</label>
                                <input class="form-control" type="text" name="phone">
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input class="form-control" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="about">
                            </div>
                        </form>
                    </div>

<?php 

if (isset($_GET['edit'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM about WHERE id = '$id'";
    $result = mysqli_query($conn, $query);


    $about = mysqli_fetch_assoc($result);

    $image = $about['img'];
    $experties = $about['experties'];
    $description = $about['description'];
    $phone = $about['phone'];
    $email = $about['email'];

 ?>

                    <div class="col-lg-6">
                        <h1 class="page-header">
                            About Us
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" type="file" name="file" value="<?php echo $image; ?>">
                            </div>
                            <div class="form-group">
                                <label>Experties</label>
                                <input class="form-control" type="text" name="experties" value="<?php echo $experties; ?>">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" type="text" name="description"><?php echo $description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>phone</label>
                                <input class="form-control" type="text" name="phone" value="<?php echo $phone; ?>">
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- updation -->
            <?php }

if (isset($_POST['update'])) {

    $image = fileUpload('update');
    $experties = $_POST['experties'];
    $description = mysqli_escape_string($conn, $_POST['description']);
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = "UPDATE `about` SET `img`= '$image', `experties`= '$experties',`description` = '$description', `phone`= '$phone',`email`='$email' WHERE id = '$id'";

    $query2 = "UPDATE `about` SET `experties`= '$experties',`description` = '$description', `phone`= '$phone',`email`='$email' WHERE id = '$id'";


    if ($image = "" || empty($image)) {

        $result = mysqli_query($conn, $query2);
        header("Location: about.php?updatedwithoutimage");

    } else {

        $result = mysqli_query($conn, $query);
        header("Location: about.php?ImageUpdated");

    }


}











                 ?>
                <!-- /.row -->
<!-- insert -->
<?php 

if (isset($_POST['about'])) {
    
    $image = fileUpload();

    $experties = $_POST['experties'];
    $description = mysqli_escape_string($conn, $_POST['description']);
    $phone = mysqli_escape_string($conn, $_POST['phone']);
    $email = mysqli_escape_string($conn, $_POST['email']);

    $query = "INSERT INTO `about`(`img`, `experties`, `description`, `phone`, `email`) VALUES ( '$image', '$experties', '$description', '$phone', '$email')";
    $result = mysqli_query($conn, $query);

    echo $result;



}


 ?>

                <!-- table -->
                <div class="row">
                    <div class="col-lg-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Experties</th>
                                        <th>Description</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 

    $query = "SELECT * FROM about";
    $result = mysqli_query($conn, $query);

    while ($about = mysqli_fetch_assoc($result)) {

        $id = $about['id'];
       $image = $about['img'];
       $experties = $about['experties'];
       $description = $about['description'];
       $phone = $about['phone'];
       $email = $about['email'];

 ?>
<tr>
     <td><?php echo $id; ?></td>
     <td style="background-color: gray; max-width: 100px;"><img style="max-width: 100px;" src="../assets/img/<?php echo $image; ?>"></td>
     <td><?php echo $experties; ?></td>
     <td><?php echo $description; ?></td>
     <td><?php echo $phone; ?></td>
     <td><?php echo $email; ?></td>
     <td><a href="about.php?edit&id=<?php echo $id; ?>" class="fa fa-edit"></a></td>
     <td><a href="about.php?delete&id=<?php echo $id; ?>" class="fa fa-trash"></a></td>
</tr>

<?php } ?>
                                    </tbody>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Experties</th>
                                        <th>Description</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include_once "inc/footer.php"; ?>
