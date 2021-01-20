<?php
session_start();

if($_SESSION['id'] === '3'){
    header('Location: admin.php');
}else{
    header('Location: proizvodi.php');
}


?>