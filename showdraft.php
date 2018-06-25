<?php
    if(!isset($_COOKIE['user'])){
        die('Access Denied');
    }

    require_once 'models.php';

    $draftObject = new Drafts();
    $result = $draftObject->getUserAssociatedData();
    $hotelObject = new Hotels();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Your Bookings</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- Font Awesome CDN CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
        <style>
            .card{
                margin-bottom: 70px;
            }
            h1{
                margin-top: 70px;
                margin-bottom: 70px;
            }
        </style>
    </head>
    
    <body>
        <?php require_once 'includes/header.php'; ?>
        <section class="container">
            <h1>Booking Draft</h1>
            <?php
                while($row = $result->fetch_assoc()){
                    $hotel = $hotelObject->getRow($row['hotel_id']);
                    echo    '<div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">'.$hotel["name"].', '.$hotel["location"].'</h2>
                                        <a href="hotel.php?id='.$row['hotel_id'].'" class="btn btn-primary">Complete Booking</a>
                                    </div>
                                </div>
                            </div>';
                }
            ?>
        </section>

        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--  Font Awesome CDN JS -->
        <script src="https://use.fontawesome.com/8d62438192.js"></script>
    </body>
</html>