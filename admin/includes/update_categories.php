<form action="categories.php" method="$_POST">
    <div class="form-group">
        <?php
        global $connection;
        $fetch_query = "SELECT * FROM category WHERE cat_id={$cat_id}";
        $fetch_conn = mysqli_connect($connection,$fetch_query);

        if(isset($_GET['edit'])){
            $cat_id = $_GET['edit'];
        }
        ?>
        <label for="Update Category">Update Category</label>
        <input type="text" class="form-control" name="cat_title">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Update Category">
    </div>
</form>