<?php include_once  "inc/header.php"; ?>



    <div id="wrapper">

        <!-- Navigation -->
        
        <?php include_once "inc/navbar.php"; ?>
<?php deleteInfo("quotes", "quotes.php?successfullyDeleted") ?>



        <div id="page-wrapper">

            <div class="container-fluid">
            <div class="col-lg-12">
                <h1 class="page-header">Quotes</h1>
            </div>

<?php 

if (isset($_GET['edit'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM quotes WHERE id = '$id'";
    $result = mysqli_query($conn, $query);


    $quotes = mysqli_fetch_assoc($result);


    $name = $quotes['name'];
    $email = $quotes['email'];
    $message = $quotes['message'];

 ?>

                    <div class="col-lg-6">
                        <h1 class="page-header">
                            Quotes Edit
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" type="text" name="message"><?php echo $message; ?></textarea>
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

    if ($_GET['id']) {
        $id = $_GET['id'];
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "UPDATE `quotes` SET `name`= '$name',`email`= '$email',`message`= '$message' WHERE id = '$id'";


        $result = mysqli_query($conn, $query);
        header("Location: quotes.php?updated");


}
  ?><!-- /.row -->


  
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
                        <h1 class="page-header">
                            All Quotes
                        </h1>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 

    $query = "SELECT * FROM quotes";
    $result = mysqli_query($conn, $query);

    while ($quotes = mysqli_fetch_assoc($result)) {

    $id = $quotes['id'];

    $name = $quotes['name'];
    $email = $quotes['email'];
    $message = $quotes['message'];

 ?>
<tr>
     <td><?php echo $id; ?></td>
     <td><?php echo $name; ?></td>
     <td><?php echo $email; ?></td>
     <td><?php echo $message; ?></td>
     <td><a href="quotes.php?edit&id=<?php echo $id; ?>" class="fa fa-edit"></a></td>
     <td><a href="quotes.php?delete&id=<?php echo $id; ?>" class="fa fa-trash"></a></td>
</tr>

<?php } ?>
                                    </tbody>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
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
