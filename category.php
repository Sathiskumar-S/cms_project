<?php include  "functions.php" ?>
<?php include "includes/header.php"?>

<body>
    <!-- navbar -->
    <?php include "includes/navbar.php" ?>
  <main>
   <div class="container">
    <div class="row">
        <?php
        if(isset($_GET['category'])){
            $post_cat_id = $_GET['category'];
        }
        $query = "SELECT * FROM post WHERE post_cat_id=$post_cat_id";
        $select_all_post_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_all_post_query)){
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'],0,100);
        ?>
        <div class="col-md-9" style = "margin-top: 20px">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">

                    <h3 class="mb-0"><?php echo $post_title;?></h3>
                    <h4>by <?php echo $post_author;?></h4>
                    <div class="mb-1 text-muted"><?php echo $post_date; ?></div>
                    <p class="mb-auto"><?php echo $post_content; ?></p>
                    <a href="#" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="images/<?php echo $post_image ?>" alt="" width="200" height="250">
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="col-md-3" style = "margin-top: 20px">
            <div class="bg-light p-5 rounded">
                <h1>Categories</h1>
                <?php
                    fetch_sidebar_category();
                ?>
            </div>
        </div>
    </div>
   </div>
  </main>
  <?php include "includes/footer.php"?>
</body>

</html>