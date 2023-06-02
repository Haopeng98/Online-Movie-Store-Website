<?php
	require_once('database.php');
    session_start();
    $email = $_SESSION['email'];

	$queryCart = 'SELECT * FROM cart WHERE email = :email ORDER BY ID';
	$statement = $db->prepare($queryCart);
    $statement->bindValue(':email', $email);
	$statement->execute();
	$cart = $statement->fetchAll();
?>

<head>
    <title>Blu-ray Movies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/signup.css">
    <link rel="stylesheet" href="../CSS/checkout.css">
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

        <div id="orderSum">
            <h2>Order Summary</h2>
            <div class="row">
                <div class="column">
                    <?php foreach ($cart as $cart_item): ?>
                        <div class="cartspace">
                        <ul id="cartList">
                            <li><img src="../movie_image/<?php echo $cart_item['ID']; ?>.jpg" width="80"></li>
                        </ul>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="column">

                    <?php
                        $subtotal = 0;
                        foreach ($cart as $cart_item): 
                            $queryProduct = 'SELECT * FROM movies WHERE ID = :ID';
                            $statement = $db->prepare($queryProduct);
                            $statement->bindValue(':ID', $cart_item['ID']);
                            $statement->execute();
                            $movie = $statement->fetch();
                            $statement->closeCursor();
                    ?>
                        <div class="cartspace">
                        <ul id="movieInfoCheckout">
                            <li>
                                <p><i>Title:</i> <?php echo $movie['name']; ?></p>
                            </li>
                            <li>
                                <p><i>Price:</i> $<?php echo $movie['price'];
                                $subtotal += $movie['price']; ?></p>
                            </li>
                            <li>
                                <form action="deleteFromCart.php" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $movie['ID']; ?>">
                                    <input type="submit" value="Delete Movie">
                                </form>
                            </li>
                        </ul>
                        </div>
                    <?php endforeach; ?> 
                </div>

            </div>
            <div id="totalAndConfirm">
                <p><b>Sub-total: <?php echo $subtotal; ?></b></p>
                <p><b>Total (taxed):</b> <?php echo number_format($subtotal * 1.09, 2); ?></p>
				<a href="OrderConfirmation.php">
					<button type="submit" name="submit" class="orderButton">Place Order</button>
				</a>
		</div>
	</div>
	
</body>
