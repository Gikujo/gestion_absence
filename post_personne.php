<?php

include('connexion.php');

if (isset ($_POST)) {
    $id_pers = $_POST['id_pers'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $photo = $_POST['photo'];
    $civilite = $_POST['civilite'];
    $nb_enfants = $_POST['nb_enfants'];
    echo("Vous avez rentré :" + $id_pers + ", " + $nom + ", " + $prenom + ", " + $email + ", " + $mdp + ", " + $photo + ", " + $civilite + ", " + $nb_enfants);

    $sqlQuery = 'INSERT INTO offreation (id_pers, prenom, email, mdp, photo, civilite, nb_enfants) VALUES (:id_pers, :prenom, :email, :mdp, :photo, :civilite, :nb_enfants)';

    // Préparation
$PostFonction = $db->prepare($sqlQuery);

    // Exécution : le commentaire est maintenant ajouté dans la base de données
$PostFonction -> execute([
    "id_pers" => $id_pers,
    "prenom" => $prenom,
    "email" => $email,
    "mdp" => $mdp,
    "photo" => $photo,
    "civilite" => $civilite,
    "nb_endants" => $nb_enfants
]);


    ?> retour au <a href="index.php">offreulaire</a> <?php
}

?>