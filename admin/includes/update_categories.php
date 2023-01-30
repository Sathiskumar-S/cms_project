                            <form action="categories.php" method="post">
                                <div class="form-group">
                                    <label for="add category">Edit Category</label>
                                    <?php
                                        if(isset($_GET['edit'])){
                                            $cat_id = $_GET['edit'];
                                            $connection = mysqli_connect("localhost","cms_system","Sathis@243214","cms");
                                            $query = "SELECT * FROM category WHERE cat_id = $cat_id";
                                            $select_cat_admin = mysqli_query($connection , $query); 

                                            while($row = mysqli_fetch_assoc($select_cat_admin)){
                                                $admin_id = $row['cat_id'];
                                                $admin_cat = $row['cat_name'];
                                            ?>
                                            <input type="text" class="form-control" name="cat_name" value="<?php if(isset($admin_cat)){echo $admin_cat;} ?>">   
                                                
                                          <?php } }?>
                                    <?php
                                     //Updating category
                                     if(isset($_POST['update_category'])){
                                        $cat_update_title = $_POST['cat_name'];
                                        $update_query = "UPDATE category SET cat_name ='{$cat_update_title}' WHERE cat_id ={$cat_id}";
                                        $update_admin_query = mysqli_query($connection , $update_query); 
                                        if(!$update_admin_query){
                                            die("QUERY FAILED" . mysqli_error($connection));
                                        }
                                     }

                                    ?>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="update category" name="update_category">
                                </div>
                            </form>