<?php
    require "korpa.php";
    if(isset($_GET['id'])){
        
        $id = $_GET['id'];
    
        $korpa->obrisi_proizvod($id);
    }
    header("Location: ../view/korpa_table.php");

?>