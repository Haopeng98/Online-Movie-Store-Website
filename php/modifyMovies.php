<?php
require_once('database.php');
$queryMovies = 'SELECT * FROM movies';
$statement = $db->prepare($queryMovies);
$statement->execute();
$movies = $statement->fetchAll();
$statement->closeCursor();
?>

<head>
	<title>Modify Movies</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../CSS/main.css"> 
    <link rel="stylesheet" href="../CSS/modify.css">
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

    <div class="container">
        <h1 class="align">Hello Admin</h1>
            <table class="items">
              <tr>
                <th>Category</th>
                <th>Title</th>
                <th></th>
              </tr>
              <?php foreach ($movies as $movie) : ?>
              <tr>
                <td><?php echo $movie['category_name']; ?></td>
                <td><?php echo $movie['name']; ?></td>
                <td>
                  <form action="DeleteMovie.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $movie['ID']; ?>">
                    <input type="submit" value="Delete">
                  </form>
                </td>
              </tr>
              <?php endforeach; ?>
            </table>
    </div>
	
    <a href="AddMovieForm.php">
			<button type="submit" name="submit" class="orderButton">Add Movies</button>
		</a>
</body>

