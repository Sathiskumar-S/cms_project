<table class="table table-bordered table-hover">
    <thead>
        <tr>
           <th>Id</th>
           <th>Author</th>
           <th>Content</th>
           <th>Email</th>
           <th>Status</th>
           <th>In Response to</th>
           <th>Date</th>
           <th>Approve</th>
           <th>Unapprove</th>
           <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            global $connection;
            $query = "SELECT * FROM comments";
            $fetch_comments_query_connection =  mysqli_query($connection,$query);
            connection_error($fetch_comments_query_connection);

            while($row = mysqli_fetch_assoc($fetch_comments_query_connection)){
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_email = $row['comment_email'];
                $comment_content = $row['comment_content'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];
         
                echo "<tr>";
                echo "<td>$comment_id</td>";
                echo "<td>$comment_author</td>";
                echo "<td>$comment_content</td>";
                echo "<td>$comment_email</td>";
                echo "<td>$comment_status</td>";
                echo "<td>Sample post</td>";
                echo "<td>$comment_date</td>";
                echo "<td><a href=''>Approve</a></td>";
                echo "<td><a href=''>Unapprove</a></td>";
                echo "<td><a href=''>Delete</a></td>";
                echo "</tr>";
            }

        ?>

        <?php
            // if(isset($_GET['delete'])){
            //     $the_post_id = $_GET['delete'];
            //     $delete_post_query = "DELETE FROM post WHERE post_id={$the_post_id}";
            //     $delete_post_query_connection = mysqli_query($connection,$delete_post_query);
            //     connection_error($delete_post_query);
            //     header("Location: view_post.php");
            // }
        ?>
    </tbody>
</table>
