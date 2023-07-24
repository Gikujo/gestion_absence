<?php

include('connexion.php');

if (isset ($_POST)) {
    $id_form = $_POST['id_form'];
    $lib_form = $_POST['lib_form'];
    $sigle = $_POST['sigle'];
    echo("Vous avez rentré :" + $id_form + ", " + $lib_form + ", " + $sigle);

    $sqlQuery = 'INSERT INTO formation (id_form, lib_form, sigle) VALUES (:id_form, :lib_form, :sigle)';

    // Préparation
$PostFonction = $db->prepare($sqlQuery);

    // Exécution : le commentaire est maintenant ajouté dans la base de données
$PostFonction -> execute([
    "id_form" => $id_form,
    "lib_form" => $lib_form,
    "sigle" => $sigle
]);


    ?> retour au <a href="index.php">formulaire</a> <?php
}

?>