<?php include "admin_functions.php"?>
<?php include "includes/admin_header.php"?>
<?php ob_start(); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
       <?php  include "includes/admin_navbar.php" ?>
       <?php  include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                            <?php
                                add_category();
                            ?>
                            <form action="categories.php" method="post">
                                <div class="form-group">
                                    <label for="add category">Add Category</label>
                                    <input type="text" class="form-control" name="cat_name">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Add Category" name="submit">
                                </div>
                            </form>
                            <?php
                                if(isset($_GET['edit'])){
                                    $cat_id = $_GET['edit'];
                                    include "includes/update_categories.php";
                                }
                            ?>
                        </div>
                        <div class="col-xs-6">
                            <?php
                               global $connection;
                               $query = "SELECT * FROM category";
                               $select_cat_admin = mysqli_query($connection,$query);
                            ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Delete category</th>
                                        <th>Edit category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        fetch_category_table_data($select_cat_admin);
                                    ?>
                                </tbody>
                            </table>
                            <?php
                              delete_category();
                            ?>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include "includes/admin_footer.php"?>