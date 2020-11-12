<?php
ob_start();


$content = ob_get_clean();
require "../index.php";
require "../datas/pdoconnexion.php";
?>
<div class="container">
    <h1 class="text-warning">Liste des cds</h1>
    <hr>
    <a href="../views/addcd.php" class="btn btn-outline-success">Ajouter un CD</a>
    <br><br>

    <?php

$dbh = readAll();
?>
</div>
