<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasticom</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div><img src="../images/fantasticom.jpg" alt="fantasticom" class="noseca"> </div>
    <div class="wrapper">
        <nav>
            <ul>
                <li><a href="naslovna.php" class="tekst">Naslovna</a></li>
                <li><a href="proizvodi.php" class="tekst">Sve knjige</a></li>
                <li><a href="kontakt.php" class="tekst">Kontakt</a></li>
            </ul>
            <div class="desno">
                <?php 
                    if(isset($_SESSION['id'])){
                        require_once("nav_logged.php");
                        
                    }else{
                    require_once("nav_login.php");
                    }
                
                ?>

            </div>
        </nav>
        <hr>
        <nav>
            <ul>
                <?php
                    $shop->sve_kategorije();
                
                ?>

            </ul>
        </nav>

        <hr>