<?php
    require "shop.php";
    
    $id = $_GET['id'];

    if($korpa->da_li_postoji_proizvod($id)){
        $korpa-> dodaj_kolicinu($id, 1);
    }else{
        $p = $shop->proizvod_1($id);
        $korpa->dodaj_proizvod_u_korpu($id, 1, $p['cena'], $p['naslov']);
    }

    header('Location: ../view/proizvodi.php');
?>