<?php
	require_once('database.php');
	$movie_title = filter_input(INPUT_POST, 'search');

	$queryMovies = 'SELECT * FROM movies WHERE name LIKE \'%'. $movie_title .'%\'';
	$statement = $db->prepare($queryMovies);
	$statement->execute();
	$movies = $statement->fetchAll();
	$statement->closeCursor();
?>

<head>
	<title>Blu-ray Movies</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../CSS/main.css">
	<link rel="stylesheet" href="../CSS/signup.css">
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
	
	<div class="floatContain">
		<div id="cart">
			<div class="row">
			
				<div class="column">
					<?php foreach ($movies as $movie): ?>
					<div class="cartItem">
						<ul id="cartList">
							<li><a href="MoviePage.php?id=<?php echo $movie['ID']; ?>"><img src="../movie_image/<?php echo $movie['ID']; ?>.jpg" height="180" width="120"></a></li>
						</ul>
					</div>
					<?php endforeach; ?>
				</div>
			
				<div class="column">
					<?php foreach ($movies as $movie): ?>
						<div class="cartItem">
						<ul id="movieInfoSearch">
							<li><p><i>Title:</i> <?php echo $movie['name']; ?></p></li>
							<li><p><i>Director:</i> <?php echo $movie['director']; ?></p></li>
							<li><p><i>Price:</i> <?php echo $movie['price']; ?></p></li>
						</ul>
						</div>
					<?php endforeach; ?>
				</div>
			
			</div>

		</div>
	
	</div>
	
</body>

	