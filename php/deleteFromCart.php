<?php
    require_once('database.php');

    session_start();
    $product_id = filter_input(INPUT_POST, 'product_id');

    $query = 'DELETE FROM cart WHERE ID = :product_id AND email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':email', $_SESSION['email']);
    $success = $statement->execute();
    $statement->closeCursor();    
    header("Location: Checkout.php");
?>