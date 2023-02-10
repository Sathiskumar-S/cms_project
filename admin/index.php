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
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-file-text fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                            <?php
                                                global $connection;
                                                $select_post_query = "SELECT * FROM post";
                                                $select_post_query_connection = mysqli_query($connection,$select_post_query);
                                                connection_error($select_post_query_connection);
                                                $post_count = mysqli_num_rows($select_post_query_connection);
                                            ?>
                                            <div class='huge'><?php echo $post_count;?></div>
                                                    <div>Posts</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="view_post.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-comments fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                            <?php
                                                $select_comment_query = "SELECT * FROM comments";
                                                $select_comment_query_connection = mysqli_query($connection,$select_comment_query);
                                                connection_error($select_comment_query_connection);
                                                $comment_count = mysqli_num_rows($select_comment_query_connection);
                                            ?>
                                            <div class='huge'><?php echo $comment_count;?></div>
                                            <div>Comments</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="comments.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                            <?php
                                                $select_users_query = "SELECT * FROM users";
                                                $select_users_query_connection = mysqli_query($connection,$select_users_query);
                                                connection_error($select_users_query_connection);
                                                $user_count = mysqli_num_rows($select_users_query_connection);
                                            ?>
                                            <div class='huge'><?php echo $user_count;?></div>
                                                <div> Users</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="users.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-list fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                               <?php
                                                    $select_category_query = "SELECT * FROM category";
                                                    $select_category_query_connection = mysqli_query($connection,$select_category_query);
                                                    connection_error($select_category_query_connection);
                                                    $categories_count = mysqli_num_rows($select_category_query_connection);
                                               ?>
                                                <div class='huge'><?php echo $categories_count;?></div>
                                                <div>Categories</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="categories.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                <!-- /.row -->
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
                <?php
                    global $connection;
                    $select_active_post_query = "SELECT * FROM post WHERE post_status = 'published'";
                    $select_active_post_query_connection = mysqli_query($connection,$select_active_post_query);
                    connection_error($select_active_post_query_connection);
                    $active_post_count = mysqli_num_rows($select_active_post_query_connection);

                ?>
                <script type="text/javascript">
                    google.charts.load('current', {packages:['corechart']});
                    google.charts.setOnLoadCallback(drawStuff);

                        function drawStuff() {
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Country');
                        data.addColumn('number', 'count');
                        data.addRows([
                            ['Posts', <?php echo $post_count;?>],
                            ['Active posts',<?php echo $active_post_count;?>],
                            ['Comments', <?php echo $comment_count;?>],
                            ['Categories', <?php echo $categories_count;?>],
                            ['Users', <?php echo $user_count;?>]
                        ]);

                        var options = {
                        title: 'Counts',
                        width: 600,
                        height: 400,
                        legend: 'none',
                        bar: {groupWidth: '95%'},
                        vAxis: { gridlines: { count: 4 } }
                        };

                        var chart = new google.visualization.ColumnChart(document.getElementById('number_format_chart'));
                        chart.draw(data, options);

                        document.getElementById('format-select').onchange = function() {
                        options['vAxis']['format'] = this.value;
                        chart.draw(data, options);
                        };
                    };
                    </script>
                    <div id="number_format_chart">
                        <div id="barchart_material" style="width: 900px; height: 500px;"></div>
                    </div>
                            <!-- /.container-fluid -->

            </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include "includes/admin_footer.php"?>