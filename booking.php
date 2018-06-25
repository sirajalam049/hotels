<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] != "POST"){
        die('Invalid Access');
    }
    if(!isset($_COOKIE['user']) || $_COOKIE['user'] != TRUE){
        die('Access Denied.');
    }

    require_once 'models.php';

    $_SESSION['hotel_id'] = $_GET['hotel_id'];

    (new Bookings())->insertData();

    (new Drafts())->clearDraft($_GET['hotel_id']);

    header('Location: /');
?>