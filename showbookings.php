<?php
    if(!isset($_COOKIE['user'])){
        die('Access Denied');
    }

    require_once 'models.php';

    $bookingsObject = new Bookings();
    $result = $bookingsObject->getUserAssociatedData();
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
    </head>
    <body>
        <?php require_once 'includes/header.php'; ?>
        <style>
            .card{
                margin-bottom: 70px;
            }
            h1{
                margin-top: 70px;
                margin-bottom: 70px;
            }
        </style>
        <section class="container">
            <h1>You Confirmed Bookings</h1>
            <?php
                while($row = $result->fetch_assoc()){
                    $hotel = $hotelObject->getRow($row['hotel_id']);
                    echo    '<div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">'.$hotel["name"].', '.$hotel["location"].'</h2>
                                        <p class="card-text">Booked On <u>'.$row["booking_date"].'</u>, <u>'.$row["total_rooms"].' rooms </u> for <u>'.$row["date"].'</u> for <u>'.$row["days"].' nights</u></p>
                                        <a href="hotel.php?id='.$row['hotel_id'].'" class="btn btn-primary">View Hotel Details</a>
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