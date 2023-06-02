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
	<h1>Error<h1>
	<p>This email already exists! Please use another email and register <a href="Login.php">here</a>.</p>

</body>
