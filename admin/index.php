<?php include "admin_functions.php"?>
<?php include "includes/admin_header.php"?>

<?php session_start();?>
<?php ob_start(); ?>
<?php
if(!isset($_SESSION['user_role'])){
        header("Location: ../index.php");
}
?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
       <?php  include "includes/admin_navbar.php" ?>

       <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['user_name']; ?></small>
                        </h1>
                        <?php
                            if(isset($_GET['source'])){
                                $source = $_GET['source'];
                                
                                switch($source){
                                    case 'add_post':
                                        include "includes/add_post.php";
                                        break;
                                    case 'edit_post':
                                        include "includes/edit_post.php";
                                        break;
                                    case 'add_user':
                                        include "includes/add_user.php";
                                        break;
                                }
                            }



                        ?>
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