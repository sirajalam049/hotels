<?php
    if(isset($_COOKIE['user']) && $_COOKIE['user'] == TRUE){
        header('/');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <style>
        #form-title,
        #signup-form{
            margin-top: 90px;
        }
        #signup-form{
            max-width: 400px;
        }
    </style>
    <body>
        <?php require_once 'includes/header.php'; ?>    
        <h1 id="form-title" class="text-center">Sign Up</h1>

        <section class="container" id="signup-form">
            <form action="registering.php" method="POST">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                        <label for="pswd">Password</label>
                        <input type="password" name="pswd" class="form-control" id="pswd" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </section>

        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>