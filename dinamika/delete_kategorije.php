<?php
require_once("shop.php");

$id = $_GET['id'];

$b = $shop->delete_kategorija($id);
if($b === false){
    echo "Greska: ".$shop->greska();
}else{
    echo " Obrisane kolone: ".$shop->affected_rows();
    header('Location: ../view/admin.php');
}

?>