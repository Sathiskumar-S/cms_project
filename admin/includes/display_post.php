<table class="table table-bordered table-hover">
    <thead>
        <tr>
           <th>Id</th>
           <th>Category Id</th>
           <th>Category</th>
           <th>Title</th>
           <th>Author</th>
           <th>Date</th>
           <th>Image</th>
           <th>Content</th>
           <th>Tags</th>
           <th>Comment count</th>
           <th>Status</th>
           <th>Edit Post</th>
           <th>Delete Post</th>
        </tr>
    </thead>
    <tbody>
        <?php
            global $connection;
            $query = "SELECT * FROM post";
            $fetch_post_query_connection =  mysqli_query($connection,$query);
            connection_error($fetch_post_query_connection);

            while($row = mysqli_fetch_assoc($fetch_post_query_connection)){
                $post_id = $row['post_id'];
                $post_cat_id = $row['post_cat_id'];
                $post_category = $row['category'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];

                echo "<tr>";
                echo "<td>$post_id</td>";
                echo "<td>$post_cat_id</td>";
                echo "<td>$post_category</td>";
                echo "<td>$post_title</td>";
                echo "<td>$post_author</td>";
                echo "<td>$post_date</td>";
                echo "<td><img src='../../CMS_SYSTEM/images/$post_image' width='20px' height='20px'></td>";
                echo "<td>$post_content</td>";
                echo "<td>$post_tags</td>";
                echo "<td>$post_comment_count</td>";
                echo "<td>$post_status</td>";
                echo "<td><a href='index.php?source=edit_post&post_id=$post_id'>Edit</a></td>";
                echo "<td><a href='view_post.php?delete=$post_id'>Delete</a></td>";
                echo "</tr>";
            }

        ?>

        <?php
            if(isset($_GET['delete'])){
                $the_post_id = $_GET['delete'];
                $delete_post_query = "DELETE FROM post WHERE post_id={$the_post_id}";
                $delete_post_query_connection = mysqli_query($connection,$delete_post_query);
                connection_error($delete_post_query_connection);
                header("Location: view_post.php");
            }
        ?>
    </tbody>
</table>
