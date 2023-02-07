<?php
session_start();
global $connection;
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);

    $query = "SELECT * FROM users WHERE user_name='{$username}'";
    $query_connection = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($query_connection)){
        $user_id = $row['user_id'];
        $db_username = $row['user_name'];
        $db_password = $row['user_password'];
        $db_user_role = $row['user_role'];
    }

    if($username == $db_username && $password == $db_password){
        $_SESSION['user_name'] =  $db_username;
        $_SESSION['password'] =  $db_password;
        $_SESSION['user_role'] =  $db_user_role;
        header("Location:../CMS_SYSTEM/admin/");
    }
    else{
        header("Location:../CMS_SYSTEM/index.php"); 
    }
}
?>