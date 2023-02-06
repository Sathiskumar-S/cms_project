<?php
    global $connection;
    if(isset($_POST['add_user'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $user_role = $_POST['user_role'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];

      $insert_user_query = "INSERT INTO users(user_name,user_password,user_firstname,user_lastname,user_email,user_role) VALUES('{$username}','{$password}','{$firstname}','{$lastname}','{$email}','{$user_role}')";
      $user_connection = mysqli_query($connection,$insert_user_query);
      connection_error($user_connection);
     }

?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">User name:</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
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
        <input type="text" class="form-control" name="firstname">
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="form-control" name="lastname">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="add_user" value="Register">
    </div>
</form>