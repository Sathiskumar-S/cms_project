<?php
    if(isset($_GET['user_id'])){
        $the_user_id = $_GET['user_id'];
    }

    global $connection;
    $edit_user_query = "SELECT * FROM users WHERE user_id=$the_user_id";
    $edit_user_query_connection =  mysqli_query($connection,$edit_user_query);
    connection_error($edit_user_query_connection);

    while($row = mysqli_fetch_assoc($edit_user_query_connection)){
      $the_username = $row['user_name'];
      $the_password = $row['user_password'];
      $the_user_role = $row['user_role'];
      $the_firstname = $row['user_firstname'];
      $the_lastname = $row['user_lastname'];
      $the_email = $row['user_email'];
    }

    if(isset($_POST['edit_user'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $user_role = $_POST['user_role'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];

      $update_user_query = "UPDATE users SET user_name='{$username}',user_password='{$password}',user_firstname='{$firstname}',user_lastname='{$lastname}',user_email='{$email}',user_role='{$user_role}' WHERE user_id={$the_user_id}";
      $user_connection = mysqli_query($connection,$update_user_query);
      connection_error($user_connection);
     }

?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">User name:</label>
        <input type="text" class="form-control" name="username" value="<?php echo $the_username;?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $the_password;?>">
    </div>
    <div class="form-group">
        <select name="user_role">
            <option value="select">--SELECT--</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control" name="firstname" value="<?php echo $the_firstname;?>">
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="form-control" name="lastname" value="<?php echo $the_lastname;?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $the_email; ?>">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="EDIT">
    </div>
</form>