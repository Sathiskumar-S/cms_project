<?php

$connection = mysqli_connect('localhost','cms_system','Sathis@243214','cms');

function fetch_category(){
    global $connection;
    $query = "SELECT * FROM category";
    $select_all_cat = mysqli_query($connection,$query);
    
    while($row = mysqli_fetch_assoc($select_all_cat)){
        $post_cat = $row['cat_name'];
        echo "<li><a href='#' style='padding-right:10px;'>{$post_cat}</a></li>";
    }
}



function fetch_sidebar_category(){
    global $connection;
    $query = "SELECT * FROM category LIMIT 3";
    $select_all_cat = mysqli_query($connection , $query);

    while($row = mysqli_fetch_assoc($select_all_cat)){
        $post_cat = $row['cat_name'];
        echo "<li>$post_cat</li>";
    }
}










?>