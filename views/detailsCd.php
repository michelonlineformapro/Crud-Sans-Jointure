<?php
ob_start();


$content = ob_get_clean();
require "../index.php";
require "../datas/pdoconnexion.php";
$id = $_GET['id'];
$dbh = getCdByID();