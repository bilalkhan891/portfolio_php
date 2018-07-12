<?php include_once  "inc/header.php"; ?>



    <div id="wrapper">

        <!-- Navigation -->
        
        <?php include_once "inc/navbar.php"; ?>
<?php deleteInfo("testimonials", "testimonials.php?successfullyDeleted") ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="page-header">
                            Testimonials
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" type="file" name="file">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label>Jobs</label>
                                <input class="form-control" type="text" name="job">
                            </div>
                            <div class="form-group">
                                <label>Text</label>
                                <textarea class="form-control" type="text" name="text"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="testimonials">
                            </div>
                        </form>
                    </div>

<?php 

if (isset($_GET['edit'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM testimonials WHERE id = '$id'";
    $result = mysqli_query($conn, $query);


    $testimonials = mysqli_fetch_assoc($result);

    $image = $testimonials['img'];
    $name = $testimonials['name'];
    $job = $testimonials['job'];
    $text = $testimonials['text'];

 ?>

                    <div class="col-lg-6">
                        <h1 class="page-header">
                            Testimonials Edit
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" type="file" name="file" value="<?php echo $image; ?>">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
                            </div>
                            <div class="form-group">
                                <label>Job</label>
                                <input class="form-control" type="text" name="job" value="<?php echo $job; ?>">
                            </div>
                            <div class="form-group">
                                <label>Text</label>
                                <textarea class="form-control" type="text" name="text"><?php echo $text; ?></textarea>
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
    $name = $_POST['name'];
    $phone = $_POST['job'];
    $text = mysqli_escape_string($conn, $_POST['text']);

    $query = "UPDATE `testimonials` SET `img`= '$image', `name`= '$name',`job` = '$job', `text`= '$text' WHERE id = '$id'";

    $query2 = "UPDATE `testimonials` SET `name`= '$name',`job` = '$job', `text`= '$text' WHERE id = '$id'";


    if ($image = "" || empty($image)) {

        $result = mysqli_query($conn, $query2);
        header("Location: testimonials.php?updatedwithoutimage");

    } else {

        $result = mysqli_query($conn, $query);
        header("Location: testimonials.php?ImageUpdated");

    }


}

                 ?>
                <!-- /.row -->
<!-- insert -->
<?php 

if (isset($_POST['testimonials'])) {
    
    $image = fileUpload();

    $name = $_POST['name'];
    $job = mysqli_escape_string($conn, $_POST['job']);
    $text = mysqli_escape_string($conn, $_POST['text']);

    $query = "INSERT INTO `testimonials`(`img`, `name`, `job`, `text`) VALUES ( '$image','$name', '$job', '$text')";
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
                                        <th>Name</th>
                                        <th>Job</th>
                                        <th>Text</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 

    $query = "SELECT * FROM testimonials";
    $result = mysqli_query($conn, $query); 


    while ($testimonials = mysqli_fetch_assoc($result)) {

        $id = $testimonials['id'];
       $image = $testimonials['img'];
       $name = $testimonials['name'];
       $job = $testimonials['job'];
       $text = $testimonials['text'];

 ?>
<tr>
     <td><?php echo $id; ?></td>
     <td style="background-color: gray; max-width: 100px;"><img style="max-width: 100px;" src="../assets/img/<?php echo $image; ?>"></td>
     <td><?php echo $name; ?></td>
     <td><?php echo $job; ?></td>
     <td><?php echo $text; ?></td>
     <td><a href="testimonials.php?edit&id=<?php echo $id; ?>" class="fa fa-edit"></a></td>
     <td><a href="testimonials.php?delete&id=<?php echo $id; ?>" class="fa fa-trash"></a></td>
</tr>

<?php } ?>
                                    </tbody>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Job</th>
                                        <th>Text</th>
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
