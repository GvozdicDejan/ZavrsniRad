<?php
    require "shop.php";

    $uku = $korpa->ukupno();
    $shop->snimi($uku);
    echo "USPESNO";
    header('Location: ../view/naslovna.php');
?>