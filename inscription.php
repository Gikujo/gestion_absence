<?php
require_once('Fonction.php');
require_once('Offre.php');
//connexion a la db
try {
    $db = new PDO('mysql:host=localhost;dbname=gestion_absence;charset=utf8', 'Miguel', 'miguel1234*');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
//RECHERCHER LA LISTE DES FONCTION
$requete = 'SELECT id_fonction, nom_fonction FROM fonction order by nom_fonction';
$statement = $db->query($requete);
$fonctions = [];
while ($row = $statement->fetch()) {
    $id  = $row['id_fonction'];
    $nom = $row['nom_fonction'];
    $fonction = new Fonction($id, $nom);
    array_push($fonctions, $fonction);
}

//RECHERCHER LA LISTE DES OFFRES
$requete = 'SELECT id_offre, lib_offre FROM offre order by lib_offre';
$statement = $db->query($requete);
$offres = [];
while ($row = $statement->fetch()) {
    $id_offre = $row['id_offre'];
    $lib_offre = $row['lib_offre'];
    $offre = new Offre($id_offre, $lib_offre);
    array_push($offres, $offre);
}

//INSERER LES INFO SAISIES DANS LA BD
$requete = 'INSERT INTO personne(nom, prenom, email, photo, mdp, civilite) FROM personne ';
?>

<?php require('head.php') ?>
<?php require('nav.php');

if(isset($err_messages) && !empty($err_messages)) {
    $margin=110;
    foreach ($err_messages as $err_message) {
        ?><div class="alert alert-danger" style="margin-top:<?=$margin?>px;"><?=$err_message?></div> <?php
        $margin = 10;
    }
}

// taitement image
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

    $error=1;

    if($_FILES['image']['size'] <= 3000000){

        $informationsImage = pathinfo($_FILES['image']['name']);
        $extensionImage = $informationsImage['extension'];
        $extensionsArray = array('png', 'gif', 'jpg', 'jpeg');
        

        if(in_array($extensionImage, $extensionsArray)){

           $adresse  = 'uploads/'.time().rand().'.'.$extensionImage;

            move_uploaded_file($_FILES['image']['tmp_name'], $adresse);
            $error =0;
        }
    }
}
?>
<section class="page-section" id="contact">
    <div class="container mt-5">

        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">

                <form id="contactForm" action="trt1.php" method="post" enctype="multipart/form-data">


                    <label for="file" class=" mt-1 fs-5 text-secondary">Sélectionner une image :</label>
                    <div class="form-floating mb-3">
                        <input type="file" name="file" id="file">
                  </div>
                    <label for="civilite" class=" mt-3 fs-5 text-secondary">Civilite</label>
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Default select example" name="civilite">                            
                            <option seleted disabled value="null">Sélectionnez une option</option>
                            <option value="Mr">Mr</option>
                            <option value="Mme">Mme</option>
                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="last-name" name="nom" type="text" placeholder="Entrez votre nom" data-sb-validations="required" data-sb-can-submit="no">
                        <label for="name">Nom</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Un nom est requis</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="first-name" name="prenom" type="text" placeholder="Entrez votre prenom" data-sb-validations="required" data-sb-can-submit="no">
                        <label for="prenom">prenom</label>
                        <div class="invalid-feedback" data-sb-feedback="prenom:required">Un prenom est requis.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="date_naiss" name="date_naiss" type="date" placeholder="Entrez votre date de naissance" data-sb-validations="required" data-sb-can-submit="no">
                        <label for="date_naiss">Date de naissance</label>
                        <div class="invalid-feedback" data-sb-feedback="date de naissance:required">Une date de naissance est requise</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" data-sb-validations="required,email" data-sb-can-submit="no">
                        <label for="email">Adresse mail</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Un email est requis.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email_confirm" type="email" name="email_confirm" placeholder="name@example.com" data-sb-validations="required,email" data-sb-can-submit="no">
                        <label for="email_confirm">Confirmation d'adresse mail</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Un email est requis.</div>

                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="mdp" type="password" name="mdp" placeholder="Entrez votre mot de passe" data-sb-validations="required" data-sb-can-submit="no">
                        <label for="mdp">Mot de passe</label>
                        <div class="invalid-feedback" data-sb-feedback="mdp:required">Un mot de passe est requis.</div>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="mdp_confirm" type="password" name="mdp_confirm" placeholder="Confirmez votre mot de passe" data-sb-validations="required" data-sb-can-submit="no">
                        <label for="mdp_confirm">Confirmez votre mot de passe</label>
                        <div class="invalid-feedback" data-sb-feedback="mdp_confirm:required">Un mot de passe est requis.</div>
                    </div>
                    <!-- Phone number input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="telephone" type="phone" name="telephone" placeholder="(123) 456-7890" data-sb-validations="required" data-sb-can-submit="no">
                        <label for="telephone">Numero de telephone</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                    <!-- fonction-->
                    <label for="id_fonction" class=" mt-3 fs-5 text-secondary">Fonction</label>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="id_fonction" name="id_fonction" aria-label="Default select example">
                            <?php foreach ($fonctions as $fonction) { ?>
                                <option value="<?= $fonction->id ?>"><?= $fonction->nom ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="id_pers" name="id_pers" type="text" placeholder="Code OSIA" data-sb-validations="required" data-sb-can-submit="no">
                        <label for="id_pers">Code OSIA / Agent</label>
                        <div class="invalid-feedback" data-sb-feedback="osia:required">Un code OSIA est requis.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="offre_stag" class="form-floating mb-3">Offre</label>
                    </div>
                    <label for="select" class=" mt-1 fs-5 text-secondary">Offre</label>
                    <div class="form-floating mb-3">
                        <select multiple class="form-select" name="offre_stag"  aria-label="Default select example">
                            <option selected>Selectionner une offre</option>
                            <?php foreach ($offres as $offre) { ?>
                                <option value="<?= $offre->id_offre ?>"><?= $offre->lib_offre ?></option>

                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input min="0" max="10" class="form-control" id="nb_enfants" name="nb_enfants" type="number" placeholder="Nombre enfants" data-sb-validations="required" data-sb-can-submit="no">
                        <label for="nb_enfants">Nombre d'enfants</label>
                        <div class="invalid-feedback" data-sb-feedback="nb_enfants:required">Vous devez préciser votre nombre d'enfants.</div>
                    </div>
                    

                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br>
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Error sending message!</div>
                    </div>
                    <!-- Submit Button-->
                    <button class="btn btn-primary btn-xl disable pe-auto" id="submitButton" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require('footer.php') ?>
</body>
</html>