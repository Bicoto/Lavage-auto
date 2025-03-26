<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/model/class.PDO.lavage.inc.php');

$pdo = PdoLavage::getPdoLavage();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $choix = $_POST['choix'];
    $detailsChoix = $_POST['detailsChoix'];
    $quantite = $_POST['quantite'];

    // Logique pour générer le devis
    // ...

    // Rediriger vers la page de devis généré
    header("location: /LavageHauto/vues/devis.php");
    exit();
}

include($_SERVER['DOCUMENT_ROOT'].'/LavageHauto/vues/devis.php');


