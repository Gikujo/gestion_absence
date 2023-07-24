<?php
    class Message {
        public const INS_OK = "Inscription réussie";
        public const INS_KO = "Échec de l'inscription";
        public const ERREUR_MAIL = "La structure de votre mail ne correspond pas aux attentes.";
        public const ERREUR_CONFIRM_MAIL = "Le mail et sa confirmation ne correspondent pas.";
        public const ERREUR_CONFIRM_MDP = "Le mot de passe et sa confirmation ne correspondent pas.";
        public const EMPTY_id_pers = "Vous devez renseigner un code OSIA / Agent.";
        public const EMPTY_nom = "Vous devez renseigner votre nom.";
        public const EMPTY_prenom = "Vous devez renseigner votre prenom.";
        public const EMPTY_email = "Vous devez renseigner un email.";
        public const EMPTY_email_confirm = "Vous devez retaper votre email pour le confirmer.";
        public const EMPTY_mdp = "Vous devez avoir un mot de passe.";
        public const EMPTY_mdp_confirm = "Vous devez retaper votre mot de passe pour le confirmer.";
        public const EMPTY_civilite = "Vous devez renseigner votre civilité (Mr / Mme / null).";
        public const EMPTY_date_naiss = "Vous devez renseigner votre date de naissance.";
        public const ERREUR_NOMBRES_TEXTE = "Les champs 'nom', 'prenom' et 'civilite' ne doivent pas contenir de chiffres.";
        public const ERREUR_FORMAT_EMAIL = "Votre email n'est pas valide.";
        public const ERREUR_FONCT_INEXIS = "Cette fonction n'existe pas.";
        public const ERREUR_OFFRE_INEXIS = "Cette offre n'existe pas.";
        public const ERREUR_NB_ENFANTS = "Le nombre d'enfants n'est pas valide (chiffre compris entre 0 et 10).";

    }
?>