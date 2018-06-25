<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/models.php';
?>
        <!-- Style for header -->
        <style>
            #top-nav{
                border-bottom: 1px solid rgba(255,255,255,0.2);
                background-color: #F5F5F5;
            }
            #top-nav .ml-auto i{
                margin-right: 8px;
                font-size: 14px;
            }
            #top-nav .social-icon{
                margin-right: 20px;
                color: #303638;
            }
            #top-nav .ml-auto li{
                font-size: 14px;
                color: #303638;
            }
        </style>

        <header class="container-fluid">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-sm container-fluid" id="top-nav">
                <div class="container">
                    <ul class="navbar-nav">
                        <a href="/">
                            <li class="nav-item">Home</li>
                        </a> 
                        <?php if(isset($_COOKIE['user'])) echo ' | Hello, '.explode(' ',$_COOKIE['name'])[0]; ?>
                    </ul>
                    <ul class="nav navbar-nav ml-auto">
                        <?php
                            if(isset($_COOKIE['user']) && $_COOKIE['user'] == TRUE){
                                echo    '<li class="nav-item">
                                            <a href="/showdraft.php">Drafts ('.(new Drafts())->countUserAssociatedData().')</a> | 
                                            <a href="/showbookings.php">Bookings ('.(new Bookings())->countUserAssociatedData().')</a> | 
                                            <a href="/logout.php">Logout</a>
                                        </li>';
                            }
                            else{
                                echo    '<li class="nav-item">
                                            <a href="/login.php">Login</a> | 
                                            <a href="/signup.php">Signup</a>
                                        </li>';
                            }
                        ?>
                    </ul>
                </div>
            </nav>
        </header>