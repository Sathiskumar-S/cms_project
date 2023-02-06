<?php include "admin_functions.php"?>
<?php include "includes/admin_header.php"?>


<?php ob_start(); ?>
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
                            <small>Author</small>
                        </h1>
                        <?php  include "includes/display_user.php" ?>
                        <?php
                            if(isset($_GET['source'])){
                                $source = $_GET['source'];
                                
                                switch($source){
                                    case 'add_user':
                                        include "includes/add_user.php";
                                        break;
                                    case 'edit_user':
                                        include "includes/edit_user.php";
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