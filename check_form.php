
<?php
    // Pour chaque itération, on teste la value (variable), et si elle est vide, on envoie le message associé ("mdp" pour $mdp, par exemple)
    foreach ($obligatoires as $key=>$value) {
        if(empty($value)) {
            // En cas de champ vide, $err_messages[$i] prendra la valeur Message::EMPTY_mdp, par exemple
            $msg_name = 'EMPTY_' . $key;
            $err_messages[$i] = constant('Message::' . $msg_name);
            $i++;
        }
    }

    // On vérifie que le mail et sa confirmation concordent
    if ($email !== $email_confirm) {
        $err_messages[$i] = Message::ERREUR_CONFIRM_MAIL;
        $i++;
    }
    // Idem pour le mot de passe
    if($mdp !== $mdp_confirm) {
        $err_messages[$i] = Message::ERREUR_CONFIRM_MDP;
        $i++;
    }

    // On vérifie que le nom, le prénom et la civilité ne contiennent pas de chiffres
    // $non_digit = [$nom, $prenom, $civilite];

    // foreach($non_digit as $key) {
    //     if (!preg_match('/\d/', $key)) {
    //         $err_messages[$i] = Message::ERREUR_NOMBRES_TEXTE;
    //         $i++;
    //         break;
    //     }
    // }

    // On vérifie que l'email est bien au bon format
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err_messages[$i] = Message::ERREUR_FORMAT_EMAIL;
        $i++;
    }

    // On vérifie que le champ de "fonction" correspond bien à une des valeurs possibles
        // On se connecte à la base
    require('Fonction.php');
    $db = new PDO('mysql:host=127.0.0.1;charset=utf8;dbname=gestion_absence','Miguel','miguel1234*');
        // On récupère la table "fonction"
    $query = "SELECT id_fonction, nom_fonction FROM fonction ORDER BY nom_fonction";
    $statement = $db->query($query);
        // On crée un tableau "fonctions" qui va répertorier, en objets, toutes les fonctions
    $fonctions = [];
    while($row = $statement->fetch()) {
        $id = $row['id_fonction'];
        $nom = $row['nom_fonction'];
        $fonction = new Fonction($id, $nom);
        array_push($fonctions, $fonction);
    }

        // On va boucler sur ce tableau pour en comparer l'ID de chaque élément avec l'entrée du formulaire
    $valid_fonction = false;
    foreach ($fonctions as $fonction) {
        if($valid_fonction === false) {
            if($fonction->id == $id_fonction) {
                $valid_fonction = true;
            }
        }
    }
        // Si l'entrée n'a pas été trouvée, on renvoie un message d'erreur
    if(!$valid_fonction) {
        $err_messages[$i] = Message::ERREUR_FONCT_INEXIS;
        $i++;
    }

    // Et on fait de même avec les offres :
    require('Offre.php');
        // On récupère la table "offre"
    $query = "SELECT id_offre, lib_offre FROM offre ORDER BY lib_offre";
    $statement = $db->query($query);
        // On crée un tableau "offres" qui va répertorier, en objets, toutes les offres
    $offres = [];
    while($row = $statement->fetch()) {
        $id_offre = $row['id_offre'];
        $lib_offre = $row['lib_offre'];
        $offre = new Offre($id_offre, $lib_offre);
        array_push($offres, $offre);
    }

        // On va boucler sur ce tableau pour en comparer l'ID de chaque élément avec l'entrée du formulaire
    $valid_offre = false;
    foreach ($offres as $offre) {
        if($valid_offre === false) {
            if($offre->id_offre == $id_offre) {
                $valid_offre = true;
            }
        }
    }
        // Si l'entrée n'a pas été trouvée, on renvoie un message d'erreur
    if(!$valid_offre) {
        $err_messages[$i] = Message::ERREUR_OFFRE_INEXIS;
        $i++;
    }

    // On vérifie le nombre d'enfants :    
    if($nb_enfants >= 0 && $nb_enfants <= 10) {
        $valid_nb_enfants = true;
    } else {
        $valid_nb_enfants = false;
        $err_messages[$i] = Message::ERREUR_NB_ENFANTS;
        $i++;
    }

    // ----- TODO :
    // - Rajouter la vérification de la non-existence en base de id_pers et du mail
    // - Voir s'il y a un moyen de faire ça en évitant un nouveau fetch dans la db

?>