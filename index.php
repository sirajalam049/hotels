<?php
    require_once 'models.php';
    $hotelObject = new Hotels();
    $hotelsList = $hotelObject->getTableData();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hotels</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- Font Awesome CDN CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    </head>
    <body>

        <?php require_once 'includes/header.php'; ?>
        
        <style>
            #hotels-list h1{
                padding-top: 70px;
                padding-bottom: 70px;
            }
            #hotels-list .card{
                margin-bottom: 70px;
            }
        </style>

        <section class="container" id="hotels-list">
            <h1 class="text-center">Hotel Booking</h1>
            <div class="row">
                <?php
                    foreach($hotelsList as $hotel){
                        echo    '<div class="col-md-4">
                                    <a href="hotel.php?id='.$hotel["id"].'">
                                        <div class="card">
                                            <div class="card-body"><h2>'.$hotel["name"].'</h1></div> 
                                            <div class="card-footer">
                                                <i class="fa fa-phone"></i> '.$hotel["phone"].' <br>
                                                <i class="fa fa-map-marker"></i> '.$hotel["location"].'
                                            </div>
                                        </div>
                                    </a>
                                </div>';
                    }
                ?>
            </div>
        </section>

        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--  Font Awesome CDN JS -->
        <script src="https://use.fontawesome.com/8d62438192.js"></script>

    </body>
</html>