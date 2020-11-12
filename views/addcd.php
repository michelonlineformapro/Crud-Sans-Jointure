<?php
ob_start();


$content = ob_get_clean();
require "../index.php";
require "../datas/pdoconnexion.php";

?>

<div class="container">
    <h1 class="text-success">Ajouter un CD</h1>
    <form method="post" action="addcd.php">
        <div class="form-group">
            <label for="nom">Titre de l'album</label>
            <input type="text" name="nom" id="nom" class="form-control" placeholder="Arise">
        </div>

        <div class="form-group">
            <label for="auteur">Artiste de l'album</label>
            <input type="text" name="auteur" id="auteur" class="form-control" placeholder="Sepultura">
        </div>
        <hr>
        <button type="submit" class="btn btn-outline-dark">Ajouter le CD</button>
        <hr>
    </form>
</div>

<?php
$dbh = addCd();




