<?php
    if(isset($_COOKIE['user'])){
        unset($_COOKIE['user']);
        unset($_COOKIE['id']);
        unset($_COOKIE['name']);
        unset($_COOKIE['email']);
        setcookie('id', '', time() - 3600);
        setcookie('name', '', time() - 3600);
        setcookie('email', '', time() - 3600);
        setcookie('user', '', time() - 3600);
        header('Location: /');
    }
?>