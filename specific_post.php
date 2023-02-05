<?php include  "functions.php" ?>
<?php include "includes/header.php"?>

<body>
    <!-- navbar -->
    <?php include "includes/navbar.php"?>
  <main>
   <div class="container">
    <div class="row">
    <?php
        if(isset($_GET['post_id'])){
            $post_id = $_GET['post_id'];
        }
        global $connection;
        $query = "SELECT * FROM post Where post_id=$post_id";
        $select_specific_post_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_specific_post_query)){
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
        ?>
        <div class="col-md-9" style = "margin-top: 20px">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">

                    <h3 class="mb-0"><?php echo $post_title;?></h3>
                    <h4>by <?php echo $post_author;?></h4>
                    <div class="mb-1 text-muted"><?php echo $post_date; ?></div>
                    <p class="mb-auto"><?php echo $post_content; ?></p>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="images/<?php echo $post_image ?>" alt="" width="200" height="250">
                </div>
            </div>
        </div>
        <?php } ?>
            <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="specific_post.php?post_id=<?php echo $post_id ?>" method="post">
                        <div class="form-group">
                            <label for="Author">Author:</label>
                            <input type="text" class="form-control" name="author">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="comment">Enter yout comment:</label>
                            <textarea class="form-control" rows="3" name="comment"></textarea>
                        </div>
                        <br>
                        <button type="submit" name="submit_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <?php
                    if(isset($_POST['submit_comment'])){
                        $the_post_id = $_GET['post_id'];
                        $comment_author = $_POST['author'];
                        $comment_email = $_POST['email'];
                        $comment_content = $_POST['comment'];
                        $comment_status = "Unapproved";

                        $insert_comment_query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES ({$the_post_id},'{$comment_author}','{$comment_email}','{$comment_content}','{$comment_status}',now())";
                        $insert_comment_query_connnection = mysqli_query($connection,$insert_comment_query);
                        connection_error($insert_comment_query_connnection);
                    }
                    //header("Location: specific_post.php?post_id=$post_id");

                ?>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media"><br>
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
        <!-- <div class="col-md-3" style = "margin-top: 20px">
            <div class="bg-light p-5 rounded">
                <h1>Categories</h1>
                <?php
                    //fetch_sidebar_category();
                ?>
            </div>
        </div> -->
    </div>
   </div>
  </main>
  <?php include "includes/footer.php"?>
</body>

</html>

