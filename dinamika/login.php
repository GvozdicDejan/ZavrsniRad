<?php
require_once("../dinamika/shop.php");
$shop->connect();
$ime = $shop->real_escape_string($_POST['ime']);
$password = $shop->real_escape_string($_POST['password']);

$sql = $shop->upit("SELECT id FROM users WHERE ime='$ime' AND password='$password'");
$id = mysqli_fetch_assoc($sql)['id'];

if($id){
    $_SESSION['id'] = $id;
    $_SESSION['ime'] = $ime;
    header('Location: ../view/naslovna.php');
}else{
    header('Location: ../view/login.view.php');
}

?>

