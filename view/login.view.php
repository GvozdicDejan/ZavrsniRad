<?php
require_once("../dinamika/shop.php");
require_once("../partials/header.php");

?>
<fieldset class="forma"><legend>Prijavi se</legend>
        <form method="post" action="../dinamika/login.php">
            
            <label>Ime:</label><br>
            <input type="text" name="ime"><br><br>

            <label>Password:</label><br>
            <input type="password" name="password"><br><br>
        <input type="submit" value="Potvrdi">
    </form>
</fieldset>

<?php
require_once("../partials/footer.php")
?>