<?php
require_once("shop.php");

$id = $_POST['id'];
$kategorija =$_POST['kategorija'];


$b = $shop->update_kategorije($id, $kategorija);
if($b === false){
    echo "Greska: ".$shop->greska();
}else{
    echo " Promenjene kolone: ".$shop->affected_rows();
    header('Location: ../view/admin.php');
}