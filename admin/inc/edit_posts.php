<?php 


	if (isset($_GET['edit'])) {
		$the_post_id = $_GET['edit'];

	$query = "SELECT * FROM posts WHERE post_id = '$the_post_id'";
    $run_query = mysqli_query($conn, $query);

    if (mysqli_num_rows($run_query)) {

	 	$row = mysqli_fetch_assoc($run_query);

	    $post_id = $row['post_id'];
	    $post_author = $row['post_author'];
	    $post_title = $row['post_title'];
	    $post_category_id = $row['post_category_id'];
	    $post_status = $row['post_status'];
	    $post_image = $row['post_image'];
	    $post_tags = $row['post_tags'];
	    $post_comment_count = $row['post_comment_count'];
	    $post_date = $row['post_date'];
	    $post_content = $row['post_content'];
}
}


?>
<h2>Edit Post</h2><br />
<form action="" method="post" enctype="multipart/form-data">
	<input style="display: none !important;" type="text" name="post_id" value="<?php echo $post_id; ?>">
	
	<div class="form-group">
		<label for="title">Post Title</label>	
		<input type="text" value="<?php echo $post_title; ?>" name="title" class="form-control">
	</div>
	<div class="form-group">
		<label>Post Category</label>
		<select  name="post_category" id="">
		
<?php 

    $query = "SELECT * FROM categories";
    $result = mysqli_query($conn, $query);
    confirmQuery($result, false);

    while ($row = mysqli_fetch_assoc($result)) {
    	$cat_id = $row['cat_id'];
    	$cat_title = $row['cat_title'];

    	echo "<option value='{$cat_id}'>$cat_title</option>";
    }



 ?>
 		</select>

	</div>
	<div class="form-group">
		<label for="author">Post Author</label>	
		<input type="text" name="author" value="<?php echo $post_author; ?>" class="form-control">
	</div>
	<div class="form-group">
		<label for="post_status">Post Status</label>	
		<input type="text" name="post_status" class="form-control" value="<?php echo $post_status; ?>">
	</div>
	<div class="form-group">
		<label for="image">Post Image</label>
		<img src="">	
		<input type="file" name="image" value="<?php echo $post_image; ?>">
	</div>
	<div class="form-group">
		<label for="post_tags">Post Tag</label>	
		<input type="text" name="post_tags" class="form-control" value="<?php echo $post_tags; ?>">
	</div>
	<div class="form-group">
		<label for="post_content">Post Content</label>	
		<textarea type="text" name="post_content" id="" cols="30" rows="10" class="form-control"><?php echo $post_content; ?></textarea>
	</div>
	<div class="form-group">
		<button type="submit" name="update_post">Submit</button>
	</div>


</form>

<?php 
	if (isset($_POST['update_post'])) {
		
		$post_id = $_POST['post_id'];

		$post_title = $_POST['title'];
		$post_author = $_POST['author'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['post_status'];

		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];

		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		$post_comment_count = 4;



		move_uploaded_file($post_image_temp, "../images/$post_image");

		$query = "UPDATE posts SET ";
		$query .= "post_title = '{$post_title}',";
		$query .= "post_category_id = '{$post_category}',";
		$query .= "post_date = now(),";
		$query .= "post_author = '{$post_author}',"; 
		$query .= "post_tags = '{$post_tags}',";
		$query .= "post_content = '{$post_content}',";
		$query .= "post_status = '{$post_status}',";
		$query .= "post_image = '{$post_image}'";
		$query .= "WHERE post_id = {$post_id}"; 
	
		$result = mysqli_query($conn, $query);
		
		confirmQuery($result, "posts.php");

	}  
?>