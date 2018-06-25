<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] != "POST"){
        echo 'Invalid Access';
    }
    
    require_once 'models.php';

    (new Drafts())->insertData();

?>