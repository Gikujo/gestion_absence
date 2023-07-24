<?php
require('messages.php');
$messages = [];
$err_messages = [];
$i = 0;

if(isset($_POST)) {
    // On récupère les éléments du formulaire dans des variables
    $id_pers = htmlspecialchars($_POST['id_pers']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $email_confirm = htmlspecialchars($_POST['email_confirm']);
    $mdp = sha1(htmlspecialchars($_POST['mdp']));
    $mdp_confirm = sha1(htmlspecialchars($_POST['mdp_confirm']));
    $civilite = htmlspecialchars($_POST['civilite']);
    $nb_enfants = htmlspecialchars($_POST['nb_enfants']);
    $offre_stag = htmlspecialchars($_POST['offre_stag']);
    $id_fonction = htmlspecialchars($_POST['id_fonction']);
    $date_naiss = htmlspecialchars($_POST['date_naiss']);
    $telephone = htmlspecialchars($_POST['telephone']);

    // On contrôle les informations
        // On vérifie que tous les champs obligatoires sont remplis

            // Tableau associatif qui permettra de renvoyer vers le bon message d'erreur
        $obligatoires = [
            "id_pers" => $id_pers,
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "email_confirm" => $email_confirm,
            "mdp" => $mdp,
            "mdp_confirm" => $mdp_confirm,
            "civilite" => $civilite,
            "date_naiss" => $date_naiss
          ];

          require('check_form.php');

        // Si on a des messages d'erreur, on les affiche et on n'insère rien dans la base
    if(!empty($err_messages)) {
        require('inscription.php');
    } else {


    // On doit obtenir ensuite une instance de classe

    // On se connecte à la base
    $db = new PDO('mysql:host=127.0.0.1;charset=utf8;dbname=gestion_absence','Miguel','miguel1234*');

    // On rédige la requête SQL
    $query = 'INSERT INTO personne (id_pers, nom, prenom, email, mdp, civilite, nb_enfants, offre_stag, id_fonction, telephone) VALUES (:id_pers, :nom, :prenom, :email, :mdp, :civilite, :nb_enfants, :offre_stag, :id_fonction, :telephone)';

    // On fait appel à la méthode "prepare"
    $PostPersonne = $db->prepare($query);

    // On envoie les données, en les liant aux variables
    try {
        // Possibilité 1 :
        $PostPersonne -> execute([
            "id_pers" => $id_pers,
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "mdp" => $mdp,
            "civilite" => $civilite,
            "nb_enfants" => $nb_enfants,
            "offre_stag" => $offre_stag,
            "id_fonction" => $id_fonction,
            "telephone" => $telephone
        ]);
        $messages[0] = Message::INS_OK; 
        require('index.php');
    }

    // Autre possibilité :

    // try {
    //     $query = 'INSERT INTO personne (id_pers, nom, prenom, email, mdp, civilite, nb_enfants, offre_stag, id_fonction) VALUES (?,?,?,?,?,?,?,?,?)';

    //     $statement = $db -> prepare($query);

    //     $statement -> bindValue(1, $id_pers, PDO::PARAM_STR);
    //     $statement -> bindValue(1, $nom, PDO::PARAM_STR);
    //     $statement -> bindValue(3, $prenom, PDO::PARAM_STR);
    //     $statement -> bindValue(4, $email, PDO::PARAM_STR);
    //     $statement -> bindValue(5, $mdp, PDO::PARAM_STR);
    //     $statement -> bindValue(6, $civilite, PDO::PARAM_STR);
    //     $statement -> bindValue(7, $nb_enfants, PDO::PARAM_INT);
    //     $statement -> bindValue(8, $offre, PDO::PARAM_INT);
    //     $statement -> bindValue(9, $id_fonction, PDO::PARAM_INT);
    // }
    
    catch (PDOException $e) {
        $messages[$i] = Message::INS_KO;
        $i++;
        require('inscription.php');

    }
}
}

    ?>