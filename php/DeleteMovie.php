<?php
require_once('database.php');
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);

$query = 'DELETE FROM movies WHERE ID = :product_id';
$statement = $db->prepare($query);
$statement->bindValue(':product_id', $product_id);
$success = $statement->execute();

$query = 'DELETE FROM cart WHERE ID = :product_id';
$statement = $db->prepare($query);
$statement->bindValue(':product_id', $product_id);
$success = $statement->execute();
$statement->closeCursor();  
  
header("Location: modifyMovies.php");
?>