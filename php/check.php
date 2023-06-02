<?php
    /* This php files checks user logins */
    require('database.php');
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    //$check=$_POST['check'];

    $query="SELECT * FROM user WHERE email=:email AND password=:pwd";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':pwd', $pwd);
    $success = $statement->execute();
    $user = $statement->fetch();

    //checks to see if logged in user is an admin or not for the current session.
    if ($statement->rowCount() > 0) {
        session_start();
        if ($user['admin'] == 1) {
            $_SESSION['admin'] = 1;
        }
        $_SESSION['loggedIn'] = 1;
        $_SESSION['email'] = $email;
    } else {
        // if user doesn't exist (wrong username/password)
        $loginErrorMsg = 'Error. Invalid login!'; 
        //header('Location: Login.php');
        include('Login.php');
        return;

    }

    session_start();
    //adds an item to the cart
    if (isset($_SESSION['cart12'])) {
        foreach ($_SESSION['cart12'] as $item) {
            $query = 'INSERT INTO cart(email, ID) VALUES(:email, :ID)';
            $statement = $db->prepare($query);
            $statement->bindValue(':ID', $item);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $statement->closeCursor();
        }
        $_SESSION['cart12'] = array();
    }

    header('Location: Homepage.php');

?>