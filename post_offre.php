<?php

include('connexion.php');

if (isset ($_POST)) {
    $id_offre = $_POST['id_offre'];
    $lib_offre = $_POST['lib_offre'];
    $date_deb = $_POST['date_deb'];
    $date_fin = $_POST['date_fin'];
    echo("Vous avez rentré :" + $id_offre + ", " + $lib_offre + ", " + $date_deb + ", " + $date_fin);

    $sqlQuery = 'INSERT INTO offreation (id_offre, lib_offre, date_deb, date_fin) VALUES (:id_offre, :lib_offre, :date_deb, :date_fin)';

    // Préparation
$PostFonction = $db->prepare($sqlQuery);

    // Exécution : le commentaire est maintenant ajouté dans la base de données
$PostFonction -> execute([
    "id_offre" => $id_offre,
    "lib_offre" => $lib_offre,
    "date_deb" => $date_deb,
    "date_fin" => $date_fin
]);


    ?> retour au <a href="index.php">offreulaire</a> <?php
}

?>