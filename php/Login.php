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
            <img src="../img/Blu-raymovies.png" height="70" id="storeName" /></a>

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

    <div class="signup-form">
        <h2>Log In</h2>
        <?php if(!empty($loginErrorMsg)) echo $loginErrorMsg; ?>        
        <form action="check.php" method="post">
            <input type="text" name="email" placeholder="Email..."><br>

            <input type="password" name="pwd" placeholder="Password..."><br>

            <button type="submit" name="submit" class="orderButton">Log In</button>
        </form>
        <h4>Don't Have an Account?</h4><br>
        <a href="Signup.php">
            <button type="submit" name="submit" class="orderButton">Register</button>
        </a>
    </div>

</body>