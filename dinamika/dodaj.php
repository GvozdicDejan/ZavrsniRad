<?php
    require "shop.php";
    if(isset($_GET['id'])){        
        $id = $_GET['id'];
    
        if($korpa->da_li_postoji_proizvod($id)){
            //ako postoji
            $korpa-> dodaj_kolicinu($id, 1);
        }else{
            //ako ne postoji
            $p = $shop->proizvod_1($id);
            $korpa->dodaj_proizvod_u_korpu($id, 1, $p['cena'], $p['naslov']);
        }
    }
    header("Location: ../view/naslovna.php");

?>