<?php
    if(isset($_GET['post_id'])){
        $the_post_id = $_GET['post_id'];
    }

    global $connection;
    $edit_query = "SELECT * FROM post WHERE post_id=$the_post_id";
    $edit_post_query_connection =  mysqli_query($connection,$edit_query);
    connection_error($edit_post_query_connection);

    while($row = mysqli_fetch_assoc($edit_post_query_connection)){
        $post_id = $row['post_id'];
        //$post_cat_id = $row['post_cat_id'];
        $post_category = $row['category'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
    }


    if(isset($_POST['update_post'])){
        //$post_cat_id = $_POST['post_cat_id'];
        $post_title = $_POST['post_title'];
        $post_category = $_POST['category'];
        $post_author = $_POST['post_author'];
        $post_date = $_POST['post_date'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        $post_comment_count = $_POST['post_comment_count'];
        $post_status = $_POST['post_status'];

        move_uploaded_file($post_image_temp,"../images/$post_image");

        if(empty($post_image)){
            $query = "SELECT * FROM post WHERE post_id={$the_post_id}";
            $image_update_query_connection = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($image_update_query_connection)){
                $post_image = $row['post_image'];
            }
        }

        $update_query = "UPDATE post SET post_title='{$post_title}',category='{$post_category}',post_date=now(),post_author='{$post_author}',post_status='{$post_status}',post_tags='{$post_tags}',post_content='{$post_content}',post_image='{$post_image}' WHERE post_id={$post_id}";

        $update_connection = mysqli_query($connection,$update_query);
        connection_error($update_connection);
    }

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?php echo $post_title;?>">
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
        <input type="text" class="form-control" name="post_author" value="<?php echo $post_author;?>">
    </div>
    <div class="form-group">
        <label for="date">Post Date</label>
        <input type="text" class="form-control" name="post_date" value="<?php echo $post_date;?>">
    </div>
    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" class="form-control" name="post_status" value="<?php echo $post_status;?>">
    </div>
    <div class="form-group">
        <img src="../../CMS_SYSTEM/images/<?php echo $post_image?>" alt="some image" width="20" height="20" name="image">
        <label for="Image">Post Image</label>
        <input type="file"  name="image">
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
        <input type="text" class="form-control" name="post_content" value="<?php echo $post_content;?>">
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags;?>">
    </div>
    <div class="form-group">
        <label for="comment count">Post Comment Count</label>
        <input type="text" class="form-control" name="post_comment_count" value="<?php echo $post_comment_count;?>">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Edit Post">
    </div>
</form>