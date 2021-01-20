<?php
require_once("../partials/header.php");


if(isset($_GET['id'])){
    $shop->daj_kategoriju($_GET['id']);
}else{
    $shop->daj_sve_knjige();
}
    
require_once("../partials/footer.php")
?>