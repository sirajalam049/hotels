<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] != "POST"){
        die('Invalid Access');
    }
    require_once 'models.php';

    $result = ((new Users())->userLogin());
    
    if(mysqli_num_rows($result) == 0){
        $_SESSION['error'] = "Either Email or Password or both are wrong.";
        header('Location: login.php');
        exit();
    }

    $row = $result->fetch_assoc();

    setcookie('id', $row['id'], time() + (86400 * 34));
    setcookie('name', $row['name'], time() + (86400 * 3));
    setcookie('email', $row['email'], time() + (86400 * 3));
    setcookie('user', TRUE, time() + (86400 * 3));

    header('Location: /');

?>