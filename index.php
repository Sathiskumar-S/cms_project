<?php include  "functions.php" ?>
<?php include "includes/header.php"?>

<body>
    <!-- navbar -->
    <?php include "includes/navbar.php" ?>
  <main>
   <div class="container">
    <div class="row">
        <?php fetch_post();?>
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