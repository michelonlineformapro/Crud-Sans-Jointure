<?php
ob_start();


$content = ob_get_clean();
require "../index.php";
require "../datas/pdoconnexion.php";

?>

    <div class="container">
        <h1 class="text-success">Mettre à jour un CD</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="id">ID de l'album</label>
                <input readonly type="text" name="id" id="id" class="form-control" placeholder="">
            </div>

            <div class="form-group">
                <label for="nom">Titre de l'album</label>
                <input type="text" name="nom" id="nom" class="form-control" placeholder="">
            </div>

            <div class="form-group">
                <label for="auteur">Artiste de l'album</label>
                <input type="text" name="auteur" id="auteur" class="form-control" placeholder="">
            </div>
            <hr>
            <button type="submit" class="btn btn-outline-success">Modifier le CD</button>
            <a href="allcd.php" class="btn btn-outline-warning">Retour</a>
            <hr>
        </form>
    </div>

<?php

$dbh = updateCd();