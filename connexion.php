
<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=gestion_absence;charset=utf8', 'Miguel', 'abcd123*');
    echo("connexion a la DB réussie");

}catch(Exception $e){
    echo('connexion échouée');
    die('Erreur : '.$e->getMessage());
}
?>

