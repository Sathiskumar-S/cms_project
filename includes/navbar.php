<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                    fetch_category();
                ?>
                <li><a href="admin">Admin</a></li>
            </ul>
            <!-- search engine -->
            <form class="d-flex" role="search" action="search.php" method="post">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
  </header>