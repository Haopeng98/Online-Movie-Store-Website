<?php
    //if logged in, add to db
    session_start();
    if (!isset($_SESSION['loggedIn'])) {
        if (isset($_SESSION['cart12'])) {
            array_push($_SESSION['cart12'], id);
        } else {
            $_SESSION['cart12'] = array(id);
        }
    } else {
        require_once('database.php');
        $id = filter_input(INPUT_POST, 'product_id');
        $email = $_SESSION['email'];
        $query = 'SELECT * FROM cart WHERE email = :email AND ID = :id';
        $statement = $db->prepare($query);        
        $statement->bindValue(':email', $email);
        $statement->bindValue(':id', $id);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            header('Location: Checkout.php');
            return;
        }

        $query = 'INSERT INTO cart(email, ID) VALUES(:email, :id)';
	    $statement = $db->prepare($query);        
        $statement->bindValue(':email', $email);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }
    header('Location: Checkout.php');
?>
