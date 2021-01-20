<?php
require_once("shop.php");

$id = $_POST['id'];
$naslov =$_POST['naslov'];
$autor = $_POST['autor'];
$opis = $_POST['opis'];
$slika = $_POST['slika'];
$cena = $_POST['cena'];
$category_id = $_POST['category_id'];

$b = $shop->update_knjiga($id, $naslov, $autor, $opis, $slika, $cena, $category_id);
if($b === false){
    echo "Greska: ".$shop->greska();
}else{
    echo " Promenjene kolone: ".$shop->affected_rows();
    header('Location: ../view/admin.php');
}

?>