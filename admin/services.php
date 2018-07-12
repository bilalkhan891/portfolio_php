<?php include_once  "inc/header.php"; ?>



    <div id="wrapper">

        <!-- Navigation -->
        
        <?php include_once "inc/navbar.php"; ?>
        <!-- delete -->
<?php deleteInfo("services", "services.php?successfullyDeleted") ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="page-header">About Us</h1>
                        <form action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" type="file" name="file">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" type="text" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="services">
                            </div>
                        </form>
                    </div>

<!-- insert -->
<?php 

if (isset($_POST['services'])) {
    
    $image = fileUpload();

    $title = $_POST['title'];
    $description = mysqli_escape_string($conn, $_POST['description']);

    $query = "INSERT INTO `services`(`img`, `title`, `description`) VALUES ( '$image', '$title', '$description')";
    $result = mysqli_query($conn, $query);

    echo $result;
}


 ?>

<?php 

if (isset($_GET['edit'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM services WHERE id = '$id'";
    $result = mysqli_query($conn, $query);


    $services = mysqli_fetch_assoc($result);

    $image = $services['img'];
    $title = $services['title'];
    $description = $services['description'];

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
	                            <label>Title</label>
	                            <input class="form-control" type="text" name="title" value="<?php echo $title; ?>">
	                        </div>
	                        <div class="form-group">
	                            <label>Description</label>
	                            <textarea class="form-control" type="text" name="description"><?php echo $description; ?></textarea>
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
    $experties = $_POST['title'];
    $description = mysqli_escape_string($conn, $_POST['description']);

    $query = "UPDATE `services` SET `img`= '$image', `title`= '$title',`description` = '$description' WHERE id = '$id'";

    $query2 = "UPDATE `services` SET `title`= '$title',`description` = '$description' WHERE id = '$id'";


    if ($image = "" || empty($image)) {

        $result = mysqli_query($conn, $query2);
        header("Location: services.php?updatedwithoutimage");

    } else {

        $result = mysqli_query($conn, $query);
        header("Location: services.php?ImageUpdated");

    }


}

 ?> <!-- /.row -->





                <!-- table -->
                <div class="row">
                    <div class="col-lg-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 

    $query = "SELECT * FROM services";
    $result = mysqli_query($conn, $query);

    while ($services = mysqli_fetch_assoc($result)) {

        $id = $services['id'];
       $image = $services['img'];
       $title = $services['title'];
       $description = $services['description'];

 ?>
<tr>
     <td><?php echo $id; ?></td>
     <td style="background-color: gray; max-width: 100px;"><img style="max-width: 100px;" src="../assets/img/<?php echo $image; ?>"></td>
     <td><?php echo $title; ?></td>
     <td><?php echo $description; ?></td>
     <td><a href="services.php?edit&id=<?php echo $id; ?>" class="fa fa-edit"></a></td>
     <td><a href="services.php?delete&id=<?php echo $id; ?>" class="fa fa-trash"></a></td>
</tr>

<?php } ?>
                                    </tbody>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
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