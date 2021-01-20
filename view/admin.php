<?php
    require_once("../dinamika/shop.php");
    require_once("../partials/header.php");

?>

<fieldset class="forma"><legend>Insert kategorija</legend>
        <form method="post" action="../dinamika/insert_grupa.php">
            
            <label>Kategorija:</label><br>
            <input type="text" name="kategorija"><br><br>

            
        <input type="submit" value="Potvrdi">
    </form>
</fieldset>
<?php
$shop->tabela_grupe();
?>

<hr>
<br><br>
<fieldset class="forma"><legend>Insert knjiga</legend>
        <form method="post" action="../dinamika/insert.php">
            
            <label>Naslov:</label><br>
            <input type="text" name="naslov"><br><br>

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
<?php
$shop->tabela_admin();
require_once("../partials/footer.php")
?>