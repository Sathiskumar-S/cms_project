<table class="table table-bordered table-hover">
    <thead>
        <tr>
           <th>Id</th>
           <th>User name</th>
           <th>Firstname</th>
           <th>Lastname</th>
           <th>Email</th>
           <th>User role</th>
           <th>Change to Admin</th>
           <th>Change to Subscriber</th>
           <th>Edit User</th>
           <th>Delete User</th>
        </tr>
    </thead>
    <tbody>
        <?php
            global $connection;
            $query = "SELECT * FROM users";
            $fetch_user_query_connection =  mysqli_query($connection,$query);
            connection_error($fetch_user_query_connection);

            while($row = mysqli_fetch_assoc($fetch_user_query_connection)){
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_role = $row['user_role'];


                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$user_name</td>";
                echo "<td>$user_firstname</td>";
                echo "<td>$user_lastname</td>";
                echo "<td>$user_email</td>";
                echo "<td>$user_role</td>";
                echo "<td><a href='users.php?admin=$user_id'>Change to Admin</a></td>";
                echo "<td><a href='users.php?subscriber=$user_id'>Change to Subscriber</a></td>";
                echo "<td><a href=''>Edit</a></td>";
                echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                echo "</tr>";
            }

        ?>

        <?php
            if(isset($_GET['delete'])){
                $the_user_id = $_GET['delete'];
                $delete_user_query = "DELETE FROM users WHERE user_id={$the_user_id}";
                $delete_user_query_connection = mysqli_query($connection,$delete_user_query);
                connection_error($delete_user_query_connection);
                header("Location: users.php");
            }
        ?>
        <?php
            if(isset($_GET['admin'])){
                $the_user_id = $_GET['admin'];
                $user_admin_query = "UPDATE users SET user_role ='admin' WHERE user_id= $the_user_id";
                $user_admin_query_connection = mysqli_query($connection,$user_admin_query);
                connection_error($user_admin_query_connection);
                header("Location: users.php");
            }
        ?>
        <?php
            if(isset($_GET['subscriber'])){
                $the_user_id = $_GET['subscriber'];
                $user_subscriber_query = "UPDATE users SET user_role ='subscriber' WHERE user_id= $the_user_id";
                $user_subscriber_query_connection = mysqli_query($connection,$user_subscriber_query);
                connection_error($user_subscriber_query_connection);
                header("Location: users.php");
            }
        ?>


    </tbody>
</table>
