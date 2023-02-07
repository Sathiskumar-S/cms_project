<?php include  "functions.php" ?>
<?php include "includes/header.php"?>
<?php ob_start(); ?>
<body>
    <!-- navbar -->
 <?php include "includes/navbar.php"?>
  <main>
   <div class="container">
    <div class="row">
        <?php fetch_post();?>
        <div class="col-md-3 category position-relative" style = "margin-top: 20px">
            <div class="bg-light p-5 rounded">
                <h1>Categories</h1>
                <?php
                    fetch_sidebar_category();
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9" style = "margin-top: 20px">
        </div>
        <div class="col-md-3" style = "margin-top: 20px">
            <div class="bg-light p-5 rounded">
                <?php include "includes/login.php"; ?>
                <h1>Login</h1>
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password"><br>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login" name="login">
                    </div>
                </form>
            </div>
        </div>
    </div>
   </div>
  </main>
  <?php include "includes/footer.php"?>
</body>

</html>