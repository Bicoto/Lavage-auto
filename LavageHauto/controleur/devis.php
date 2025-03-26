<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/helpers/check_auth.php');

class DevisController {
    public function index() {
        // Logique du contrôleur
        require_once($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/vues/devis.php');
    }
}
?>
