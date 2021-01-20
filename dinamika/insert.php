<?php
require_once("shop.php");

$naslov =$_POST['naslov'];
$autor = $_POST['autor'];
$opis = $_POST['opis'];
$slika = $_POST['slika'];
$cena = $_POST['cena'];
$category_id = $_POST['category_id'];

$b = $shop->insert_knjiga($naslov, $autor, $opis, $slika, $cena, $category_id);
if($b === false){
    echo "Greska: ".$shop->greska();
}else{
    echo " novi ID: ".$shop->insert_id();
    header('Location: ../view/admin.php');
}
?>