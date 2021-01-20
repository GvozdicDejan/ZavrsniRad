<?php
require_once("../dinamika/shop.php");

?>

<div class="desno">
<a href='../view/provera.view.php'>Admin</a>
<a href="korpa_table.php" class="tekst">Korpa</a>
<a href="../dinamika/logout.php">Odjavi se</a>
<a href=""><?php echo $_SESSION['ime']; ?></a>
</div>