
<table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Categories</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

<?php 

    $query = "SELECT * FROM posts";
    $run_query = mysqli_query($conn, $query);

    if (mysqli_num_rows($run_query)) {

        while ($row = mysqli_fetch_assoc($run_query)) {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];

            echo "<tr>";
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_title}</td>";
            echo "<td>{$post_category_id}</td>";
            echo "<td>{$post_status}</td>";
            echo "<td><img style='width: 100px;' src='../images/$post_image' alt='image'/></td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
            echo "<td><a href='posts.php?edit={$post_id}&source=edit'>Edit</a></td>";
            echo "<tr>";
        }
    } 

?> 
                            </tbody>
                            <thead>

                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Bootstrap</th>
                                    <th>Bootstrap</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                    <th>Edit</th>

                                </tr>
                            </thead>

                        </table>


<?php 

if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = '$the_post_id'";
    $result = mysqli_query($conn, $query);

    $refresh = "posts.php?query=succes";
    confirmQuery($result, $refresh);
}

 ?>