<?php
require_once("../dinamika/shop.php");
require_once("../partials/header.php");


if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    if($korpa->da_li_postoji_proizvod($id)){
        
        $korpa-> dodaj_kolicinu($id, 1);
    }else{
        $p = $shop->proizvod_1($id);
        $korpa->dodaj_proizvod_u_korpu($id, 1, $p['cena'], $p['naslov']);
    }
}


    $korpa->prikazi();
    echo "UKUPNO: ".$korpa->ukupno();

    // $korpa->obrisi_korpu();

require_once("../partials/footer.php")
?>