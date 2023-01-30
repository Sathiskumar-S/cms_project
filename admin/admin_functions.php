<?php

$connection = mysqli_connect('localhost','cms_system','Sathis@243214','cms');


function connection_error($result){
    global $connection;
    if(!$result){
        die("MYSQL FAILED" . mysqli_error($connection));
    }
}


function add_category(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_name = $_POST['cat_name'];

        if($cat_name == "" || empty($cat_name)){
            echo "Please fill this field";
        }else{
            $connection = mysqli_connect("localhost","cms_system","Sathis@243214","cms");
            $insert_cat_query = "INSERT INTO category(cat_name) ";
            $insert_cat_query .= "VALUE('{$cat_name}')";

            $add_cat_query = mysqli_query($connection,  $insert_cat_query);
            connection_error($add_cat_query);
        }

    }
}


function fetch_category_table_data($db_result){
    while($row = mysqli_fetch_assoc($db_result)){
        $admin_id = $row['cat_id'];
        $admin_cat = $row['cat_name'];
        echo "<tr>";
        echo "<td>$admin_id</td>";
        echo "<td>$admin_cat</td>";
        echo "<td><a href='categories.php?delete={$admin_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$admin_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function delete_category(){
    global $connection;
    if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
        $delete_query = "DELETE FROM category WHERE cat_id = {$the_cat_id}";
        $delete_cat_query = mysqli_query($connection,$delete_query);
        connection_error($delete_cat_query);
        header("Location: categories.php");
    }
}



?>