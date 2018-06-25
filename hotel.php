<?php

    if(!isset($_GET['id'])){
        die('Invalid Access.');
    }
    $id = $_GET['id'];

    require_once 'models.php';
    require_once 'includes/lib.php';

    $hotelObject = new Hotels();

    $hotel = $hotelObject->getRow($id);

    // Tracking visitors
    if(!isset($_COOKIE['visitor-'.$id])){
        setcookie('visitor-'.$id, TRUE, time() + 60*60*24*7);
        $hotelObject->incVisitors($id);
    }

    $draftObject = new Drafts();
    $draftHotel = $draftObject->getDraftHotel($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>The Leela Palace</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- Font Awesome CDN CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

        <style>
            /*  */
            .jumbotron p{
                width: 50%;
            }
            #book-now{
                border-bottom: 1px Solid rgba(255,255,255,0);
                margin-bottom: 30px;
            }

            td{
                padding: 10px;
                font-size: 25px;
            }
            #saved-msg{
                display: none;
                margin-top: 20px;
            }
            #recommend{
                margin-top: 70px;
                margin-bottom: 70px;
            }
        </style>

    </head>
    <body>

        <?php require_once 'includes/header.php'; ?>
        
        <style>
            
        </style>
        <div class="jumbotron">
            <h1><?php echo $hotel['name'] ?></h1> 
            <p><?php echo $hotel['about'] ?></p> 
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <table>
                        <tr>
                            <td><i class="fa fa-phone"></i></td>
                            <td><?php echo $hotel['phone'] ?></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-map-marker"></i></td>
                            <td><?php echo $hotel['location'] ?></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-inr"></i></td>
                            <td><?php echo $hotel['price'] ?> / night</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-eye"></i></td>
                            <td><?php echo $hotel['visitors'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h2 id="book-now">Book Now</h2>
                    <?php 
                        if(!isset($_COOKIE['user'])){
                            echo    '<p><a href="login.php">Login</a> or <a href="signup.php">Signup</a> for make a hotel booking.</p>';
                        }   
                        else{
                            echo    '<form action="booking.php?hotel_id='.$id.'" method="POST">
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" name="date" id="date" value="'.$draftHotel['date'].'" class="form-control" min="'.date('Y-m-d').'" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_rooms">No. of Rooms</label>
                                            <input type="number" name="total_rooms" id="total_rooms" value="'.$draftHotel['total_rooms'].'" class="form-control" min="1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nights">No. of Nights</label>
                                            <input type="number" name="nights" id="nights" value="'.$draftHotel['days'].'" class="form-control" min="1" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary" value="book">Book Now</button>
                                        <div class="btn btn-warning" onClick=saveToDraft()>Save to Draft</div>
                                        <div class="alert alert-success" id="saved-msg">
                                            <strong>Successfully!</strong> saved booking into the draft.
                                        </div>
                                    </form>';
                        }
                    ?>
                </div>
            </div>
            <hr>
            <h4>Similar hotels in <?php echo $hotel['location'] ?></h4>
        </div>
        
        <section id="recommend" class="container">
            <div class="row">
                <?php
                    $recHotels = recommendHotels($id);

                    // Show max 4 hotels
                    $items = 4;
                    foreach($recHotels as $rec_hotel_id => $element){
                        if($items == 0)
                            break;
                        $recHotel = $hotelObject->getRow($rec_hotel_id);
                        echo    '<div class="col-md-3">
                                    <a href="hotel.php?id='.$recHotel['id'].'">
                                        <div class="card">
                                            <div class="card-body"><h4>'.$recHotel['name'].'</h4></div>
                                            <div class="card-footer"><p><i class="fa fa-map-marker"></i> '.$recHotel['location'].'</p></div>
                                        </div>    
                                    </a>
                                </div>';
                        $items--;

                    }
                ?>
            </div>
        </section>

        <script>
            // Ajax call to save the data into draft.
            function saveToDraft(){
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("saved-msg").style.display = "block";
                    }
                };
                var date = document.getElementById("date").value;
                var total_rooms = document.getElementById("total_rooms").value;
                var nights = document.getElementById("nights").value;
                var params = "date="+date+"&total_rooms="+total_rooms+"&nights="+nights+"&hotel_id=<?php echo $id; ?>";
                ajax.open("POST", "drafting.php", true);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                ajax.send(params);
            }
        </script>

        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

        <!--  Font Awesome CDN JS -->
        <script src="https://use.fontawesome.com/8d62438192.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>