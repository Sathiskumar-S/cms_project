<?php

$connection = mysqli_connect('localhost','cms_system','Sathis@243214','cms');


function connection_error($result){
    global $connection;
    if(!$result){
        die("MYSQL FAILED" . mysqli_error($connection));
    }
}

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

function search_engine(){
    global $connection;
    if(isset($_POST['submit'])){
        $search_word = $_POST['search'];

        $select_search_query = "SELECT * FROM post WHERE post_tags LIKE '%$search_word' ";
        $search_query_connection = mysqli_query($connection,$select_search_query);
        connection_error($search_query_connection);

        $count = mysqli_num_rows($search_query_connection);
        if($count == 0){
            echo "<h1>No Result Found";
        }else{
            while($row = mysqli_fetch_assoc($search_query_connection)){
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
            ?>
            <div class="col-md-9" style = "margin-top: 20px">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
    
                        <h3 class="mb-0"><?php echo $post_title;?></h3>
                        <h4>by <?php echo $post_author;?></h4>
                        <div class="mb-1 text-muted"><?php echo $post_date; ?></div>
                        <p class="mb-auto"><?php echo $post_content; ?></p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="images/<?php echo $post_image ?>" alt="" width="200" height="250">
                    </div>
                </div>
            </div>
            <?php } ?>
<?php
        }
    }
}


?>