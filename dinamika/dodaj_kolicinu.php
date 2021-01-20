<?php
    require "shop.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $korpa-> dodaj_kolicinu($id, 1);
    }
    header("Location: ../view/korpa_table.php");

?>