<?php
	require_once('database.php');
	if (!isset($movie_id)) {
		$movie_id = filter_input(INPUT_GET, 'ID', FILTER_VALIDATE_INT);
		if ($movie_id == NULL || $movie_id == FALSE) {
			$queryMovie = 'SELECT ID FROM movies LIMIT 1';
			$statement1 = $db->prepare($queryMovie);
			$statement1->execute();
			$movie = $statement1->fetch();
			$movie_id = $movie['ID'];
		}
	}
    $category_name = $_GET['category'];

	$queryAllMovies = 'SELECT * FROM movies WHERE category_name = :category_name ORDER BY ID';
	$statement2 = $db->prepare($queryAllMovies);
    $statement2->bindValue(':category_name', $category_name);
	$statement2->execute();
	$movies = $statement2->fetchAll();
	$statement2->closeCursor();
?>

<head>
	<title>Blu-ray Movies</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/category.css">
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

    <div id="blankSpace"></div>

	<?php foreach ($movies as $movie): ?>
	<div class="row">
        <a href="MoviePage.php?id=<?php echo $movie['ID']; ?>">
            <div class="column1">
                <img src="../movie_image/<?php echo $movie['ID']; ?>.jpg" alt="<?php echo $movie['name']; ?>" width="200px" height="300px">
            </div>
            <div class="column2">
                <h2><?php echo $movie['name']; ?></h2>
                <p><?php echo $movie['description']; ?></p>
            </div>
        </a>                            
    </div>

    <div id="blankSpace"></div>

    <?php endforeach; ?>
	
	<div class="banner"> 
		<img src="../img/banner.png" class="banner">
	</div>

</body>

	