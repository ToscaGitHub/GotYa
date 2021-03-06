<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GotYa</title>
    
    <link rel="stylesheet" href="vendors/css/bootstrap.css">    
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
 
    <script src="vendors/js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>

    
</head>
<body>

    <?php 
        include("includes/init.inc.php"); 

        session_start();  

    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">GotYa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active nav" aria-current="page" href="index.php">Feed TimeLine</a>
                <?php
                if (!empty($_SESSION['user']) || !empty($_COOKIE['stayConnect'])) {
                ?>
                    <a class="nav-link active nav" href="user.php">Mon Compte</a>
                <?php
                }
                else {
                ?>
                    <a class="nav-link active nav" href="register.php">Login / Register</a>
                <?php
                } 
                ?>
            </div>
            </div>
        </div>
    </nav>
