<?php
    require_once('database.php');

    $query = 'DELETE FROM cart WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $_SESSION['email']);
    $success = $statement->execute();
    $statement->closeCursor();
?>