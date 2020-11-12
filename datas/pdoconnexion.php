
<?php

function readAll(){
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=multi', $user, $pass);
    foreach($dbh->query('SELECT * from cd') as $row) {

        ?>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Album</th>
                <th>Auteur</th>
                <th>Détails</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td scope="row"><?= $row['id'] ?></td>
                <td scope="row"><?= $row['nom'] ?></td>
                <td scope="row"><?= $row['auteur'] ?></td>
                <td><a href="../views/detailsCd.php?id=<?= $row['id'] ?>" class="btn btn-outline-warning">Détails</a></td>
                <td><a href="../views/updatecd.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary">Editer</a></td>
                <td><a href="../views/deletecd.php?id=<?= $row['id'] ?>" class="btn btn-outline-danger">Supprimer</a></td>
            </tr>
            </tbody>
        </table>

        <?php
    }
}

function getCdByID(){
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=multi', $user, $pass);
    $id = $_GET['id'];
    $req = $dbh->prepare('SELECT * FROM cd WHERE id = ?');
    $req->execute(array($id));
    $res = $req->fetch(PDO::FETCH_ASSOC);

    ?>
    <div class="container">
        <h1 class="text-danger">Détail du DC</h1>
    <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Album</th>
                <th>Auteur</th>
                <th>Retour</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td scope="row"><?= $res['id'] ?></td>
                <td scope="row"><?= $res['nom'] ?></td>
                <td scope="row"><?= $res['auteur'] ?></td>
                <td><a href="../views/allcd.php" class="btn btn-outline-success">Retour</a></td>
                <td><a href="../views/updatecd.php?id=<?= $res['id'] ?>" class="btn btn-outline-primary">Editer</a></td>
                <td><a href="../views/deletecd.php?id=<?= $res['id'] ?>" class="btn btn-outline-danger">Supprimer</a></td>
            </tr>
            </tbody>
            </table>
    </div>
    <?php
}

function addCd(){
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=multi', $user, $pass);


        //Traitrement
        $sql = "INSERT INTO cd (nom, auteur) values(?, ?)";
        $req = $dbh->prepare($sql);
    try{
        //Verif des valeurs du formulaire

        if(isset($_POST['nom'])){
            $nom = $_POST['nom'];
        }
        if(isset($_POST['auteur'])){
            $auteur = $_POST['auteur'];
        }
        $req->bindParam(1, $nom);
        $req->bindParam(2, $auteur);
        $req->execute([$nom, $auteur]);
        echo '<div class="container"><a href="../views/allcd.php" class="btn btn-outline-success">Retour à la liste des cds</a></div>';
    }catch (PDOException $e){
        echo "Erreur de taritement du formulaire" .$e->getMessage();
    }
}

function updateCd(){
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=multi', $user, $pass);

    $sql = "UPDATE cd SET nom= ?, auteur= ? WHERE id=?";

    $id = (isset($_GET['id']) ? $_GET['id'] : '');
    if(isset($_POST['nom'])){
        $nom = $_POST['nom'];
    }
    if(isset($_POST['auteur'])){
        $auteur = $_POST['auteur'];
    }

    $req = $dbh->prepare('SELECT * FROM cd WHERE id = ?');
    $req->fetch(PDO::FETCH_ASSOC);
    $update = $dbh->prepare($sql);
    $update->bindParam(1, $nom);
    $update->bindParam(2,$auteur);
    $update->execute(array($nom, $auteur, $id));

    if($update){
        echo "c bon";
    }else{
        echo "erreru";
    }
}

function deleteCd(){
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=multi', $user, $pass);
    $id = (isset($_GET['id']) ? $_GET['id'] : '');
    $sql = "DELETE FROM cd WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute(array($id));
}



