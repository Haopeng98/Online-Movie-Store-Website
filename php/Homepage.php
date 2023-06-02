<head>
    <title>Blu-ray Movies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="shortcut icon" type="image/png" href="../img/favicon.png">
</head>

<body>
    <div id="header">
        <a href="Homepage.php">
            <img src="../img/Blu-raymovies.png" id="storeName" />
        </a>
        <div class="search-container">
            <form action="SearchResults.php" method="post">
                <input id="search" type="text" placeholder="Search by title" name="search">
                <button type="submit">Search<i class="fa fa-search"></i></button>
            </form>
        </div>
        <div id="navbar">
            <ul>
                <li><a href="Homepage.php">Home</a></li>
                <?php
                    session_start();
                    if (!isset($_SESSION['loggedIn'])) { ?>
                        <li><a href="Login.php">Login</a></li>
                    <?php } else { ?>
                        <li><a href="Checkout.php">Cart</a></li>
                        <li><a href="logout.php">Log Out</a></li>

                    <?php } 
                    if (isset($_SESSION['admin'])) {
                    ?>
                        <li><a href="modifyMovies.php">Modify Movies</a></li>
                    <?php }?>
            </ul>       
        </div>
    </div>

    <div class="banner">
        <img src="../img/banner.png" class="banner">
    </div>

    <h2 class="homeheader">Categories</h2>

    <div id="featuredCat">
        <div class="gallery">
            <a href="Category.php?category=horror">
                <img src="../category_image/horror.png" alt="Horror" width="600" height="400">
                <div class="desc">Horror</div>
            </a>
        </div>
        <div class="gallery">
            <a href="Category.php?category=action">
                <img src="../category_image/action.png" alt="Action" width="600" height="400">
                <div class="desc">Action</div>
            </a>
        </div>
        <div class="gallery">
            <a href="Category.php?category=comedy">
                <img src="../category_image/comedy.png" alt="Comedy" width="600" height="400">
                <div class="desc">Comedy</div>
            </a>
        </div>
        <div class="gallery">
            <a href="Category.php?category=thriller">
                <img src="../category_image/thriller.png" alt="Thriller" width="600" height="400">
                <div class="desc">Thriller</div>
            </a>
        </div>
    </div>

    <div id="featuredCat">
        <div class="gallery">
            <a href="Category.php?category=romance">
                <img src="../category_image/romance.png" alt="Romance" width="600" height="400">
                <div class="desc">Romance</div>
            </a>
        </div>
        <div class="gallery">
            <a href="Category.php?category=fantasy">
                <img src="../category_image/fantasy.png" alt="Fantasy" width="600" height="400">
                <div class="desc">Fantasy</div>
            </a>
        </div>
        <div class="gallery">
            <a href="Category.php?category=sci-fi">
                <img src="../category_image/sci-fi.png" alt="Sci-fi" width="600" height="400">
                <div class="desc">Sci-fi</div>
            </a>
        </div>
        <div class="gallery">
            <a href="Category.php?category=animation">
                <img src="../category_image/animation.png" alt="Animation" width="600" height="400">
                <div class="desc">Animation</div>
            </a>
        </div>
    </div>

    <div id="blankSpace"></div>

    <div class="banner">
        <img src="../img/banner.png" class="banner">
    </div>
</body>