<?php
$category = filter_input(INPUT_POST, 'category_name');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$director = filter_input(INPUT_POST, 'director');
$description = filter_input(INPUT_POST, 'description');

require_once('database.php'); 
$query = 'INSERT INTO movies(category_name, name, price, director, description) VALUES(:category, :name, :price, :director, :description)';
$statement = $db->prepare($query);
$statement->bindValue(':category', $category);
$statement->bindValue(':name', $name);
$statement->bindValue(':price', $price);
$statement->bindValue(':director', $director);
$statement->bindValue(':description', $description);
$statement->execute();
$statement->closeCursor();

$query = 'SELECT ID FROM movies WHERE name = :name';
$statement2 = $db->prepare($query);
$statement2->bindValue(':name', $name);
$statement2->execute();
$movie = $statement2->fetch();
$statement2->closeCursor();

$target_dir = "../movie_image/";
$target_file = $target_dir . $movie["ID"] . '.jpg';
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($_FILES["uploadFile"]["name"],PATHINFO_EXTENSION));

move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file);

header("Location: modifyMovies.php");
?>
