<?php include_once  "inc/header.php"; ?>



    <div id="wrapper">

        <!-- Navigation -->
        
        <?php include_once "inc/navbar.php"; ?>
<?php deleteInfo("skills", "skills.php?successfullyDeleted") ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="page-header">
                            Skills
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Skill1</label>
                                <input class="form-control" type="text" name="skill1">
                            </div>
                            <div class="form-group">
                                <label>value1</label>
                                <input class="form-control" type="text" name="value1">
                            </div>
                            <div class="form-group">
                                <label>skill2</label>
                                <input class="form-control" type="text" name="skill2">
                            </div>
                            <div class="form-group">
                                <label>value2</label>
                                <input class="form-control" type="text" name="value2">
                            </div>
                            <div class="form-group">
                                <label>skill3</label>
                                <input class="form-control" type="text" name="skill3">
                            </div>
                            <div class="form-group">
                                <label>value3</label>
                                <input class="form-control" type="text" name="value3">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="about">
                            </div>
                        </form>
                    </div>

<?php 

if (isset($_GET['edit'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM skills WHERE id = '$id'";
    $result = mysqli_query($conn, $query);


    $skills = mysqli_fetch_assoc($result);


    $skill1 = $skills['skill1'];
    $value1 = $skills['value1'];
    $skill2 = $skills['skill2'];
    $value2 = $skills['value2'];
    $skill3 = $skills['skill3'];
    $value3 = $skills['value3'];

 ?>

                    <div class="col-lg-6">
                        <h1 class="page-header">
                            Skills
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Skill1</label>
                                <input class="form-control" type="text" name="skill1" value="<?php echo $skill1; ?>">
                            </div>
                            <div class="form-group">
                                <label>value1</label>
                                <input class="form-control" type="text" name="value1" value="<?php echo $value1; ?>">
                            </div>
                            <div class="form-group">
                                <label>skill2</label>
                                <input class="form-control" type="text" name="skill2" value="<?php echo $skill2; ?>">
                            </div>
                            <div class="form-group">
                                <label>value2</label>
                                <input class="form-control" type="text" name="value2" value="<?php echo $value2; ?>">
                            </div>
                            <div class="form-group">
                                <label>skill3</label>
                                <input class="form-control" type="text" name="skill3" value="<?php echo $skill3; ?>"> 
                            </div>
                            <div class="form-group">
                                <label>value3</label>
                                <input class="form-control" type="text" name="value3" value="<?php echo $value3; ?>">
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
    $skill1 = $_POST['skill1'];
    $value1 = $_POST['value1'];
    $skill2 = $_POST['skill2'];
    $value2 = $_POST['value2'];
    $skill3 = $_POST['skill3'];
    $value3 = $_POST['value3'];

    $query = "UPDATE `skills` SET `skill1`= '$skill1',`value1`= '$value1',`skill2`= '$skill2',`value2`= '$value2',`skill3`= '$skill3',`value3`='$value3' WHERE id = '$id'";


        $result = mysqli_query($conn, $query);
        header("Location: skills.php?updated");


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
                                        <th>Skill 1</th>
                                        <th>value 1</th>
                                        <th>Skill 2</th>
                                        <th>value 2</th>
                                        <th>Skill 3</th>
                                        <th>value 3</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 

    $query = "SELECT * FROM skills";
    $result = mysqli_query($conn, $query);

    while ($skills = mysqli_fetch_assoc($result)) {

    $id = $skills['id'];

    $skill1 = $skills['skill1'];
    $value1 = $skills['value1'];
    $skill2 = $skills['skill2'];
    $value2 = $skills['value2'];
    $skill3 = $skills['skill3'];
    $value3 = $skills['value3'];

 ?>
<tr>
     <td><?php echo $skill1; ?></td>
     <td><?php echo $value1; ?></td>
     <td><?php echo $skill2; ?></td>
     <td><?php echo $value2; ?></td>
     <td><?php echo $skill3; ?></td>
     <td><?php echo $value3; ?></td>
     <td><a href="skills.php?edit&id=<?php echo $id; ?>" class="fa fa-edit"></a></td>
     <td><a href="skills.php?delete&id=<?php echo $id; ?>" class="fa fa-trash"></a></td>
</tr>

<?php } ?>
                                    </tbody>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Skill 1</th>
                                        <th>value 1</th>
                                        <th>Skill 2</th>
                                        <th>value 2</th>
                                        <th>Skill 3</th>
                                        <th>value 3</th>
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
