<?php

    // Denying direct access
    if($_SERVER["REQUEST_METHOD"] != "POST"){
        die('Invalid Acess');
    }

    require_once 'models.php';

    $userObj = new Users();
    $userObj->insertData();
    $result = $userObj->userLogin();
    $row = $result->fetch_assoc();
    setcookie('id', $row['id'], time() + (86400 * 34));
    setcookie('name', $row['name'], time() + (86400 * 3));
    setcookie('email', $row['email'], time() + (86400 * 3));
    setcookie('user', TRUE, time() + (86400 * 3));

    header('Location: /');


?>