<?php include_once  "inc/header.php"; ?>


    <div id="wrapper">

        <!-- Navigation -->
        
        <?php include_once "inc/navbar.php"; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- insert -->
                        <div class="col-xs-6">
                        <h1 class="page-header">
                            Basic Info
                            <small> </small>
                        </h1>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input class="form-control" type="file" name="file">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Experties</label>
                                    <input class="form-control" type="text" name="experties">
                                </div>
                                <div class="form-group">
                                    <label>Facebook Link</label>
                                    <input class="form-control" type="text" name="facebook">
                                </div>
                                <div class="form-group">
                                    <label>Twitter Link</label>
                                    <input class="form-control" type="text" name="twitter">
                                </div>
                                <div class="form-group">
                                    <label>Linkedin Link</label>
                                    <input class="form-control" type="text" name="linkedin">
                                </div>
                                <div class="form-group">
                                    <label>Behance</label>
                                    <input class="form-control" type="text" name="behance">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="basicinfo">
                                </div>
                            </form>
                        </div>
                    <!-- Add post -->

<?php 

if (isset($_GET['edit'])) {
    

        $id = $_GET['id'];

        $query = "SELECT * FROM basic_info WHERE id= '$id'";
        $result = mysqli_query($conn, $query);

        $basicinfo = mysqli_fetch_assoc($result);



 ?>
                <!-- Edit Basic info -->
                        <!-- insert -->
                        <div class="col-xs-6">
                        <h1 class="page-header">
                            Edit Basic Info
                            <small> </small>
                        </h1>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input class="form-control" type="file" name="file" value="<?php echo $basicinfo['logo']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name" value="<?php echo $basicinfo['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Experties</label>
                                    <input class="form-control" type="text" name="experties" value="<?php echo $basicinfo['experties']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Facebook Link</label>
                                    <input class="form-control" type="text" name="facebook" value="<?php echo $basicinfo['facebook']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Twitter Link</label>
                                    <input class="form-control" type="text" name="twitter" value="<?php echo $basicinfo['twitter']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Linkedin Link</label>
                                    <input class="form-control" type="text" name="linkedin" value="<?php echo $basicinfo['linkedin']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Behance</label>
                                    <input class="form-control" type="text" name="behance" value="<?php echo $basicinfo['behance']; ?>">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- Add post -->


<!-- update -->
<?php 


if (isset($_POST['update'])) {

    $logo = fileUpload('update');
    $name = $_POST['name'];
    $experties = $_POST['experties'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $linkedin = $_POST['linkedin'];
    $behance = $_POST['behance'];


    $query = "UPDATE `basic_info` SET `logo`='$logo',`name`='$name',`experties`='$experties',`facebook`='$facebook',`twitter`= '$twitter',`linkedin`= '$linkedin',`behance`='$behance' WHERE id = '$id'";

    $query2 = "UPDATE `basic_info` SET `name`='$name',`experties`='$experties',`facebook`='$facebook',`twitter`= '$twitter',`linkedin`= '$linkedin',`behance`='$behance' WHERE id = '$id'";


    if ($logo = "" || empty($logo)) {
        $result = mysqli_query($conn, $query2);
        header("Location: basicinfo.php?logoUpdated");
    } else {
        $result = mysqli_query($conn, $query);
        header("Location: basicinfo.php?successful");
    }


}










} ?>
<!-- insert basic info -->
                <?php 

                   insertInfo();
                   deleteInfo('basic_info','basicinfo.php' );


                 ?>

                <div class="row">
                    <div class="col-lg-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Experties</th>
                                        <th>Facebook Link</th>
                                        <th>Twitter Link</th>
                                        <th>Linkedin Link</th>
                                        <th>Behance Link</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                    <tbody>
<?php 

    $query = "SELECT * FROM basic_info";
    $result = mysqli_query($conn, $query);

    while ($basicinfo = mysqli_fetch_assoc($result)) {
       

        $logo = $basicinfo['logo'];

        $id = $basicinfo['id'];
        $name = $basicinfo['name'];
        $experties = $basicinfo['experties'];
        $facebook = $basicinfo['facebook'];
        $twitter = $basicinfo['twitter'];
        $linkedin = $basicinfo['linkedin'];
        $behance = $basicinfo['behance'];

 ?>
<tr>
     <td><?php echo $id; ?></td>
     <td style="background-color: gray; max-width: 100px;"><img style="max-width: 100px;" src="../assets/img/<?php echo $logo; ?>"></td>
     <td><?php echo $name; ?></td>
     <td><?php echo $experties; ?></td>
     <td><?php echo $facebook; ?></td>
     <td><?php echo $twitter; ?></td>
     <td><?php echo $linkedin; ?></td>
     <td><?php echo $behance ?></td>
     <td><a href="basicinfo.php?edit&id=<?php echo $id; ?>" class="fa fa-edit"></a></td>
     <td><a href="basicinfo.php?delete&id=<?php echo $id; ?>" class="fa fa-trash"></a></td>
</tr>

<?php } ?>
                                    </tbody>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Experties</th>
                                        <th>Facebook Link</th>
                                        <th>Twitter Link</th>
                                        <th>Linkedin Link</th>
                                        <th>Behance Link</th>
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
 