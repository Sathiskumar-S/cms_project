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

                $display_post_title_query = "SELECT * FROM post WHERE post_id = $comment_post_id";
                $display_post_title_query_connection = mysqli_query($connection,$display_post_title_query);
                while($row = mysqli_fetch_assoc($display_post_title_query_connection)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    echo "<td><a href='../specific_post.php?post_id=$post_id'>$post_title</a></td>";

                }
                echo "<td>$comment_date</td>";
                echo "<td><a href=''>Approve</a></td>";
                echo "<td><a href=''>Unapprove</a></td>";
                echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                echo "</tr>";
            }

        ?>

        <?php
            if(isset($_GET['delete'])){
                $the_comment_id = $_GET['delete'];
                $delete_comment_query = "DELETE FROM comments WHERE comment_id={$the_comment_id}";
                $delete_comment_query_connection = mysqli_query($connection,$delete_comment_query);
                connection_error($delete_comment_query_connection);
                header("Location: comments.php");
            }
        ?>
    </tbody>
</table>
