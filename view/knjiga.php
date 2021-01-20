<?php
require_once("../dinamika/shop.php");
require_once("../partials/header.php");


$id = $_GET['id'];
$shop->daj_knjigu($id);

require_once("../partials/footer.php")
?>