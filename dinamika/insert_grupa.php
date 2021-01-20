<?php
require_once("shop.php");

$kategorija =$_POST['kategorija'];
$b = $shop->insert_kategorija($kategorija);
if($b === false){
    echo "Greska: ".$shop->greska();
}else{
    echo " novi ID: ".$shop->insert_id();
    header('Location: ../view/admin.php');
}
?>