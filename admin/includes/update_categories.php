<form action="" method="post">
    <div class="form-group">
        <label for="Update Category">Update Category</label>
        <?php
        if(isset($_GET['edit'])){
            $cat_id = $_GET['edit'];
            $fetch_query = "SELECT * FROM category WHERE cat_id={$cat_id}";
            $fetch_conn = mysqli_query($connection,$fetch_query);

            while($row = mysqli_fetch_assoc($fetch_conn)){
                $cat_id = $row['cat_id'];
                $cat_name = $row['cat_name'];
            ?>
            <input type="text" class="form-control" name="cat_name" value="<?php if(isset($cat_name)){echo $cat_name;} ?>">

        <?php }} ?>
        <?php
            if(isset($_POST['update'])){
                //$new_cat_id = $_POST['cat_id'];
                $new_cat_name = $_POST['cat_name'];
                $update_cat_name_query = "UPDATE category SET cat_name='{$new_cat_name}' WHERE cat_id ={$cat_id}";
                $update_cat_name_query_connection = mysqli_query($connection,$update_cat_name_query);
                connection_error($update_cat_name_query_connection);
                if($update_cat_name_query_connection){
                    echo "Successfully updated";
                }
                
            }

        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Update Category">
    </div>
</form>