<?php
require_once("../dinamika/shop.php");
$shop->connect();
$ime = $shop->real_escape_string($_POST['ime']);
$email = $shop->real_escape_string($_POST['email']);
$password = $shop->real_escape_string($_POST['password']);

$shop->upit("INSERT INTO users (ime, email, password) VALUES ('$ime', '$email', '$password')");
header('Location: ../view/login.view.php');



?>