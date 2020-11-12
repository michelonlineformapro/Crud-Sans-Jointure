<?php
ob_start();


$content = ob_get_clean();
require "../index.php";
require "../datas/pdoconnexion.php";
$id = $_GET['id'];
$dbh = deleteCd();

?>
<div class="container text-center">
    <a href="allcd.php" class="btn btn-outline-danger">Le CD à été supprimé</a>
</div>
