<?php

class Fonction {
    // Propriétés
    public int      $id;
    public string   $nom;

    // Méthodes
    public function __construct($newId, $newNom) {
        $this->id   = $newId;
        $this->nom  = $newNom;
    }
}

?>