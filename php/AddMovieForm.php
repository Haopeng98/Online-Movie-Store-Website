<head>
    <title>Blu-ray Movies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/addMovie.css">
    <link rel="shortcut icon" type="image/png" href="../img/favicon.png">
</head>

<body>
    <div id="header">
        <a href="Homepage.php">
            <img src="../img/Blu-raymovies.png" height="70" id="storeName" />
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
                    //checks to see if user is logged in and then also checks if logged user is an admin
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
        
    <div class="addMovies">
        <form name="add_movie" action="AddMovie.php" method="post" id="add_movie_form" enctype="multipart/form-data">

            <div id="blankSpace"></div>

            <label>Category:</label>
            <select name="category_name">
				<option value="horror">Horror</option>
				<option value="action">Action</option>
				<option value="comedy">Comedy</option>
				<option value="thriller">Thriller</option>
				<option value="romance">Romance</option>
				<option value="fantasy">Fantasy</option>
				<option value="sci-fi">Sci-fi</option>
				<option value="animation">Animation</option>
			</select><br><br>            

            <label>Name:</label>
            <input type="text" name="name" required><br><br>

            <label>Price:</label>
            <input type="text" name="price" required pattern="^[0-9]+\.[0-9]{2}" title="Price must be a decimal (ex: 10.00)">
            <span id="price"></span><br><br>

            <label>Director:</label>
            <input type="text" name="director" required><br><br>

            <label>Description:</label>
            <textarea name="description" required></textarea><br><br>

            <label>Select a .jpg file to upload</label>
            <input type="file" name="uploadFile" accept="image/jpeg" required><br><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Movie"><br>
        </form>
    </div>
</body>