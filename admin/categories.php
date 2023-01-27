<?php include "includes/header.php"?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
       <?php  include "includes/navbar.php" ?>

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
                                if(isset($_POST['submit'])){
                                    $cat_name = $_POST['cat_name'];

                                    if($cat_name == "" || empty($cat_name)){
                                        echo "Please fill this field";
                                    }else{
                                        $connection = mysqli_connect("localhost","cms_system","Sathis@243214","cms");
                                        $insert_cat_query = "INSERT INTO category(cat_name) ";
                                        $insert_cat_query .= "VALUE('{$cat_name}')";

                                        $create_cat_query = mysqli_query($connection,  $insert_cat_query);
                                        if(!$create_cat_query){
                                            die("MYSQL FAILED" . mysqli_error($connection));
                                        }
                                    }

                                }

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
                        </div>
                        <div class="col-xs-6">
                            <?php
                                $connection = mysqli_connect("localhost","cms_system","Sathis@243214","cms");
                                $query = "SELECT * FROM category";
                                $select_cat_admin = mysqli_query($connection , $query); 
                            ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($row = mysqli_fetch_assoc($select_cat_admin)){
                                            $admin_id = $row['cat_id'];
                                            $admin_cat = $row['cat_name'];
                                            echo "<tr>";
                                            echo "<td>$admin_id</td>";
                                            echo "<td>$admin_cat</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include "includes/footer.php"?>