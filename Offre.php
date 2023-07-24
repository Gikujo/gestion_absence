<?php

class Offre {
    // Propriétés
    public string      $id_offre;
    public string   $lib_offre;

    // Méthodes
    public function __construct($newId, $newNom) {
        $this->id_offre   = $newId;
        $this->lib_offre  = $newNom;
    }
}

?>