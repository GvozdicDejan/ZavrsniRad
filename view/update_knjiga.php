<?php
require "../dinamika/shop.php";
$id = $_GET['id'];
$shop->daj_knjigu($id);
?>

<fieldset class="forma"><legend>Promeni</legend>
        <form method="post" action="../dinamika/update.php">

            <input value="<?=$id?>" name="id" type="hidden" />
            
            <label>Naslov:</label><br>
            <input type="text" name="naslov" ><br><br>

            <label>Autor:</label><br>
            <input type="text" name="autor"><br><br>

            <label for="textarea">Opis:</label><br><br>
            <textarea name="opis" id="textarea"></textarea><br><br>

            <label>Slika:</label><br>
            <input type="text" name="slika"><br><br>

            <label>Cena:</label><br>
            <input type="number" name="cena"><br><br>

            <label>Kategorija:</label><br>
            <select name="category_id">
                <option value="1">Naučna fantastika</option>
                <option value="2">Epska fantastika</option>
                <option value="3">Horor</option>
            </select>
        <input type="submit" value="Potvrdi">
    </form>
</fieldset>