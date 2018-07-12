<?php 


// insert funtion
function insert() {

	global $conn;
	if (isset($_POST['submit'])) {
	   
	   $cat_title = mysqli_escape_string($conn, $_POST['cat_title']);


	   if ($cat_title == "" || empty($cat_title)) {
	       echo "<script> alert('Category field should not be empty!');</script>";
	   } else {

	       $query = "INSERT INTO categories(cat_title)";
	       $query .= "VALUE('{$cat_title}')";

	       $result = mysqli_query($conn, $query);

	       if (!$result) {
	           die('QUERY FAILD' . mysqli_error($conn));
	       }
	   }

	}
}


function findAll_categories () {
	global $conn;

	$query = "SELECT * FROM categories";
    $run_query = mysqli_query($conn, $query);
    if (mysqli_num_rows($run_query)) {
        while ($row = mysqli_fetch_assoc($run_query)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
            echo "<tr>";
        }
    } 
}

function deleteCategories () {
	global $conn;

    if (isset($_GET['delete'])) {
        $cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$cat_id}";
        $result = mysqli_query($conn, $query);
        header("Location: categories.php?success");                        
    }
}


function update_categories () {
	global $conn;

    if (isset($_POST['edit_submit'])) {
    $cat_id = mysqli_escape_string($conn,  $_POST['cat_id']);
    $title = mysqli_escape_string($conn,  $_POST['cat_title']);

    $query = "UPDATE categories SET cat_title = '{$title}' WHERE cat_id = '$cat_id'";
    $result = mysqli_query($conn, $query);
	    if (!$result) {
	        die("query failed" . mysqli_error($conn));
	    }
	}
}


function confirmQuery($result, $location) {

    global $conn;

    if (!$result) {
        echo "Query Faild ". mysqli_error($conn);
     } else {
        if ($location == false) {
            echo "Location: False";
        } else {
            header("Location: {$location}");
            echo "Query Successful";
        }
     }
}


// file upload
function fileUpload() {

    global $conn;

        
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        //return the extention of the files 
        $fileExt = explode('.', $fileName);
        // string to lower case 
        // end gets the last piece of data from an array
        $fileActualExt = strtolower(end($fileExt));

        $allowed =  array('jpg', 'jpeg', 'png', 'svg');

        // checks if a certen string is in the array
        if (in_array($fileActualExt/*array*/, $allowed/*string*/)) {

            if ($fileError === 0) {

                if ($fileSize < 1000000) {

                    // unique() return the micro second time that is of couse a uniqe name each time
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                    $fileDestination = '../assets/img/' . $fileNameNew;

                    //this actually uploads the file
                    move_uploaded_file($fileTmpName, $fileDestination);
                    return $fileNameNew;

                } else {

                    echo "Your file size is too big!";
                }
            }
        } else {
            echo "You cannot upload files of this type!";
        }

    }


function insertInfo () {

    global $conn;
     if (isset($_POST['basicinfo'])) {
        
        $logo = fileUpload('basicinfo');

        $name = $_POST['name'];
        $experties = $_POST['experties'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $linkedin = $_POST['linkedin'];
        $behance = $_POST['behance'];


        $query = "INSERT INTO `basic_info`(`logo`, `name`, `experties`, `facebook`, `twitter`, `linkedin`, `behance`) VALUES ('$logo','$name', '$experties', '$facebook', '$twitter', '$linkedin', '$behance')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "query failed";
        } else {
            header("Location: basicinfo.php");
        }



    }
}

function deleteInfo($table, $location) {

global $conn;

    if (isset($_GET['delete'])) {

        $id = $_GET['id'];

        $query = "DELETE FROM $table WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "Delete failed";
        } else {
            header("Location: $location?Successful");
        }
    }
}

function loginScript() {
    global $conn;

    session_start();

if(isset($_POST['login'])) {

    $uid = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    //Error handlers
    //Check if inputs are empty
    if (empty($uid) || empty($pwd)) {
        header("Location: ../index-4.php?login=empty");
            exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_uid = '$uid' or user_email='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header("Location: ../index-4.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                    //Login the user here
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    
                    header("Location: index.php?login=success");
                    exit();
                }
            }
        }
    

}
}




 ?>