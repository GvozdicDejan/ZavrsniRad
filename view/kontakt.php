<?php
require_once("../partials/header.php");
?>
<div class="kontakt"><p>Kontakt</p></div>
<div class="podaci">
    <p>FantastiCom</p>
    <p>Kosovska 2021</p>
    <p>38227 Zvečan</p>
    <p>Srbija</p>
    <p>e-mail: info@fantasticom.rs</p><br><br><br><br>


    <fieldset class="forma"><legend>Poruka</legend>
        <form method="post" name="kontakt" id="kontakt">
            
            <label for="ime">Korisničko ime:</label><br>
            <input type="text" name="ime" id="ime"><br><br>

            <label for="textarea">Ostavite komentar:</label><br><br>
            <textarea name="textarea" id="textarea"></textarea><br><br>
            <input type="submit" name="submit" class="submit" value="Pošalji"><br><br>
        </form>

    </fieldset>
</div>

<?php
require_once("../partials/footer.php")
?>