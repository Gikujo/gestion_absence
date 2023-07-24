<?php

include('connexion.php');

if (isset ($_POST)) {
    $nom_fonction = $_POST['nom_fonction'];
    echo("Vous avez rentré :" + $nom_fonction);

    $sqlQuery = 'INSERT INTO fonction (nom_fonction) VALUES (:nom_fonction)';

    // Préparation
$PostFonction = $db->prepare($sqlQuery);

    // Exécution : le commentaire est maintenant ajouté dans la base de données
$PostFonction -> execute([
    "nom_fonction" => $nom_fonction
]);


    ?> retour au <a href="index.php">formulaire</a> <?php
}

?>