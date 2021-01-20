<?php
require "../dinamika/shop.php";
$id = $_GET['id'];
?>

<fieldset class="forma"><legend>Promeni</legend>
    <form method="post" action="../dinamika/update_kat.php">

        <input value="<?=$id?>" name="id" type="hidden" />
        
        <label>Kategorija:</label><br>
        <input type="text" name="kategorija" ><br><br>

        <input type="submit" value="Potvrdi">
    </form>
</fieldset>