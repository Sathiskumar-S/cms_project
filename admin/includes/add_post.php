<?php
    global $connection;
    if(isset($_POST['create_post'])){
        $post_title = $_POST['post_title'];
        $post_category = $_POST['category'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_date = date('d-m-y');
        //$post_comment_count = 4;


        move_uploaded_file($post_image_temp,"../images/$post_image");

        $insert_post_query = "INSERT INTO post(category,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) VALUES('{$post_category}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}' )";


        $insert_connection = mysqli_query($connection,$insert_post_query);
        connection_error($insert_connection);
    }

?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <select name="category">
        <?php
            global $connection;
            $query = "SELECT * FROM category";
            $select_cat_admin = mysqli_query($connection,$query);
            connection_error($select_cat_admin);
            while($row = mysqli_fetch_array($select_cat_admin)){
                $cat_id = $row['cat_id'];
                $cat_name = $row['cat_name'];
                echo "<option value='{$cat_name}'>$cat_name</option>";
             }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="date">Post Date</label>
        <input type="text" class="form-control" name="post_date">
    </div>
    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="Image">Post Image</label>
        <input type="file"  name="image">
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
        <input type="text" class="form-control" name="post_content">
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="comment count">Post Comment Count</label>
        <input type="text" class="form-control" name="post_comment_count">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
</form>