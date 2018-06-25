<?php
    require_once '../includes/conn.php';

    require_once '../includes/lib.php';
    

    move_uploaded_file($_FILES['data']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/admin/data.json');
    
    $data = file_get_contents('data.json');
    
    unlink('data.json');
    
    $json = json_decode($data, true);
    con();
    foreach($json as $hotel){
        $keywords = implode(' ', extractKeywords($hotel['about']));
        $statement = $GLOBALS['con']->prepare("INSERT INTO hotels VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, 0)");
        $statement->bind_param('ssisssis', $hotel['name'], $hotel['phone'], $hotel['total_rooms'], $hotel['location'], $hotel['address'], $hotel['about'], $hotel['price'], $keywords)
            or die('Binding Failed'. $GLOBALS['con']->error);

        $statement->execute()
            or die('Execution Failed'. $GLOBALS['con']->error);
    }
    $statement->close();
    $GLOBALS['con']->close();

    header('Location: ../');

?>